<?php

namespace App\Repositories;

use App\Models\Guru;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class GuruRepository
 * @package App\Repositories
 * @version February 28, 2019, 12:06 pm UTC
 *
 * @method Guru findWithoutFail($id, $columns = ['*'])
 * @method Guru find($id, $columns = ['*'])
 * @method Guru first($columns = ['*'])
*/
class GuruRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_AGAMA',
        'NAMA',
        'NAMA_ARAB',
        'JENIS_KELAMIN',
        'GELAR_DEPAN',
        'GELAR_BELAKANG',
        'ALAMAT',
        'TANGGAL_LAHIR',
        'TEMPAT_LAHIR',
        'NOTELP',
        'EMAIL',
        'FOTO'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Guru::class;
    }
}
