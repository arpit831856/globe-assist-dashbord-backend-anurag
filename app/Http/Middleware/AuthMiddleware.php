<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is logged in (session based)
        if (!session()->has('user_id')) {
            // Not authenticated, redirect to login
            return redirect('/login');
        }

        // User is authenticated, allow request
        return $next($request);
    }
}
