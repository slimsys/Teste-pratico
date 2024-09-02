<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminRoute
{

    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::check())
            return Auth::user()->role != \App\User::ROLE_ADMIN ? redirect()->route('home') : $next($request);
        
        return redirect()->route('login');
    }
}
