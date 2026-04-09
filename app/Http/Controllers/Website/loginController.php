<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LoginController extends Controller 
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

   public function login(Request $request)
{
    
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role === 'user') {
            return redirect()->route('user_home');  // user home
        }

        if ($user->role === 'partner') {
            return redirect()->route('partner.dashboard');
        }

        return redirect('/');
    }

    return back()->withErrors([
        'email' => 'Invalid email or password.',
    ]);
}


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
