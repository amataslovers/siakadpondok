<?php

namespace App\Repositories;

use App\Models\CatatanSpp;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CatatanSppRepository
 * @package App\Repositories
 * @version February 24, 2019, 12:06 am UTC
 *
 * @method CatatanSpp findWithoutFail($id, $columns = ['*'])
 * @method CatatanSpp find($id, $columns = ['*'])
 * @method CatatanSpp first($columns = ['*'])
*/
class CatatanSppRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_HISTORY_KELAS',
        'TANGGAL_BAYAR',
        'JENIS_PEMBAYARAN',
        'NO_REFERENSI',
        'KETERANGAN',
        'TOTAL_BAYAR'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CatatanSpp::class;
    }
}
