<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris=Kategori::orderBy('nama', 'asc')->get();
        return view('Admin.kategori.index',[
            'kategoris' => $kategoris,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.kategori.create');
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
            'nama'            => 'required|min:3|unique:kategoris',
            'gambar_kategori' => 'required|image|file|max:1024'
        ]);
        if ($request->file('gambar_kategori')){
            $validateData['gambar_kategori'] = $request->file('gambar_kategori')->store('gambarKategori');//penyimpanan gambar
        }
        Kategori::create($validateData);
        alert()->success('Kategori berhasil di Tambahkan', 'Success');
        return redirect('/admin/kategori');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', [
            'kategori' => $kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $validateData=$request->validate([
            'nama' => 'required|min:3',
            'gambar_kategori' => 'image|file|max:1024'
        ]);
        //validasi update agar tidak sama
        if($request->nama != $kategori->nama){
            $validateData=$request->validate([
                'nama' => 'required|min:3|unique:kategoris',
            ]);
        }
        if($request->file('gambar_kategori')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['gambar_kategori'] = $request->file('gambar_kategori')->store('gambarKategori');
        }
        Kategori::where('id', $kategori->id)
                ->update($validateData);
                alert()->success('Kategori berhasil di Perbarui', 'Success');
        return redirect('/admin/kategori');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        if($kategori->gambar_kategori){//untuk menghapus gambar yang ada
            Storage::delete($kategori->gambar_kategori);
        }
        kategori::destroy($kategori->id);
        alert()->error('Kategori berhasil di Hapus', 'Hapus');
        return redirect('/admin/kategori');

    }
}
