<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Logbook;
use Illuminate\Http\Request;

class AktivitasMhswController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $logbook = Logbook::where('status','ditinjau')
        ->with('user')
        ->paginate(10);
        return view('aktivitas_mhsw',[
            'tittle' => 'Aktivitas Mahasiswa',
            'logbook' => $logbook
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
