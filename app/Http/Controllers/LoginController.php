<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
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
    
            if ($user->status == 0) {
                $user = ModelsUser::with('detail')->find($userId);
                return view('nyurat',[
                    'user' => $user
                ]);
            } else {
                if ($user->role == 'admin') {
                    return redirect()->intended('beranda');
                } elseif ($user->role == 'pegawai') {
                    return redirect()->intended('pegawai');
                } elseif ($user->role == 'mahasiswa') {
                    $request->session()->put('user_id', $userId);
                    return redirect()->intended('beranda_mahasiswa');
                } else {
                    return redirect()->intended('dinas');
                }
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

//     public function authenticate(Request $request)
//     {
//         // Validasi input
//         $credentials = $request->validate([
//             'email' => 'required|email:dns',
//             'password' => 'required|min:5|max:255'
//         ]);

//         // Cek kredensial
//         if (Auth::attempt($credentials)) {
//             $request->session()->regenerate();
    
//             $user = Auth::user();
//             $user->load('detail'); // Muat relasi detail
    
//             // Logic berdasarkan role
//             if ($user->role == 'mahasiswa') {
//                 // Cek status dan status_penerimaan khusus untuk mahasiswa
//                 if ($user->status == 1 && $user->detail->status_penerimaan == 'diterima') {
//                     $request->session()->put('user_id', $user->id);
//                     return redirect()->intended('beranda_mahasiswa');
//                 } else {
//                     Auth::logout();
//                     return back()->with('loginError', 'Akun Anda belum diaktifkan atau belum diterima.');
//                 }
//             } else {
//                 // Logic untuk role lainnya
//                 if ($user->role == 'admin') {
//                     return redirect()->intended('beranda');
//                 } elseif ($user->role == 'pegawai') {
//                     return redirect()->intended('pegawai');
//                 } else {
//                     return redirect()->intended('dinas');
//                 }
//             }
//         }

//         // Jika autentikasi gagal
//         return back()->with('loginError', 'Login Gagal!');
//     }
// }
}
