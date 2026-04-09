<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('current_guard')) {
    function current_guard()
    {
        foreach (['admin', 'partner', 'user'] as $guard) {
            if (Auth::guard($guard)->check()) {
                return $guard;
            }
        }
        return null;
    }
}
