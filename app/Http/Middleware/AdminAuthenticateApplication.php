<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticateApplication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard)
    {

        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return $next($request);
        }
        else
        {
            return redirect()->guest('Admin/login');  
        }
        return $next($request);
    }
}
