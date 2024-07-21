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
    public function index(Request $request)
    {
        $query = Logbook::query();

        // Filter berdasarkan status
        $query->when($request->status, function ($query) use ($request) {
            return $query->where('status', $request->status);
        });

        $logbook = $query->with('user')->paginate(7);
        return view('aktivitas_mhsw',[
            'tittle' => 'Aktivitas Mahasiswa',
            'logbook' => $logbook,
            'status' => $request->status
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
        $logbook = Logbook::findOrFail($id);
        $logbook->status = $request->input('status');
        $logbook->save();
        return redirect('/aktivitas_mhsw');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
