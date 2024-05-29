<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
                    return redirect()->intended('pegawai');
                }
            } elseif ($user->role == 'mahasiswa') {
                $user = ModelsUser::with('detail')->find($userId);
                $request->session()->put('user_id', $userId);
                $suratBalasan = $user->detail->surat_balasan ?? null;
                $tglMulai = $user->detail->tgl_mulai ?? null;
                $today = Carbon::now();

                if ($tglMulai && $today->lt(Carbon::parse($tglMulai))) {
                    return view('nyurat', [
                        'user' => $user
                    ])->with('loginError', 'Tanggal mulai belum tercapai.');
                }

                if ($suratBalasan !== null && $user->status == 1) {
                    return redirect()->intended('beranda_mahasiswa');
                } elseif ($suratBalasan === null && $user->status == 0) {
                    return view('nyurat', [
                        'user' => $user
                    ]);
                } else {
                    return redirect()->intended('beranda_mahasiswa');
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
