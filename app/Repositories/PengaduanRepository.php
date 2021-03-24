<?php

namespace App\Repositories;

use App\Models\Pengaduan;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class PengaduanRepository
 * @package App\Repositories
 * @version December 22, 2017, 4:54 pm UTC
 *
 * @method Pengaduan findWithoutFail($id, $columns = ['*'])
 * @method Pengaduan find($id, $columns = ['*'])
 * @method Pengaduan first($columns = ['*'])
*/
class PengaduanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'transaksi_id',
        'keluhan',
        'saran'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pengaduan::class;
    }
}
