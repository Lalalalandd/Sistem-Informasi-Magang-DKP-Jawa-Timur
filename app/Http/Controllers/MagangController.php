<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('role', 'mahasiswa')->with('detail')->get();
        $user->load('dinas');
       
        return view('magang', [
            'tittle' => 'Magang',
            'magang' =>  $user
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
        $userData = $request->only([
            'surat_balasan',
            'status',
        ]);

        // dd($request);
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
            if ($detail) {
                $detail->update(['surat_balasan' => $path]);
            } else {
                // Jika detail belum ada, buat baru
                $user->detail()->create(['surat_balasan' => $path]);
            }
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