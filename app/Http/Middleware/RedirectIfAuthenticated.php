<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Flash;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (!Auth::user()->isActive()) {
                Auth::logout();
                Flash::error("Akun anda tidak aktif, silahkan hubungi admin.");
                return redirect('/login');
            }
            return redirect('/home');
        }

        return $next($request);
    }
}
