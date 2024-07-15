<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dinas;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dinas = Dinas::all();
        $user = User::where('role', 'pegawai')
            ->with('dinas')
            ->paginate(10);
       
        return view('pegawai', [
            'tittle' => 'Pegawai',
            'user' => $user,
            'dinas' => $dinas,
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
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|unique:users|email:dns',
                'password' => 'required|max:255|min:5',
                'dinas_id' => 'required|unique:users',
                'role' => 'required',
                'status' => 'required'
            ]);
    
            User::create($validatedData);
            return redirect('/pegawai')->with('success', 'Pegawai berhasil ditambahkan!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect('/pegawai')
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Data tidak sesuai, silakan periksa kembali.');
        }
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
        $user = User::findOrFail($id);
        $userData = $request->only([
            'name',
            'email',
            'password',
            'dinas_id',
            'status',
        ]);
        $user->update($userData);
        return redirect('/pegawai')->with('success', 'Data pegawai berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dinas = User::findOrFail($id);
        $dinas->delete();
        return redirect('/pegawai')->with('success','Pegawai berhasil dihapus!');
    }
}
