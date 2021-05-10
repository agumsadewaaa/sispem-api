<?php

namespace App\Models;

use Eloquent as Model;
use Carbon\Carbon;

/**
 * Class Ruangan
 * @package App\Models
 * @version December 22, 2017, 4:39 pm UTC
 *
 * @property string nama_ruangan
 * @property integer kapasitas
 * @property integer penjaga_id
 */
class Ruangan extends Model
{
    public $table = 'ruangans';



    public $fillable = [
        'nama_ruangan',
        'kapasitas',
        'penjaga_id',
        'need_wr_conf'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_ruangan' => 'string',
        'kapasitas' => 'integer',
        'penjaga_id' => 'integer',
        'need_wr_conf' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_ruangan' => 'required',
        'kapasitas' => 'required'
    ];

    public function penjaga()
    {
        return $this->belongsTo('App\Models\Penjaga');
    }

    public function transaksis()
    {
        return $this->hasMany('App\Models\Transaksi');
    }

    public static function terpakai($mulai, $akhir)
    {
        if ($mulai != null) {
            if ($akhir != null) {
                return Ruangan::join('transaksis', 'transaksis.ruangan_id', '=', 'ruangans.id')
                        ->where('transaksis.periode', Date('Y'))
                        ->where('transaksis.tanggal_mulai', '>=', $mulai)
                        ->where('transaksis.tanggal_mulai', '<=', $akhir)
                        ->orWhere('transaksis.tanggal_selesai', '>=', $mulai)
                        ->where('transaksis.tanggal_selesai', '<=', $akhir)
                        ->select('ruangans.*')
                        ->where('transaksis.status', 0)
                        ->get();
            }
            return Ruangan::join('transaksis', 'transaksis.ruangan_id', '=', 'ruangans.id')
                      ->where('transaksis.periode', Date('Y'))
                      // ->where('tanggal_mulai', $mulai)
                      ->where('transaksis.status', 0)
                      // ->orWhere('tanggal_selesai', $mulai)
                      ->where('transaksis.tanggal_mulai', '>=', $mulai)
                      ->where('transaksis.tanggal_mulai', '<=', $mulai)
                      ->select('ruangans.*')->get();
        }

        return Ruangan::join('transaksis', 'transaksis.ruangan_id', '=', 'ruangans.id')
                    ->where('transaksis.periode', Date('Y'))
                    ->where('transaksis.status', 0)
                    ->select('ruangans.*')->get();
    }

    public static function isTerpakai($id, $mulai, $akhir)
    {
        $mulai = Carbon::parse($mulai);
        $akhir = Carbon::parse($akhir);
        $ruangan = Transaksi::where('ruangan_id', $id)->get();
        if ($mulai != null) {
            if ($akhir != null) {
                $ruangan =  $ruangan->filter(function ($r) use ($mulai, $akhir) {
                  // $model->starts_at->lt($awal) && $model->ends_at->gt($akhir)
                    return (($r->tanggal_mulai->lt($mulai) && $r->tanggal_selesai->gt($mulai))
                          || ($r->tanggal_mulai->lt($akhir) && $r->tanggal_selesai->gt($akhir))
                          || ($r->tanggal_mulai->eq($mulai) || $r->tanggal_selesai->eq($akhir)))
                          && $r->status == 0;
                });

                // dd($ruangan);
            }
        }
        if ($ruangan->isEmpty()) {
            return false;
        }
        return true;
    }
}
