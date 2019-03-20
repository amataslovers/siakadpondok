<?php

namespace App\Repositories;

use App\Models\DetailKeluarga;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DetailKeluargaRepository
 * @package App\Repositories
 * @version February 23, 2019, 3:12 pm UTC
 *
 * @method DetailKeluarga findWithoutFail($id, $columns = ['*'])
 * @method DetailKeluarga find($id, $columns = ['*'])
 * @method DetailKeluarga first($columns = ['*'])
*/
class DetailKeluargaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NIS',
        'ID_KELUARGA_MURID'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DetailKeluarga::class;
    }
}
