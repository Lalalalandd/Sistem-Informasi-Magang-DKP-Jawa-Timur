<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Http\Requests\StoreTugasRequest;
use App\Http\Requests\UpdateTugasRequest;
use App\Models\Dinas;
use App\Models\Sub_Bagian;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tugas', [
            'tittle' => 'Tugas',
            'dinas' => Dinas::all(),
            'sub_bagian' => Sub_Bagian::all(),
            'tugas' => Tugas::all()
        ]);
    }
    public function index_mahasiswa()
    {
        return view('mahasiswa.tugas_mahasiswa', [
            'tittle' => 'Tugas',
            'tugas' => Tugas::all()
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
        $validatedData = $request->validate([
            'tugas' => 'required|max:255',
            'dinas' => 'required',
            'sub_bagian' => 'required',
            'status' => 'required',
        ]);

        Tugas::create($validatedData);
        return redirect('/tugas');
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
        $tugasData = $request->only([
            'tugas',
            'dinas',
            'sub_bagian',
            'status',
        ]);
        $tugas->update($tugasData);
        return redirect('/tugas');
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
