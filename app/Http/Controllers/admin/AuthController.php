<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // 1️⃣ Try User login
    if (Auth::guard('user')->attempt($request->only('email', 'password'))) {
        return redirect()->route('user.dashboard');
    }

    // 2️⃣ Try Partner login
    if (Auth::guard('partner')->attempt($request->only('email', 'password'))) {
        return redirect()->route('partner.dashboard');
    }

    // 3️⃣ Login failed
    return back()->withErrors(['email' => 'Invalid credentials']);
}

}
