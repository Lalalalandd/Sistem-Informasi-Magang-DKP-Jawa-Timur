<?php

namespace App\Http\Controllers;

use App\Models\PeriodeMagang;
use App\Http\Requests\UpdatePeriodeMagangRequest;
use Illuminate\Http\Request;

class PeriodeMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periodes = PeriodeMagang::orderBy('id', 'desc')->get();

        foreach ($periodes as $periode) {
            // Cek apakah jumlah pendaftaran sudah mencapai atau melebihi kuota
            if ($periode->pendaftaran()->count() >= $periode->kuota) {
                $periode->status = 'penuh'; 
                $periode->save();
            }
        }

        return view('periode', [
            'tittle' => 'Periode Magang',
            'periodes' => $periodes
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
            'nama_periode' => 'required',
            'tanggal_mulai' => 'required|unique:periode_magang',
            'tanggal_selesai' => 'required',
            'kuota' => 'required',
            'status' => 'required',
        ]);
        PeriodeMagang::create($validatedData);

        return redirect('/periodemagang');
    }

    /**
     * Display the specified resource.
     */
    public function show(PeriodeMagang $periodeMagang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PeriodeMagang $periodeMagang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $periodeMagang = PeriodeMagang::findOrFail($id);
        $periodeMagangData = $request->only([
            'nama_periode',
            'tanggal_mulai',
            'tanggal_selesai',
            'kuota',
            'status',
        ]);
        $periodeMagang->update($periodeMagangData);
        return redirect('/periodemagang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $periode_magang = PeriodeMagang::findOrFail($id);
        $periode_magang->delete();

        return redirect('/periodemagang');
    }
}
