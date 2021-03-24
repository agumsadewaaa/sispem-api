<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Transaksi
 * @package App\Models
 * @version December 22, 2017, 4:52 pm UTC
 *
 * @property integer peminjam_id
 * @property date tanggal_mulai
 * @property date tanggal_selesai
 * @property string nama_acara
 * @property string penanggung_jawab
 * @property string kontak
 * @property integer ruangan_id
 * @property integer pesan_wr_id
 * @property integer konfirmasi_kbsd_id
 * @property integer konfirmasi_kbu_id
 * @property integer status
 * @property year periode
 */
class Transaksi extends Model
{
    public $table = 'transaksis';

    public $timestamps = false;


    public $fillable = [
        'peminjam_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'nama_acara',
        'penanggung_jawab',
        'kontak',
        'ruangan_id',
        'konfirmasi_wr_id',
        'konfirmasi_kbsd_id',
        'konfirmasi_kbu_id',
        'status',
        'periode'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'peminjam_id' => 'integer',
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'nama_acara' => 'string',
        'penanggung_jawab' => 'string',
        'kontak' => 'string',
        'ruangan_id' => 'integer',
        'konfirmasi_wr_id' => 'integer',
        'konfirmasi_kbsd_id' => 'integer',
        'konfirmasi_kbu_id' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'peminjam_id' => 'required',
        'tanggal_mulai' => 'required',
        'tanggal_selesai' => 'required',
        'nama_acara' => 'required',
        'penanggung_jawab' => 'required',
        'kontak' => 'required',
        'ruangan_id' => 'required',
    ];

    public function peminjam()
    {
        return $this->belongsTo('App\Models\Peminjam');
    }

    public function ruangan()
    {
        return $this->belongsTo('App\Models\Ruangan');
    }

    public function wr()
    {
        return $this->belongsTo('App\Models\PesanKonfirmasi', 'konfirmasi_wr_id');
    }

    public function kbsd()
    {
        return $this->belongsTo('App\Models\PesanKonfirmasi', 'konfirmasi_kbsd_id');
    }
    public function kbu()
    {
        return $this->belongsTo('App\Models\PesanKonfirmasi', 'konfirmasi_kbu_id');
    }
    public function ksbrt()
    {
        return $this->belongsTo('App\Models\PesanKonfirmasi', 'konfirmasi_ksbrt_id');
    }

    public function pengaduan()
    {
        return $this->hasOne('App\Models\Pengaduan');
    }
}
