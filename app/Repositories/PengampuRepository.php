<?php

namespace App\Repositories;

use App\Models\Pengampu;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PengampuRepository
 * @package App\Repositories
 * @version March 9, 2019, 12:02 am UTC
 *
 * @method Pengampu findWithoutFail($id, $columns = ['*'])
 * @method Pengampu find($id, $columns = ['*'])
 * @method Pengampu first($columns = ['*'])
*/
class PengampuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_MATA_PELAJARAN',
        'NIP_GURU',
        'ID_TAHUN_AJARAN',
        'KKM',
        'ID_KELAS',
        'HARI',
        'JAM'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pengampu::class;
    }
}
