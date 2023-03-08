<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Produk;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PesanController extends Controller
{
    public function index(Request $request)
    {
        $pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', 1)->latest()->filter(request(['search']))->paginate(10);
        $pesanans->appends($request->all());//agar searching ikut di paginasi
       return view('pesan.pesanan', compact('pesanans'));
    }
    public function pesan(Request $request, $id){
        $produk = Produk::where('id', $id)->first();
        $tanggal = Carbon::now();
        //validasi jumlah pesanan melebihi stok
        if ($request->jumlah_pesanan>$produk->stok || $request->jumlah_pesanan<1 ){
            alert()->error('Jumlah Produk tidak mencukupi dan tidak boleh dibawah 1', 'Gagal');
            return redirect('produk/detail/'.$id);
        }
        //cek validasi sudah pesan belum
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if (empty($cek_pesanan)){
            //simpan ke database
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->kode_pesanan ='PS-';
            $pesanan->kode_unik = mt_rand(1, 999);
            $pesanan->total_harga=0;
            $pesanan->save();
            $pesanan->total_harga=$pesanan->kode_unik;
            $pesanan->kode_pesanan=$pesanan->kode_pesanan.Auth::user()->id.'-'.$pesanan->id;
            $pesanan->update();
        }
        //simpan ke database detail
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        //cek pesanan detail
        $cek_pesanan_detail=PesananDetail::where('produk_id', $produk->id)->where('pesanan_id', $pesanan_baru->id)->first();
        if (empty($cek_pesanan_detail)){
            $pesanan_detail= new PesananDetail;
            $pesanan_detail->produk_id = $produk->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah_pesanan = $request->jumlah_pesanan;
            $pesanan_detail->jumlah_harga = $produk->harga*$request->jumlah_pesanan;
            $pesanan_detail->save();
        }
        else{
            $pesanan_detail=PesananDetail::where('produk_id', $produk->id)->where('pesanan_id', $pesanan_baru->id)->first();
            $pesanan_detail->jumlah_pesanan = $pesanan_detail->jumlah_pesanan+$request->jumlah_pesanan;
            //harga sekarang
            $harga_pesanan_detail_baru=$produk->harga*$request->jumlah_pesanan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }
        //jumlah total
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->total_harga= $pesanan->total_harga+$produk->harga*$request->jumlah_pesanan;
        $pesanan->update();
        alert()->success('Produk berhasil masuk keranjang', 'Success Masuk Keranjang');
        return redirect('keranjang');
    }
    public function pesanan_detail(Pesanan $pesanan){
        $pesanandetails=PesananDetail::where('pesanan_id', $pesanan->id)->get();
        return view('pesan.pesananDetail', compact('pesanan', 'pesanandetails'));
    }
    public function bukti_tf(Pesanan $pesanan){
        $pesanandetails=PesananDetail::where('pesanan_id', $pesanan->id)->get();
        return view('pesan.buktitf', compact('pesanan', 'pesanandetails'));
    }
    public function konfirmasi_bukti_tf(Request $request,$id){
        $validateData=$request->validate([
            'buktitf' => 'required|image|file|max:1024'
        ]);
        if($request->file('buktitf')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['buktitf'] = $request->file('buktitf')->store('buktitf');
        }
        Pesanan::find($id)->update($validateData);
        alert()->success('Bukti TF berhasil diUpload', 'Success');
        return redirect('pesanan'); 
    }
    public function notapdf(Pesanan $pesanan){
        if ($pesanan->status_pesanan=='Lunas'){
            $pesanandetails=PesananDetail::where('pesanan_id', $pesanan->id)->get();
            $pdf = Pdf::loadView('pesan.notapdf', compact('pesanan', 'pesanandetails'));
            $pdf->setPaper('A4', 'potrait');
            return $pdf->stream('Nota '.$pesanan->kode_pesanan.'.pdf');
        }
        else{
            $pesanandetails=PesananDetail::where('pesanan_id', $pesanan->id)->get();
            alert()->error('Pesanan Belum Lunas!', 'Error'); 
            return view('pesan.pesananDetail', compact('pesanan', 'pesanandetails'));
        }
    }
}
