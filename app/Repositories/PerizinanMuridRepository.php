<?php

namespace App\Repositories;

use App\Models\PerizinanMurid;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PerizinanMuridRepository
 * @package App\Repositories
 * @version April 8, 2019, 1:55 pm UTC
 *
 * @method PerizinanMurid findWithoutFail($id, $columns = ['*'])
 * @method PerizinanMurid find($id, $columns = ['*'])
 * @method PerizinanMurid first($columns = ['*'])
*/
class PerizinanMuridRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_HISTORY_KELAS',
        'JENIS',
        'KETERANGAN',
        'TANGGAL',
        'TOTAL_HARI'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PerizinanMurid::class;
    }
}
