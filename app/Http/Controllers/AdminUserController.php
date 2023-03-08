<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminUserController extends Controller
{
    public function index(Request $request){
        $users=User::where('roles', 'user')->orderBy('name', 'asc')->filter(request(['search']))->paginate(10);
        $users->appends($request->all());//agar searching ikut di paginasi
        return view('Admin.Users.index', compact('users'));
    }
    public function userexport(){
        return Excel::download(new UserExport, 'datapelanggan.xlsx');
    }
}
