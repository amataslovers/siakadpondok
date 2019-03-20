<?php

namespace App\Repositories;

use App\Models\JenisKeluarga;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JenisKeluargaRepository
 * @package App\Repositories
 * @version February 23, 2019, 3:25 pm UTC
 *
 * @method JenisKeluarga findWithoutFail($id, $columns = ['*'])
 * @method JenisKeluarga find($id, $columns = ['*'])
 * @method JenisKeluarga first($columns = ['*'])
*/
class JenisKeluargaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NAMA'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return JenisKeluarga::class;
    }
}
