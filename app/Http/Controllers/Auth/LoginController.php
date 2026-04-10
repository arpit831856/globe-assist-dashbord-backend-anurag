<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Partner;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->boolean('remember');

        // Multi-auth login
        foreach (['admin', 'user', 'partner'] as $guard) {

            if (Auth::guard($guard)->attempt($credentials, $remember)) {

                $request->session()->regenerate();

                // Redirect based on role
                if ($guard === 'admin') {
                    return redirect()->route('admin.dashboard');
                }

                if ($guard === 'user') {
                    return redirect()->route('user.home');
                }

                if ($guard === 'partner') {
                    return redirect()->route('partner.dashboard');
                }
            }
        }

        // Special case: partner without password
        $partnerWithoutPassword = Partner::where('email', $credentials['email'])
            ->where(function ($query) {
                $query->whereNull('password')->orWhere('password', '');
            })
            ->exists();

        if ($partnerWithoutPassword) {
            return back()->withErrors([
                'email' => 'Partner password not set. Please contact admin.',
            ])->withInput($request->only('email'));
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        foreach (['admin', 'user', 'partner'] as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
            }
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logged out successfully');
    }
}