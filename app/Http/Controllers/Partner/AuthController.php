<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('partner.auth.login');
    }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email'    => 'required',
    //         'password' => 'required'
    //     ]);

    //     if (Auth::partner('partner')->attempt($request->only('email', 'password'))) {
    //         return redirect()->route('partner.dashboard');
    //     }

    //     return back()->with('error', 'Invalid login details');
    // }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('partner')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('partner.dashboard');
        }

        return back()->with('error', 'Invalid login details');
    }

    public function logout()
    {
        Auth::guard('partner')->logout();

        return redirect()->route('partner.login');
    }
}
