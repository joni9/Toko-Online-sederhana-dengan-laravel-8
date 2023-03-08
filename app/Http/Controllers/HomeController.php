<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Produk;
use App\Models\Slidder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home() {
        $produks=Produk::latest()->paginate(3);
        $kategoris=Kategori::latest()->paginate(4);
        $slidders=Slidder::all();
        return view('home',[
            'produks' => $produks,
            'kategoris' => $kategoris,
            'slidders' => $slidders
        ]);
    }
    public function produks(Request $request){
        $produks=Produk::orderBy('nama', 'asc')->filter(request(['search', 'kategori']))->paginate(12);
        $produks->withPath('produk');//untuk mengamankan paginasi
        $produks->appends($request->all());//agar searching ikut di paginasi
        return view('produk',[
            'produks' => $produks,
        ]);
    }
    public function show(Produk $produk){
        return view('produkDetail',[
            'produk' => $produk,
        ]);
    }
    public function kategoris(){
        $kategoris=Kategori::orderBy('nama', 'asc')->get();
        return view('kategori',[
            'kategoris' => $kategoris,
        ]);
    }
    public function show_kategori( Kategori $kategori){
        $produks=Produk::where('kategori_id', $kategori->id)->latest()->paginate(12);
        return view('kategoriDetail',compact('produks', 'kategori'));
    }
    
}
