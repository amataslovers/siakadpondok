<?php

namespace App\Repositories;

use App\Models\Murid;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MuridRepository
 * @package App\Repositories
 * @version February 23, 2019, 3:32 pm UTC
 *
 * @method Murid findWithoutFail($id, $columns = ['*'])
 * @method Murid find($id, $columns = ['*'])
 * @method Murid first($columns = ['*'])
*/
class MuridRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_AGAMA',
        'NAMA',
        'NAMA_ARAB',
        'JENIS_KELAMIN',
        'TEMPAT_LAHIR',
        'TANGGAL_LAHIR',
        'ALAMAT',
        'EMAIL',
        'NOTELP',
        'NAMA_ASAL_SEKOLAH',
        'ALAMAT_ASAL_SEKOLAH',
        'IJAZAH_SD',
        'IJAZAH_SMP',
        'IJAZAH_SMA',
        'TANGGAL_MASUK',
        'TANGGAL_KELUAR',
        'ANGKATAN',
        'FOTO_AKTE_LAHIR',
        'FOTO',
        'STATUS_AKTIF'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Murid::class;
    }
}
