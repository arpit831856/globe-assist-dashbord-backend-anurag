<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;


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
    if (Auth::guard('admin')->check()) {
        Auth::guard('admin')->logout();
    } 
    elseif (Auth::guard('user')->check()) {
        Auth::guard('user')->logout();
    } 
    elseif (Auth::guard('partner')->check()) {
        Auth::guard('partner')->logout();
    }

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login')->with('success', 'Logged out successfully');
}


    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->email;
        $account = $this->findAccountByEmail($email);

        if (! $account) {
            return back()->withErrors([
                'email' => 'The selected email does not exist in our records.',
            ])->withInput($request->only('email'));
        }

        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],
            [
                'token' => hash('sha256', $token),
                'created_at' => Carbon::now(),
            ]
        );

        Mail::send('auth.email-template', [
            'token' => $token,
            'email' => $email,
        ], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Reset Password Notification');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function showResetForm(Request $request, $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->query('email'),
        ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    if (! $this->findAccountByEmail($value)) {
                        $fail('The selected email does not exist in our records.');
                    }
                },
            ],
            'password' => 'required|min:8|confirmed',
            'token' => 'required',
        ]);

        $passwordReset = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if (! $passwordReset) {
            return back()->withErrors([
                'email' => 'Invalid or expired reset link.',
            ])->withInput($request->only('email'));
        }

        $createdAt = Carbon::parse($passwordReset->created_at);
        if ($createdAt->addMinutes(60)->isPast()) {
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();

            return back()->withErrors([
                'email' => 'This password reset link has expired. Please request a new one.',
            ])->withInput($request->only('email'));
        }

        $hashedToken = hash('sha256', $request->token);
        $isValidToken = hash_equals($passwordReset->token, $hashedToken)
            || hash_equals($passwordReset->token, $request->token);

        if (! $isValidToken) {
            return back()->withErrors([
                'email' => 'Invalid or expired reset link.',
            ])->withInput($request->only('email'));
        }

        $account = $this->findAccountByEmail($request->email);

        if (! $account) {
            return back()->withErrors([
                'email' => 'The selected email does not exist in our records.',
            ])->withInput($request->only('email'));
        }

        $account->password = Hash::make($request->password);
        $account->save();

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect('/login')->with('success', 'Your password has been changed successfully!');
    }

    private function findAccountByEmail(string $email): User|Partner|Admin|null
    {
        foreach ([User::class, Partner::class, Admin::class] as $model) {
            $account = $model::where('email', $email)->first();

            if ($account) {
                return $account;
            }
        }

        return null;
    }
}
