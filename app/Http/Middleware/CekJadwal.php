<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Ruangan;
use Flash;

class CekJadwal
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
        $terpakai = Ruangan::isTerpakai($request->ruangan_id, $request->tanggal_mulai, $request->tanggal_selesai);
        if ($terpakai) {
            Flash::error('Jadwal yang anda pilih bentrok dengan peminjaman lain');
            return redirect()->back();
        }
        return $next($request);
    }
}
