<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BerandaController extends Controller
{
    public function index(){
        return view('beranda', [
            'tittle' => 'Beranda'
        ]);
    }

    public function index_pegawai(){
        return view('beranda', [
            'tittle' => 'Beranda'
        ]);
    }

    public function index_mahasiswa(Request $request){
        $data = $request->session()->get('user_id');
        $user = User::with('detail')
        ->with('dinas')
        ->find($data);
        return view('mahasiswa.beranda_mahasiswa', [
            'tittle' => 'Beranda',
            'user' => $user
        ]);
    }
    

    public function show_mahasiswa(){
        
        
    }
}
