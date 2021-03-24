<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::group(['middleware' => ['web','auth', 'cek']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('penjagas', 'PenjagaController');

    Route::resource('ruangans', 'RuanganController');

    Route::resource('pesanKonfirmasis', 'PesanKonfirmasiController');

    Route::resource('peminjams.transaksis', 'TransaksiController');
    Route::get('peminjams/{pem}/transaksis/filter/{jenis}', 'TransaksiController@index')
          ->name('transIndex');
    Route::resource('peminjams.transaksis.pengaduans', 'PengaduanController');
    Route::get('kritikSaran', 'PengaduanController@index')->name('listPengaduan');

    Route::resource('akuns', 'AkunController');
    Route::post('akuns/{id}/changeStatus', 'AkunController@changeStatus')->name('changeStatus');

    Route::resource('users.peminjams', 'PeminjamController');
    Route::post('users/{id}/changePassword', 'AkunController@changePassword')->name('changePassword');
    Route::get('transaksis/listSemua', 'TransaksiController@listSemua')->name('listSemua');
    Route::get('transaksis/detail/{id}', 'TransaksiController@detail')->name('detailTransaksi');
    Route::get('rekapPeminjaman', 'TransaksiController@rekapPeminjaman')->name('rekapPeminjaman');
    Route::get('rekapPengaduan', 'TransaksiController@rekapPengaduan')->name('rekapPengaduan');
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
});

Route::any(
    '{query}',
    function () {
        session(['tidak' => '<b>Halaman <i>'. request()->url() .'</i> tidak ditemukan!</b>']);
        return redirect(route('home'));
    }
)->where('query', '.*');
