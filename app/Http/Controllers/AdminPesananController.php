<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Produk;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminPesananController extends Controller
{
    public function pesanan_masuk(Request $request){
        $pesanans=Pesanan::where('status', 1)->where('status_pesanan', 'belum lunas')->filter(request(['search']))->paginate(10);
        $pesanans->appends($request->all());//agar searching ikut di paginasi
        return view('Admin.pesanan_masuk.index', compact('pesanans'));
    }
    public function detail_pesanan_masuk(Pesanan $pesanan){
        $pesanandetails=PesananDetail::where('pesanan_id', $pesanan->id)->get();
        return view('Admin.pesanan_masuk.show', compact('pesanan', 'pesanandetails'));
    }
    public function proses_pesanan_masuk(Pesanan $pesanan){
        return view('Admin.pesanan_masuk.proses', compact('pesanan'));
    }
    public function konfrimasi_pesanan_masuk(Request $request,$id){
        if ($request->status_pesanan=='belum lunas'){
            alert()->error('Pesanan gagal di Proses', 'gagal');
            return redirect('/admin/pesanan/masuk'); 
        }
        elseif($request->status_pesanan=='Batal'){
            //tambah stok saat batal
        $pesanan_details=PesananDetail::where('pesanan_id', $id)->get();
            foreach ($pesanan_details as $pesanan_detail){
                $produk = Produk::where('id', $pesanan_detail->produk_id)->first();
                $produk->stok=$produk->stok+$pesanan_detail->jumlah_pesanan;
                $produk->update();
                $pesanan=Pesanan::find($id)->update($request->all());
            }
            alert()->success('Pesanan berhasil di Proses', 'Success');
            return redirect('/admin/pesanan/masuk');
        }
        $pesanan=Pesanan::find($id)->update($request->all());
        alert()->success('Pesanan berhasil di Proses', 'Success');
        return redirect('/admin/pesanan/masuk'); 
    }
     public function semua_pesanan(Request $request){
        $pesanans=Pesanan::where('status', 1)->where('status_pesanan', '!=' ,'belum lunas')->latest()->filter(request(['search']))->paginate(10);
        $pesanans->appends($request->all());//agar searching ikut di paginasi
        return view('Admin.semua_pesanan.index', compact('pesanans'));
    }
    public function detail_semua_pesanan(Pesanan $pesanan){
        $pesanandetails=PesananDetail::where('pesanan_id', $pesanan->id)->get();
        return view('Admin.semua_pesanan.show', compact('pesanan', 'pesanandetails'));
    }
    public function edit_semua_pesanan(Pesanan $pesanan){
        return view('Admin.semua_pesanan.edit', compact('pesanan'));
    }
    public function konfirmasi_edit_semua_pesanan(Request $request,$id){
        $pesanan=Pesanan::find($id);
        if($request->status_pesanan!=$pesanan->status_pesanan){
            if($request->status_pesanan=='Batal'){
                //tambah stok saat batal
            $pesanan_details=PesananDetail::where('pesanan_id', $id)->get();
                foreach ($pesanan_details as $pesanan_detail){
                    $produk = Produk::where('id', $pesanan_detail->produk_id)->first();
                    $produk->stok=$produk->stok+$pesanan_detail->jumlah_pesanan;
                    $produk->update();
                    $pesanan=Pesanan::find($id)->update($request->all());
                }
                alert()->success('Pesanan berhasil di Edit', 'Success');
                return redirect('/admin/semua/pesanan');
            }
            elseif($request->status_pesanan=='Lunas'){
                //tambah stok saat batal
            $pesanan_details=PesananDetail::where('pesanan_id', $id)->get();
                foreach ($pesanan_details as $pesanan_detail){
                    $produk = Produk::where('id', $pesanan_detail->produk_id)->first();
                    $produk->stok=$produk->stok-$pesanan_detail->jumlah_pesanan;
                    $produk->update();
                    $pesanan=Pesanan::find($id)->update($request->all());
                }
                alert()->success('Pesanan berhasil di Edit', 'Success');
                return redirect('/admin/semua/pesanan');
            }  
        }
       
  
        alert()->error('Pesanan gagal di Edit', 'gagal');
        return redirect('/admin/semua/pesanan'); 
    }
}
