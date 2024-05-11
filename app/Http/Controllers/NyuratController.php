<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NyuratController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->userId;
        $user = User::with('detail')->find($userId);
        return view('nyurat', [
            'tittle' => 'N',
            'user' => $user,
        ]);
    }

}
