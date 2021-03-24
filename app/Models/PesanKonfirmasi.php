<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class PesanKonfirmasi
 * @package App\Models
 * @version December 22, 2017, 4:41 pm UTC
 *
 * @property integer status
 * @property string pesan
 */
class PesanKonfirmasi extends Model
{
    public $table = 'pesan_konfirmasis';
    


    public $fillable = [
        'status',
        'pesan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'integer',
        'pesan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'status' => 'required',
        'pesan' => 'required'
    ];
}
