<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('user.Auth.login');
    }

public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt login using the 'admin' guard
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('user_home');
        }

        return back()->with('error', 'Invalid email or password');
    }


    public function logout()
    {
      Auth::guard('web')->logout();
        return redirect()->route('user.login');
    }


}
