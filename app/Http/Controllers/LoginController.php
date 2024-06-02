<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Dinas;
use Illuminate\Http\Request;
use App\Models\User as ModelsUser;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            'tittle' => 'Login • CIIS'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:255'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            $userId = $user->id;
            

            if ($user->role == 'admin') {
                return redirect()->intended('beranda');
            } elseif ($user->role == 'pegawai') {
                if ($user->status == 1){
                    return redirect()->intended('beranda_pegawai');
                }
            } elseif ($user->role == 'mahasiswa') {
                $user = ModelsUser::with('detail')->find($userId);
                $request->session()->put('user_id', $userId);
                $suratBalasan = $user->detail->surat_balasan ?? null;
                $penerimaan = $user->detail->penerimaan ?? null;
                $tglMulai = $user->detail->tgl_mulai ?? null;
                $today = Carbon::now();
                $dinas = Dinas::where('id', $user->dinas_id)->first();

                if ($tglMulai && $today->lt(Carbon::parse($tglMulai))) {
                    return view('nyurat', [
                        'user' => $user,
                        'dinas' => $dinas
                    ])->with('loginError', 'Tanggal mulai belum tercapai.');
                }

                if ($suratBalasan !== null && $penerimaan == "diterima") {
                    return redirect()->intended('beranda_mahasiswa');
                } else {
                    return view('nyurat', [
                        'user' => $user,
                        'dinas' => $dinas
                    ]);
                } 
            } else {
                return back()->with('loginError', 'Login Gagal!');
            }
        }
        return back()->with('loginError', 'Login Gagal!');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
    
}
