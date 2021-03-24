<?php

namespace App\Repositories;

use App\Models\Penjaga;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class PenjagaRepository
 * @package App\Repositories
 * @version December 22, 2017, 4:36 pm UTC
 *
 * @method Penjaga findWithoutFail($id, $columns = ['*'])
 * @method Penjaga find($id, $columns = ['*'])
 * @method Penjaga first($columns = ['*'])
*/
class PenjagaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_penjaga',
        'nomor_handphone'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Penjaga::class;
    }
}
