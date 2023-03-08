<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananDetailController extends Controller
{
    public function keranjang(){
        $user=User::where('id', Auth::user()->id)->first();
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if(!empty($pesanan)){
            $pesanandetails=PesananDetail::where('pesanan_id', $pesanan->id)->get();
            return view('keranjang', compact('pesanan', 'pesanandetails', 'user'));
        }
        return view('keranjang', compact('pesanan'));
    }
    public function delete($id){
        //update harga saat dihapus
        $pesananDetail=PesananDetail::where('id', $id)->first();
        $pesanan=Pesanan::where('id', $pesananDetail->pesanan_id)->first();
        $pesanan->total_harga = $pesanan->total_harga-$pesananDetail->jumlah_harga;
        $pesanan->update();

        $pesananDetail->delete();
        alert()->error('Pesanan berhasil dihapus', 'Hapus');
        return redirect('keranjang');
    }
    public function konfirmasi(){
        //validasi data kirim
        $user=User::where('id', Auth::user()->id)->first();
        if(empty($user->name) || empty($user->nohp) || empty($user->alamat)){
            alert()->error('Harap data dilengkap', 'Gagal');
            return redirect('keranjang');
        }
        //
        $pesanan=Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $cek_pesanan_details=PesananDetail::where('pesanan_id', $pesanan->id)->first();
        if(empty($cek_pesanan_details)){
            alert()->error('Error Belum ada transaksi', 'Error');
            return redirect('keranjang');
        }
        $pesanan->status=1;
        $pesanan->tanggal=now();
        $pesanan->update();

        //kurangi stok saat chekout
        $pesanan_details=PesananDetail::where('pesanan_id', $pesanan->id)->get();
        foreach ($pesanan_details as $pesanan_detail){
            $produk = Produk::where('id', $pesanan_detail->produk_id)->first();
            $produk->stok=$produk->stok-$pesanan_detail->jumlah_pesanan;
            $produk->update();
            
        }
        alert()->success('Pesanan berhasil di Checkout', 'Success');
        return redirect('pesanan');
    }
    public function updatedata(Request $request){
        $validateData=$request->validate([
            'name' => 'required|min:3',
            'nohp' => 'required|min:10|max:13',
            'alamat' => 'required|min:20'
        ]);
        User::where('id', Auth::user()->id)
                ->update($validateData);
        alert()->success('Data berhasil di Perbarui', 'Success');
        return redirect('keranjang'); 

    }
}
