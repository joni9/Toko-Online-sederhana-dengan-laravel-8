<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produks=Produk::with(['kategori'])->orderBy('nama', 'asc')->filter(request(['search']))->paginate(10);
        $produks->appends($request->all());
        return view('Admin.produk.index',[
            'produks' => $produks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris=Kategori::all();
        return view ('Admin.produk.create', [
            'kategoris' => $kategoris,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'nama' => 'required|min:3|unique:produks',
            'harga' => 'required',
            'stok' => 'required',
            'kategori_id' => 'required',
            'gambar_produk' => 'required|image|file|max:1024',
            'keterangan' => 'required',
        ]);
        if ($request->file('gambar_produk')){
            $validateData['gambar_produk'] = $request->file('gambar_produk')->store('gambarProduk');//penyimpanan gambar produk
        }
        Produk::create($validateData);
        alert()->success('Produk berhasil di Tambahkan', 'Success');
        return redirect('/admin/produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $kategoris=Kategori::all();
        return view('admin.produk.edit', [
            'produk' => $produk,
            'kategoris' => $kategoris
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $validateData=$request->validate([
            'nama' => 'required|min:3',
            'harga' => 'required',
            'stok' => 'required',
            'kategori_id' => 'required',
            'gambar_produk' => 'image|file|max:1024',
            'keterangan' => 'required',
        ]);
        //validasi update agar tidak sama
        if($request->nama != $produk->nama){
            $validateData=$request->validate([
                'nama' => 'required|min:3|unique:produks',
            ]);
        }
        if($request->file('gambar_produk')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['gambar_produk'] = $request->file('gambar_produk')->store('gambarProduk');
        }
        produk::where('id', $produk->id)
                ->update($validateData);
                alert()->success('Produk berhasil di Perbarui', 'Success');
        return redirect('/admin/produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        if($produk->gambar_produk){//untuk menghapus gambar yang ada
            Storage::delete($produk->gambar_produk);
        }
        produk::destroy($produk->id);
        alert()->error('Produk berhasil di Hapus', 'Hapus');
        return redirect('/admin/produk');
    }
}
