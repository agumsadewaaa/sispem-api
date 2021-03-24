<?php

namespace App\Http\Middleware;

use Closure;
use Flash;
use Auth;

class CekPeminjam
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
        if (!$user->isUser()) {
            Flash::error("Anda bukan peminjam");
            return redirect(route('home'));
        }
        return $next($request);
    }
}
