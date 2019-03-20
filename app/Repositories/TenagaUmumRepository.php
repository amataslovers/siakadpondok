<?php

namespace App\Repositories;

use App\Models\TenagaUmum;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TenagaUmumRepository
 * @package App\Repositories
 * @version February 23, 2019, 3:46 pm UTC
 *
 * @method TenagaUmum findWithoutFail($id, $columns = ['*'])
 * @method TenagaUmum find($id, $columns = ['*'])
 * @method TenagaUmum first($columns = ['*'])
*/
class TenagaUmumRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_AGAMA',
        'NAMA',
        'JENIS_KELAMIN',
        'TEMPAT_LAHIR',
        'TANGGAL_LAHIR',
        'ALAMAT',
        'NOTELP',
        'EMAIL',
        'FOTO'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TenagaUmum::class;
    }
}
