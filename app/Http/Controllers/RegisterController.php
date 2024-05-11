<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dinas;
use App\Models\Sub_Bagian;
use App\Models\PendaftarMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register', [
            'tittle' => 'Register',
            'dinas' => Dinas::all(),
            'sub_bagian' => Sub_Bagian::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedDataUser = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|max:255|min:5'
        ]);

        $validatedDataPendaftar = $request->validate([
            'nama_kelompok_1' => 'max:255',
            'nama_kelompok_2' => 'max:255',
            'universitas' => 'required',
            'fakultas' => 'required',
            'prodi' => 'required',
            'surat_pengantar' => [
                'required',
                File::types(['pdf', 'doc', 'docx'])
                    ->max(12 * 1024),
            ],
            'dinas' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'sub_bagian' => 'required',
        ]);

       
        if($request->file('surat_pengantar')){
            $suratPath = $request->file('surat_pengantar')->store('surat-pengantar');
            $validatedDataPendaftar['surat_pengantar'] = $suratPath;
        }

        $validatedDataUser['status'] = 0;
        $validatedDataUser['role'] = 'mahasiswa';
       
        $user = User::create($validatedDataUser);
        $user->detail()->create($validatedDataPendaftar);
        return redirect('/')->with('success', 'Terima Kasih Sudah Mendaftar, Silahkan Login!');
    }
}
