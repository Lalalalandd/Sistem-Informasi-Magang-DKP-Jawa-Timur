<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dinas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        
        return view("/profil", [
            "tittle" => "Profil",
            "user" => $user,
            "dinas" => $user->dinas
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
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Auth::user()->role != "mahasiswa") {
            $user = User::findOrfail($id);
            $validatedData = $request->validate([
                'name' => 'nullable|max:255',
                'email' => 'nullable|email',
                'image' => 'nullable|mimes:jpg,png',
            ]);

            // Update data tugas
            $user->update($validatedData);

            // Proses file lampiran jika ada
            if ($request->hasFile('image')) {
                // Hapus file lama jika ada
                if ($user->image && Storage::disk('public')->exists($user->image)) {
                    Storage::disk('public')->delete($user->image);
                }

                // Simpan file baru
                $imagePath = $request->file('image')->store('image', 'public');

                // Update path file di database
                $user->image = $imagePath;
                $user->save();
            }
        } else {
        
            $user = User::with('detail')->findOrFail($id);
            $validatedData = $request->validate([
                'name' => 'nullable|max:255',
                'email' => 'nullable|email',
                'image' => 'nullable|mimes:jpg,png',
            ]);

            $validateDetailData = $request->validate([
                'nama_kelompok_1' => 'nullable|max:255',
                'nama_kelompok_2' => 'nullable|max:255',
            ]);

            // Update data tugas
            $user->update($validatedData);
            $user->detail->update($validateDetailData);

            // Proses file lampiran jika ada
            if ($request->hasFile('image')) {
                // Hapus file lama jika ada
                if ($user->image && Storage::disk('public')->exists($user->image)) {
                    Storage::disk('public')->delete($user->image);
                }

                // Simpan file baru
                $imagePath = $request->file('image')->store('image', 'public');

                // Update path file di database
                $user->image = $imagePath;
                $user->save();
            }
        }

        return redirect('/profil')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
