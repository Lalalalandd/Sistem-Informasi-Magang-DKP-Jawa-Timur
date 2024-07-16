<?php

namespace App\Http\Controllers;

use App\Models\Dinas;
use Illuminate\Http\Request;


class DinasController extends Controller
{
    public function index()
    {
        return view('dinas', [
            'tittle' => 'Dinas',
            'dinas' => Dinas::paginate(10)
        ]);
    }

    public function store(Request $request)
    {
        // Dinas::create([
        //     'dinas' => $request->dinas
        // ]);
        $validatedData = $request->validate([
            'dinas' => 'required|max:255|unique:dinas',
            'alamat' => 'required|max:255',
           ]);
        Dinas::create($validatedData);

        return redirect('/dinas');
    }

    public function update(Request $request, $id)
    {
        $dinas = Dinas::findOrFail($id);
        $dinas->dinas = $request->input('dinas');
        $dinas->save();
        return redirect('/dinas');
    }

    // public function destroy(Dinas $dinas)
    // {
    //     Dinas::destroy($dinas->id);

    //     return redirect('/dinas');
    // }

    public function destroy($id)
    {
        $dinas = Dinas::findOrFail($id);
        $dinas->delete();

        return redirect('/dinas'); // Redirect ke halaman index setelah menghapus data
    }
}
