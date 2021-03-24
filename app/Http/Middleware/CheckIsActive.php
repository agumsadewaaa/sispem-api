<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Flash;

class CheckIsActive
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
        // dd($user->role->role);

        if ($user->isActive()) {
            if ($user->isUser()) {
                if (!$user->hasPeminjam()) {
                    Flash::warning('Silahkan lengkapi dahulu data Anda!');
                    return redirect(route('users.peminjams.create', [$user->id]));
                }
            }
            return $next($request);
        }
        return redirect(route('home'));
    }
}
