<?php

namespace App\Repositories;

use App\Models\PesanKonfirmasi;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class PesanKonfirmasiRepository
 * @package App\Repositories
 * @version December 22, 2017, 4:41 pm UTC
 *
 * @method PesanKonfirmasi findWithoutFail($id, $columns = ['*'])
 * @method PesanKonfirmasi find($id, $columns = ['*'])
 * @method PesanKonfirmasi first($columns = ['*'])
*/
class PesanKonfirmasiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status',
        'pesan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PesanKonfirmasi::class;
    }
}
