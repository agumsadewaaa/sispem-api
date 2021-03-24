<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Flash;

class CekRequestUser
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
        if ($user->peminjam->id != $request->transaksi) {
            Flash::error("Eits! Gaboleh intip-intip peminjaman peminjam lain!");
            return redirect()->back();
        }
        return $next($request);
    }
}
