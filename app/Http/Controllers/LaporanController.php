<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use PDF;

class LaporanController extends Controller
{
    public function peminjaman(Request $request)
    {
      $data = json_decode($request['transaksis'], true);
      $transaksis = Transaksi::hydrate($data);
      $transaksis = $transaksis->flatten();

      $pdf = PDF::loadView('pdf.peminjaman', [
                            'transaksis' => $transaksis,
                            'periode'    => $request->periode,
                            'ruangan'    => $request->ruangan,
                          ]);
      $pdf->setPaper('a4', 'landscape');
      return $pdf->stream('Laporan_Peminjaman_'.time().'.pdf');
    }

    public function pengaduan(Request $request)
    {
      $data = json_decode($request['transaksis'], true);
      $transaksis = Transaksi::hydrate($data);
      $transaksis = $transaksis->flatten();

      $pdf = PDF::loadView('pdf.pengaduan', [
                            'transaksis' => $transaksis,
                            'periode'    => $request->periode,
                            'ruangan'    => $request->ruangan,
                          ]);
      $pdf->setPaper('a4', 'landscape');
      return $pdf->stream('Laporan_Pengaduan_'.time().'.pdf');
    }
}
