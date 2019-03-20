<?php

namespace App\Repositories;

use App\Models\Kelas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KelasRepository
 * @package App\Repositories
 * @version March 9, 2019, 12:14 am UTC
 *
 * @method Kelas findWithoutFail($id, $columns = ['*'])
 * @method Kelas find($id, $columns = ['*'])
 * @method Kelas first($columns = ['*'])
*/
class KelasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NIP_GURU',
        'ID_TINGKAT',
        'ID_TAHUN_AJARAN',
        'NAMA'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Kelas::class;
    }
}
