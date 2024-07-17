<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dinas;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTugasRequest;
use App\Http\Requests\UpdateTugasRequest;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tugas = Tugas::whereHas('user', function($query) {
            $query->where('status', 1);
        })
        ->with(['user' => function($query) {
            $query->where('status', 1);
        }])
        ->paginate(10);

        $user = User::where('role', 'mahasiswa')
        ->where('status', 1)
        ->with('dinas')
        ->get();
        
        return view('tugas', [
            'tittle' => 'Tugas',
            'dinas' => Dinas::all(),
            'user' => $user,
            'tugas' => $tugas
        ]);
    }
    public function index_pegawai()
    {
        $user = Auth::user();
        $tugas = Tugas::where('dinas_id', $user->dinas_id)
        ->whereHas('user', function($query) {
            $query->where('status', 1);
        })
        ->with(['user' => function($query) {
            $query->where('status', 1);
        }])
        ->get();
        
        return view('pegawai.tugas_pegawai', [
            'tittle' => 'Tugas',
            'dinas' => Dinas::all(),
            'user' => User::where('dinas_id', $user->dinas_id)
                ->where('role', 'mahasiswa')
                ->where('status', 1)
                ->get(),
            'tugas' => $tugas
        ]);
    }
    
    public function index_mahasiswa()
    {
        $user = Auth::user();
        return view('mahasiswa.tugas_mahasiswa', [
            'tittle' => 'Tugas',
            'tugas' => Tugas::where('user_id', $user->id)
                ->orderBy('id', 'desc')
                ->paginate(10)

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
        $user = Auth::user();
        $validatedData = $request->validate([
            'tugas' => 'required|max:255',
            'dinas_id' => 'required',
            'user_id' => 'required',
            'tgl_diberikan' => 'required',
            'tgl_dikumpulkan' => 'required',
            'lampiran' => 'mimes:jpg,png,doc,docx,pdf|max:4096',
            'status' => 'required',
        ]);

        if($request->file('lampiran')){
            $lampiranPath = $request->file('lampiran')->store('lampiran');
            $validatedData['lampiran'] = $lampiranPath;
        }

        $validatedData['dinas_id'] = $user->dinas_id;
        Tugas::create($validatedData);
        return redirect('/tugas')->with('success', 'Data tugas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tugas $tugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tugas $tugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tugas = Tugas::findOrFail($id);
        $validatedData = $request->validate([
            'tugas' => 'required|max:255',
            'dinas_id' => 'required',
            'tgl_diberikan' => 'required|date',
            'tgl_dikumpulkan' => 'required|date',
            'status' => 'required',
            'lampiran' => 'nullable|mimes:jpg,png,doc,docx|max:4096',
        ]);
    
        // Update data tugas
        $tugas->update($validatedData);
    
        // Proses file lampiran jika ada
        if ($request->hasFile('lampiran')) {
            // Hapus file lama jika ada
            if ($tugas->lampiran) {
                Storage::disk('public')->delete($tugas->lampiran);
            }
    
            // Simpan file baru
            $lampiranPath = $request->file('lampiran')->store('lampiran', 'public');
    
            // Update path file di database
            $tugas->update(['lampiran' => $lampiranPath]);
        }
    
        return redirect('/tugas')->with('success', 'Data tugas berhasil diperbarui.');
    }

    public function kerjakan(Request $request, string $id)
    {
        $tugas = Tugas::findOrFail($id);
        $tugasData = $request->only([
            'tugas',
            'dinas',
            'tgl_diberikan',
            'tgl_dikumpulkan',
            'status',
        ]);
        $tugas->update($tugasData);
        return redirect('/tugas_mahasiswa')->with('success', 'Status tugas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tugas = Tugas::findOrFail($id);
        $tugas->delete();
        return redirect('/tugas');
    }
}
