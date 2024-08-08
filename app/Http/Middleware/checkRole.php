<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Cek apakah user sudah login dan memiliki role yang sesuai
        $checkRole = array_search(Auth::user()->role, $roles) !== false;
        if (Auth::check() && $checkRole) {
            return $next($request);
        }

        // Jika user tidak memiliki role yang sesuai, redirect atau beri respon yang sesuai
        return abort(403, 'Unauthorized.');
        // return redirect('/'); // Atau bisa menggunakan abort(403, 'Unauthorized.');
    }
}
