<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('ruangans', 'RuanganController');
Route::resource('penjagas', 'PenjagaController');
Route::resource('pesanKonfirmasis', 'PesanKonfirmasiController');

Route::resource('peminjams.transaksis', 'TransaksiController');
Route::get('peminjams/{pem}/transaksis/filter/{jenis}', 'TransaksiController@index')
        ->name('transIndex');
Route::resource('peminjams.transaksis.pengaduans', 'PengaduanController');
Route::get('kritikSaran', 'PengaduanController@index')->name('listPengaduan');

Route::resource('akuns', 'AkunController');

Route::get('transaksis/listSemua', 'TransaksiController@listSemua')->name('listSemua');
Route::get('transaksis/detail/{id}', 'TransaksiController@detail')->name('detailTransaksi');

Route::get('transaksi/{id}/cetak', 'TransaksiController@cetak')->name('cetak');
Route::post('laporanPeminjaman', 'LaporanController@peminjaman')->name('laporanPeminjaman');
Route::post('laporanPegaduan', 'LaporanController@pengaduan')->name('laporanPengaduan');
Route::get('panduan', function () {
    if (Auth::user()->isUser()) {
        return view('panduan.peminjam');
    }
    \Flash::error('Anda bukan peminjam');
    return redirect()->back();
})->name('panduan');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
