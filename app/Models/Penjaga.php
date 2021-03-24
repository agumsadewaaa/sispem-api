<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Penjaga
 * @package App\Models
 * @version December 22, 2017, 4:36 pm UTC
 *
 * @property string nama_penjaga
 * @property string nomor_handphone
 */
class Penjaga extends Model
{
    public $table = 'penjagas';

    public $timestamps = false;

    public $fillable = [
        'nama_penjaga',
        'nomor_handphone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_penjaga' => 'string',
        'nomor_handphone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_penjaga' => 'required',
        'nomor_handphone' => 'required'
    ];
}
