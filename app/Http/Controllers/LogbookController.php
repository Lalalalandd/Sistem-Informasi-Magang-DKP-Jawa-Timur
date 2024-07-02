<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use Illuminate\Http\Request;
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
    public function store(Request $request)
    {
        // dd($request);
        $user = Auth::user();
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'aktivitas' => 'required',
            'bukti' => 'mimes:jpg,png|max:4096',
            'presensi' => 'required',
            'status' => 'required',
        ]);

        if($request->file('bukti')){
            $buktiPath = $request->file('bukti')->store('bukti');
            $validatedData['bukti'] = $buktiPath;
        }

        $validatedData['user_id'] = $user->id;
        Logbook::create($validatedData);
        return redirect('logbook')->with('success', 'Data aktivitas harian berhasil ditambahkan.');
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
