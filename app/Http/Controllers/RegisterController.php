<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dinas;
use App\Models\Sub_Bagian;
use App\Models\Universitas;
use Illuminate\Http\Request;
use App\Models\PeriodeMagang;
use App\Models\PendaftarMahasiswa;
use Illuminate\Validation\Rules\File;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register', [
            'tittle' => 'Register',
            'dinas' => Dinas::all(),
            'sub_bagian' => Sub_Bagian::all(),
            'univ' => Universitas::all()
        ]);
    }

    public function store(Request $request)
    {
        $periode_magang = PeriodeMagang::where('status', 'aktif')
        ->orderBy('id','desc')
        ->first();

        if ($periode_magang->pendaftaran()->count() >= $periode_magang->kuota) {
            return redirect('/')->with('error', 'Kuota sudah penuh.');
        }

        $validatedDataUser = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|max:255|min:5',
            'dinas_id' => 'required'
        ]);

        $validatedDataPendaftar = $request->validate([
            'nama_kelompok_1' => 'max:255',
            'nama_kelompok_2' => 'max:255',
            'universitas_id' => 'required',
            'fakultas' => 'required',
            'prodi' => 'required',
            'surat_pengantar' => [
                'required',
                File::types(['pdf', 'doc', 'docx'])
                    ->max(12 * 1024),
            ],
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'sub_bagian_id' => 'required',
        ]);

       
        if($request->file('surat_pengantar')){
            $suratPath = $request->file('surat_pengantar')->store('surat-pengantar');
            $validatedDataPendaftar['surat_pengantar'] = $suratPath;
        }

        $validatedDataUser['role'] = 'mahasiswa';
        $validatedDataPendaftar['periode_magang_id'] = $periode_magang['id'];
       
        $user = User::create($validatedDataUser);
        $user->detail()->create($validatedDataPendaftar);
        return redirect('/')->with('success', 'Terima Kasih Sudah Mendaftar, Silahkan Login!');
    }
}
