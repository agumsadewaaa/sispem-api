<?php

namespace App\Repositories;

use App\Models\Transaksi;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class TransaksiRepository
 * @package App\Repositories
 * @version December 22, 2017, 4:52 pm UTC
 *
 * @method Transaksi findWithoutFail($id, $columns = ['*'])
 * @method Transaksi find($id, $columns = ['*'])
 * @method Transaksi first($columns = ['*'])
*/
class TransaksiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'peminjam_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'nama_acara',
        'penanggung_jawab',
        'kontak',
        'ruangan_id',
        'pesan_wr_id',
        'konfirmasi_kbsd_id',
        'konfirmasi_kbu_id',
        'konfirmasi_ksbrt_id',
        'status',
        'periode'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Transaksi::class;
    }
}
