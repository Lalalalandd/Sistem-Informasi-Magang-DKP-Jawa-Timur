<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dinas;
use App\Models\Tugas;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        return view('beranda', [
            'tittle' => 'Beranda'
        ]);
    }

    public function index_pegawai()
    {
        return view('beranda', [
            'tittle' => 'Beranda'
        ]);
    }

    public function index_mahasiswa(Request $request)
    {
        $data = $request->session()->get('user_id');
        $user = User::with('detail')
            ->with('dinas')
            ->find($data);
        $tugas = Tugas::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        $dinas = Dinas::where('id', $user->dinas_id)->first();
        return view('mahasiswa.beranda_mahasiswa', [
            'tittle' => 'Beranda',
            'user' => $user,
            'tugas' => $tugas,
            'dinas' => $dinas
        ]);
    }


    public function show_mahasiswa()
    {
    }
}
