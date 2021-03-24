<?php

namespace App\Repositories;

use App\Models\Ruangan;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class RuanganRepository
 * @package App\Repositories
 * @version December 22, 2017, 4:39 pm UTC
 *
 * @method Ruangan findWithoutFail($id, $columns = ['*'])
 * @method Ruangan find($id, $columns = ['*'])
 * @method Ruangan first($columns = ['*'])
*/
class RuanganRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_ruangan',
        'kapasitas',
        'penjaga_id',
        'need_wr_conf'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Ruangan::class;
    }
}
