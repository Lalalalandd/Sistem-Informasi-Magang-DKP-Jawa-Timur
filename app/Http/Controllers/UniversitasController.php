<?php

namespace App\Http\Controllers;

use App\Models\Universitas;
use App\Http\Requests\StoreUniversitasRequest;
use App\Http\Requests\UpdateUniversitasRequest;

class UniversitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $univ = Universitas::paginate(10);
        return view('universitas' ,[
            'tittle' => 'Universitas',
            'universitas' => $univ
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
    public function store(StoreUniversitasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Universitas $universitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Universitas $universitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUniversitasRequest $request, Universitas $universitas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Universitas $universitas)
    {
        //
    }
}
