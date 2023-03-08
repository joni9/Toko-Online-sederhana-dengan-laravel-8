<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminPesananController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminSlidderController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesananDetailController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', [HomeController::class, 'home'])->name('dashboard1');
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/produk', [HomeController::class, 'produks'])->name('produk');
Route::get('/produk/detail/{produk:id}', [HomeController::class, 'show'])->name('produk_detail');
// Route::get('/produk/kategori/{kategori:id}', [HomeController::class, 'show_kategori']);
Route::get('/kategori', [HomeController::class, 'kategoris'])->name('kategori');
Route::get('/keranjang', [PesananDetailController::class, 'keranjang'])->name('keranjang')->middleware('auth');
Route::delete('/keranjang/{id}', [PesananDetailController::class, 'delete'])->middleware('auth');
Route::get('/keranjang/checkout', [PesananDetailController::class, 'konfirmasi'])->middleware('auth');
Route::post('/keranjang/updatedata', [PesananDetailController::class, 'updatedata'])->middleware('auth');
Route::get('/myprofil', [ProfilController::class, 'index'])->name('myprofil')->middleware('auth');
Route::post('/myprofil/updatedata', [ProfilController::class, 'updatedata'])->middleware('auth');
Route::post('/pesan/{id}', [PesanController::class, 'pesan'])->middleware('auth');
Route::get('/pesanan', [PesanController::class, 'index'])->name('pesanan')->middleware('auth');
Route::get('/pesanan/detail/{pesanan:id}', [PesanController::class, 'pesanan_detail'])->name('pesanan_detail')->middleware('auth');
Route::get('/pesanan/detail/nota/{pesanan:id}', [PesanController::class, 'notapdf'])->middleware('auth');
Route::get('/pesanan/buktitf/{pesanan:id}', [PesanController::class, 'bukti_tf'])->name('pesanan_detail_tf')->middleware('auth');
Route::put('/pesanan/buktitf/{id}', [PesanController::class, 'konfirmasi_bukti_tf'])->middleware('auth');
Route::get('/admin', [AdminController::class, 'index'])->middleware(['admin'])->name('admin');
Route::resource('/admin/produk', AdminProdukController::class)->middleware('admin');
Route::resource('/admin/kategori', AdminKategoriController::class)->middleware('admin');
Route::resource('/admin/slidder', AdminSlidderController::class)->middleware('admin');
Route::get('/admin/pesanan/masuk', [AdminPesananController::class, 'pesanan_masuk'])->middleware('admin');
Route::get('/admin/pesanan/masuk/detail/{pesanan:id}', [AdminPesananController::class, 'detail_pesanan_masuk'])->middleware('admin');
Route::get('/admin/pesanan/masuk/proses/{pesanan:id}', [AdminPesananController::class, 'proses_pesanan_masuk'])->middleware('admin');
Route::put('/admin/pesanan/masuk/proses/kofirmasi/{id}', [AdminPesananController::class, 'konfrimasi_pesanan_masuk'])->middleware('admin');
Route::get('/admin/semua/pesanan', [AdminPesananController::class, 'semua_pesanan'])->middleware('admin');
Route::get('/admin/semua/pesanan/detail/{pesanan:id}', [AdminPesananController::class, 'detail_semua_pesanan'])->middleware('admin');
Route::get('/admin/semua/pesanan/edit/{pesanan:id}', [AdminPesananController::class, 'edit_semua_pesanan'])->middleware('admin');
Route::put('/admin/semua/pesanan/edit/{pesanan:id}', [AdminPesananController::class, 'konfirmasi_edit_semua_pesanan'])->middleware('admin');
Route::get('/admin/semua/user', [AdminUserController::class, 'index'])->middleware('admin');
Route::get('/admin/semua/user/download', [AdminUserController::class, 'userexport'])->middleware('admin')->name('exportpelanggan');
require __DIR__.'/auth.php';
