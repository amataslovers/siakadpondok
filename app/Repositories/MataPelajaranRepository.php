<?php

namespace App\Repositories;

use App\Models\MataPelajaran;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MataPelajaranRepository
 * @package App\Repositories
 * @version March 3, 2019, 3:38 am UTC
 *
 * @method MataPelajaran findWithoutFail($id, $columns = ['*'])
 * @method MataPelajaran find($id, $columns = ['*'])
 * @method MataPelajaran first($columns = ['*'])
*/
class MataPelajaranRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'KODE_MAPEL',
        'NAMA',
        'NAMA_ARAB'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MataPelajaran::class;
    }
}
