<?php

namespace App\Http\Controllers;

use App\Models\Slidder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSlidderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slidders=Slidder::all();
        return view('Admin.slidder.index', compact('slidders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.slidder.create');
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
            'gambar_slidder' => 'required|image|file|max:1024'
        ]);
        if ($request->file('gambar_slidder')){
            $validateData['gambar_slidder'] = $request->file('gambar_slidder')->store('gambarSlidder');//penyimpanan gambar
        }
        Slidder::create($validateData);
        alert()->success('Slidder berhasil di Tambahkan', 'Success');
        return redirect('/admin/slidder');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slidder  $slidder
     * @return \Illuminate\Http\Response
     */
    public function show(Slidder $slidder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slidder  $slidder
     * @return \Illuminate\Http\Response
     */
    public function edit(Slidder $slidder)
    {
        return view('admin.slidder.edit', compact('slidder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slidder  $slidder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slidder $slidder)
    {
        $validateData=$request->validate([
            'gambar_slidder' => 'image|file|max:1024'
        ]);
        if($request->file('gambar_slidder')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['gambar_slidder'] = $request->file('gambar_slidder')->store('gambarSlidder');
        }
        Slidder::where('id', $slidder->id)
                ->update($validateData);
                alert()->success('Slidder berhasil di Perbarui', 'Success');
        return redirect('/admin/slidder');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slidder  $slidder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slidder $slidder)
    {
        if($slidder->gambar_slidder){//untuk menghapus gambar yang ada
            Storage::delete($slidder->gambar_slidder);
        }
        Slidder::destroy($slidder->id);
        alert()->error('Slidder berhasil di Hapus', 'Hapus');
        return redirect('/admin/slidder');

    }
}
