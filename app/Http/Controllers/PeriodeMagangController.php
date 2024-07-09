<?php

namespace App\Http\Controllers;

use App\Models\PeriodeMagang;
use App\Http\Requests\StorePeriodeMagangRequest;
use App\Http\Requests\UpdatePeriodeMagangRequest;

class PeriodeMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periode = PeriodeMagang::All();
        return view ("/periode",[
            'tittle' => 'Periode Magang',
            'periode' => $periode
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
    public function store(StorePeriodeMagangRequest $request)
    {
        //
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
    public function update(UpdatePeriodeMagangRequest $request, PeriodeMagang $periodeMagang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PeriodeMagang $periodeMagang)
    {
        //
    }
}
