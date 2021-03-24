<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\Transaksi;
use Flash;
use App\User;

class CekPelanggaran
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
        $sekarang = Date('Y-m-d');

        $transaksi = Transaksi::where('status', 0)
                    ->where('tanggal_selesai', '<', $sekarang)->get()->groupBy('peminjam_id');
        // dd($transaksi);
        foreach ($transaksi as $key => $value) {
            $value = $value->first();
            $value->status = 3;
            $value->peminjam->user->status = 0;
            $value->peminjam->user->save();
            $value->save();
        }
        $user = User::where('status', 0)->get();
        foreach ($user as $key => $value) {
            $trans = $value->peminjam->transaksis->where('status', 0);
            foreach ($trans as $k => $v) {
                $v->status = 4;
                $v->save();
            }
        }
        if (Auth::user()->isAdmin() && count($transaksi) > 0) {
            Flash::warning(count($transaksi).' akun peminjam berhasil diblokir karena keterlambatan konfirmasi selesai peminjaman');
        }
        return $next($request);
    }
}
