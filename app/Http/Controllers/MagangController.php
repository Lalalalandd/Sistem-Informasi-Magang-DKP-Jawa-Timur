<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('role', 'mahasiswa')->with('detail', 'dinas')->get();
        return view('magang', [
            'tittle' => 'Magang',
            'magang' =>  $user
        ]);
    }

    public function index_pegawai()
    {
        $pegawai = Auth::user();
        $user = User::where('role', 'mahasiswa')
        ->where('dinas_id', $pegawai->dinas_id)
        ->with('detail','dinas')
        ->get();
     
        return view('pegawai.magang_pegawai', [
            'tittle' => 'Magang',
            'magang' =>  $user
        ]);
    }

    public function index_mahasiswa()
    {
        $mahasiswa = Auth::user();
        $detail = Auth::user()->detail;
        return view('mahasiswa.magang_mahasiswa', [
            'tittle' => 'Magang',
            'magang' =>  $mahasiswa,
            'detail' => $detail
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $user = User::with('detail')->findOrFail($id);
        if ($request->penerimaan == "diterima") {
            $status = 1;
        } elseif ($request->penerimaan == "ditolak" || $request->penerimaan == "batal") {
            $status = 0;
        } else {
            $status = null; 
        }
    
        $userData = $request->only(['surat_balasan']);
        $userData['status'] = $status;
        $detailData = $request->only(['penerimaan']);
    
        
        $user->detail->update($detailData);
        $user->update($userData);
    
        if ($request->hasFile('surat_balasan')) {
            $detail = $user->detail; // Ambil detail yang terkait
    
            if ($detail && $detail->surat_balasan) {
                Storage::disk('public')->delete($detail->surat_balasan);
            }
    
            // Simpan file baru
            $file = $request->file('surat_balasan');
            $path = $file->store('surat_balasan', 'public');
    
            // Perbarui path di detail
            $detail->update(['surat_balasan' => $path]);
        }
    
        return redirect('/magang');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
