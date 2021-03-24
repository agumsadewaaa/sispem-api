<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Peminjam
 * @package App\Models
 * @version December 22, 2017, 4:33 pm UTC
 *
 * @property integer user_id
 * @property string nama_organisasi
 * @property string jabatan
 * @property string kontak
 */
class Peminjam extends Model
{
    public $table = 'peminjams';

    public $timestamps = false;

    public $fillable = [
        'user_id',
        'nama_organisasi',
        'jabatan',
        'kontak'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'nama_organisasi' => 'string',
        'jabatan' => 'string',
        'kontak' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'kontak' => 'required'
    ];

    public function transaksis()
    {
        return $this->hasMany('App\Models\Transaksi');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
