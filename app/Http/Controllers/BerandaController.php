<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dinas;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    // public function index()
    // {
    //     $user = User::with('detail')
    //         ->where('role', 'mahasiswa')
    //         ->count();
    //     $universitasTerbanyak = User::join('pendaftar_mahasiswa', 'users.id', '=', 'pendaftar_mahasiswa.user_id')
    //         ->select('pendaftar_mahasiswa.universitas', DB::raw('count(*) as jumlah'))
    //         ->where('users.role', 'mahasiswa')
    //         ->groupBy('pendaftar_mahasiswa.universitas')
    //         ->orderBy('jumlah', 'desc')
    //         ->take(10)
    //         ->get();

    //     $persentase = ($universitasTerbanyak->jumlah / $user) * 100;
    //     return view('beranda', [
    //         'tittle' => 'Beranda',
    //         'univ' => $universitasTerbanyak,
    //         'persentase' => $persentase
    //     ]);
    // }
    public function index()
    {
        // // Menghitung total mahasiswa
        // $totalMahasiswa = User::where('role', 'mahasiswa')
        //     ->count();

        $totalMahasiswaDiterima = User::join('pendaftar_mahasiswa', 'users.id', '=', 'pendaftar_mahasiswa.user_id')
            ->where('users.role', 'mahasiswa')
            ->where('pendaftar_mahasiswa.penerimaan', 'diterima')
            ->count();

        // Mengambil 10 universitas terbanyak berdasarkan jumlah mahasiswa
        $universitasTerbanyak = User::join('pendaftar_mahasiswa', 'users.id', '=', 'pendaftar_mahasiswa.user_id')
            ->join('universitas', 'pendaftar_mahasiswa.universitas_id', '=', 'universitas.id')
            ->select('universitas.universitas as universitas', DB::raw('count(*) as jumlah'))
            ->where('users.role', 'mahasiswa')
            ->where('pendaftar_mahasiswa.penerimaan', 'diterima')
            ->groupBy('universitas.universitas')
            ->orderBy('jumlah', 'desc')
            ->take(10)
            ->get();

        // Menghitung persentase untuk setiap universitas
        $universitasTerbanyak->transform(function ($item) use ($totalMahasiswaDiterima) {
            $item->persentase = ($item->jumlah / $totalMahasiswaDiterima) * 100;
            return $item;
        });

        return view('beranda', [
            'tittle' => 'Beranda',
            'universitasTerbanyak' => $universitasTerbanyak,
            'total' => $totalMahasiswaDiterima
        ]);
    }


    public function index_pegawai()
    {
        return view('pegawai.beranda_pegawai', [
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
