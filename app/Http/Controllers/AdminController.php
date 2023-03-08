<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\Slidder;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $kategori=Kategori::where('nama', '!=', null)->count();
        $produk=Produk::where('nama', '!=', null)->count();
        $slidder=Slidder::where('gambar_slidder', '!=', null)->count();
        $pesanan_masuk=Pesanan::where('status', 1)->where('status_pesanan', 'belum lunas')->count();
        $semua_pesanan=Pesanan::where('status', 1)->where('status_pesanan', '!=', 'belum lunas')->count();
        $user=User::where('roles','user')->count();
        return view('Admin.index', compact('kategori', 'produk', 'slidder', 'pesanan_masuk', 'semua_pesanan', 'user'));
    }
    
}
