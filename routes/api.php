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
Route::get('pesanKonfirmasis/get/{id}', 'PesanKonfirmasiController@get')->name('get');

Route::resource('peminjams.transaksis', 'TransaksiController');
Route::get('peminjams/{pem}/transaksis/filter/{jenis}', 'TransaksiController@index')
        ->name('transIndex');
Route::resource('peminjams.transaksis.pengaduans', 'PengaduanController');
Route::get('kritikSaran', 'PengaduanController@index')->name('listPengaduan');

Route::resource('akuns', 'AkunController');

Route::get('transaksis/listSemua/{id}', 'TransaksiController@listSemua')->name('listSemua');
Route::get('transaksis/detail/{id}', 'TransaksiController@detail')->name('detailTransaksi');
Route::delete('transaksis/{id}', 'TransaksiController@destroy');

Route::get('transaksi/{id}/cetak', 'TransaksiController@cetak')->name('cetak');
Route::get('panduan', function () {
    if (Auth::user()->isUser()) {
        return view('panduan.peminjam');
    }
    \Flash::error('Anda bukan peminjam');
    return redirect()->back();
})->name('panduan');

Route::post('auth/login', 'AuthController@login');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('auth/me', 'AuthController@me');
    Route::post('auth/logout', 'AuthController@logout');
});
