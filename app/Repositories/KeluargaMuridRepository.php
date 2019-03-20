<?php

namespace App\Repositories;

use App\Models\KeluargaMurid;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KeluargaMuridRepository
 * @package App\Repositories
 * @version February 23, 2019, 3:29 pm UTC
 *
 * @method KeluargaMurid findWithoutFail($id, $columns = ['*'])
 * @method KeluargaMurid find($id, $columns = ['*'])
 * @method KeluargaMurid first($columns = ['*'])
*/
class KeluargaMuridRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_JENIS_KELUARGA',
        'ID_AGAMA',
        'NAMA',
        'TANGGAL_LAHIR',
        'TEMPAT_LAHIR',
        'ALAMAT',
        'EMAIL',
        'NOTELP',
        'PEKERJAAN'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return KeluargaMurid::class;
    }
}
