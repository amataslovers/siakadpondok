<?php

namespace App\Repositories;

use App\Models\PelanggaranMurid;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PelanggaranMuridRepository
 * @package App\Repositories
 * @version February 23, 2019, 3:41 pm UTC
 *
 * @method PelanggaranMurid findWithoutFail($id, $columns = ['*'])
 * @method PelanggaranMurid find($id, $columns = ['*'])
 * @method PelanggaranMurid first($columns = ['*'])
*/
class PelanggaranMuridRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_PERATURAN',
        'ID_HISTORY_KELAS',
        'TANGGAL_MELANGGAR',
        'KETERANGAN'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PelanggaranMurid::class;
    }
}
