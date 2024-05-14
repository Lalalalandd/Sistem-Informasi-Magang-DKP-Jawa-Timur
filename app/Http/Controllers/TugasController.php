<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dinas;
use App\Models\Tugas;
use App\Models\Sub_Bagian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTugasRequest;
use App\Http\Requests\UpdateTugasRequest;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view('tugas', [
            'tittle' => 'Tugas',
            'dinas' => Dinas::all(),
            'sub_bagian' => Sub_Bagian::all(),
            'user' => User::where('dinas_id', $user->dinas_id)
                ->where('role', 'mahasiswa')
                ->get(),
            'tugas' => Tugas::where('dinas_id', $user->dinas_id)->get()
        ]);
    }
    public function index_mahasiswa()
    {
        $user = Auth::user();
        $detailUser = $user->detail;
        return view('mahasiswa.tugas_mahasiswa', [
            'tittle' => 'Tugas',
            'tugas' => Tugas::where('user_id', $user->id)
                ->orderBy('id', 'desc')
                ->get()

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
            'sub_bagian' => 'required',
            'status' => 'required',
        ]);

        $validatedData['dinas_id'] = $user->dinas_id;
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

    public function kerjakan(Request $request, string $id)
    {
        $tugas = Tugas::findOrFail($id);
        $tugasData = $request->only([
            'tugas',
            'dinas',
            'sub_bagian',
            'status',
        ]);
        $tugas->update($tugasData);
        return redirect('/tugas_mahasiswa');
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
