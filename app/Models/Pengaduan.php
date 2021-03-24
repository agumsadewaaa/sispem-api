<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Pengaduan
 * @package App\Models
 * @version December 22, 2017, 4:54 pm UTC
 *
 * @property integer transaksi_id
 * @property string keluhan
 * @property string saran
 */
class Pengaduan extends Model
{
    public $table = 'pengaduans';
    


    public $fillable = [
        'transaksi_id',
        'keluhan',
        'saran'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'transaksi_id' => 'integer',
        'keluhan' => 'string',
        'saran' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'transaksi_id' => 'required',
        'keluhan' => 'required',
        'saran' => 'required'
    ];
}
