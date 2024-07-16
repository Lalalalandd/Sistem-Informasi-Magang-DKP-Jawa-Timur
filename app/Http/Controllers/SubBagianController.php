<?php

namespace App\Http\Controllers;

use App\Models\Sub_Bagian;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSub_BagianRequest;
use App\Http\Requests\UpdateSub_BagianRequest;

class SubBagianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sub_bagian', [
            'tittle' => 'Sub Bagian',
            'sub_bagian' => Sub_Bagian::paginate(10)
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
            'sub_bagian' => 'required|max:255|unique:sub_bagian',
           ]);
        Sub_Bagian::create($validatedData);

        return redirect('/subbagian');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sub_Bagian $sub_Bagian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sub_Bagian $sub_Bagian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $sub_bagian = Sub_Bagian::findOrFail($id);
        $sub_bagian->sub_bagian = $request->input('sub_bagian');
        $sub_bagian->save();
        return redirect('/subbagian');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sub_bagian = Sub_Bagian::findOrFail($id);
        $sub_bagian->delete();

        return redirect('/subbagian');
    }
}
