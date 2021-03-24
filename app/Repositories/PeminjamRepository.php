<?php

namespace App\Repositories;

use App\Models\Peminjam;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class PeminjamRepository
 * @package App\Repositories
 * @version December 22, 2017, 4:33 pm UTC
 *
 * @method Peminjam findWithoutFail($id, $columns = ['*'])
 * @method Peminjam find($id, $columns = ['*'])
 * @method Peminjam first($columns = ['*'])
*/
class PeminjamRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'nama_organisasi',
        'jabatan',
        'kontak'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Peminjam::class;
    }
}
