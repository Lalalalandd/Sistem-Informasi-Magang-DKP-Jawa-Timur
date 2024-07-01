<?php

namespace App\Http\Controllers;

use App\Models\logbook;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorelogbookRequest;
use App\Http\Requests\UpdatelogbookRequest;

class LogbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Auth::user();
        $magang = logbook::where('user_id', $mahasiswa->id)->get();
        $detail = Auth::user()->detail;
        return view('mahasiswa.magang_mahasiswa', [
            'tittle' => 'Magang',
            'mahasiswa' =>  $mahasiswa,
            'detail' => $detail,
            'magang' => $magang
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
    public function store(StorelogbookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(logbook $logbook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(logbook $logbook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelogbookRequest $request, logbook $logbook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(logbook $logbook)
    {
        //
    }
}
