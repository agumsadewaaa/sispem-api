<?php

namespace App\Http\Middleware;

use Closure;
use Flash;
use Auth;

class CekAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if (!$user->isAdmin()) {
            Flash::error("Anda bukan admin!");
            return redirect(route('home'));
        }
        return $next($request);
    }
}
