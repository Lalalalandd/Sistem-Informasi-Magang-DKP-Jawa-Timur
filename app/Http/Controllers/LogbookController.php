<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $magang = logbook::where('user_id', $mahasiswa->id)->paginate(10);
        
        //Menghitung jumlah presesni
        $masuk = $magang->where('presensi', 'masuk')->count();
        $izin = $magang->where('presensi', 'izin')->count();
        $bolos = $magang->where('presensi', 'bolos')->count();

        $total = $masuk + $izin + $bolos;
        $masukPercent = $total > 0 ? ($masuk / $total) * 100 : 0;
        $izinPercent = $total > 0 ? ($izin / $total) * 100 : 0;
        $bolosPercent = $total > 0 ? ($bolos / $total) * 100 : 0;

        $detail = Auth::user()->detail;
        return view('mahasiswa.magang_mahasiswa', [
            'tittle' => 'Magang',
            'mahasiswa' =>  $mahasiswa,
            'detail' => $detail,
            'magang' => $magang,
            'masuk' => $masukPercent,
            'izin' => $izinPercent,
            'bolos' => $bolosPercent,
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
            'bukti' => 'nullable|mimes:jpg,png|max:4096',
            'presensi' => 'required',
            'status' => 'required',
        ]);

        if ($request->file('bukti')) {
            $buktiPath = $request->file('bukti')->store('bukti');
            $validatedData['bukti'] = $buktiPath;
        }

        $today = now()->format('Y-m-d');
        if ($user->logbook->where('tanggal', $today)->first()) {
            return redirect('logbook')->with(['error' => 'Kamu sudah mengisi aktivitas hari ini.']);
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
    public function update(Request $request, string $id)
    {
        $logbook = Logbook::findOrFail($id);
        $validatedData = $request->validate([
            'aktivitas' => 'required',
            'bukti' => 'nullable|mimes:jpg,png|max:4096',
        ]);
        $logbook->update($validatedData);
        if ($request->file('bukti')) {
            $buktiPath = $request->file('bukti')->store('bukti');
            $validatedData['bukti'] = $buktiPath;
        }
        if ($request->hasFile('bukti')) {
            // Hapus file lama jika ada
            if ($logbook->bukti) {
                Storage::disk('public')->delete($logbook->bukti);
            }
            $buktiPath = $request->file('bukti')->store('bukti', 'public');
            $logbook->update(['bukti' => $buktiPath]);
        }

        return redirect('logbook')->with('success', 'Data aktivitas anda berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(logbook $logbook)
    {
        //
    }
}
