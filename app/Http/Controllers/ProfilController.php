<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index(User $user){
        $user=User::where('id', Auth::user()->id)->first();
        return view('ProfilUser', compact('user'));
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
        return redirect('myprofil'); 
    }
}
