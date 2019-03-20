<?php

namespace App\Repositories;

use App\Models\Tingkat;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TingkatRepository
 * @package App\Repositories
 * @version March 8, 2019, 2:45 pm UTC
 *
 * @method Tingkat findWithoutFail($id, $columns = ['*'])
 * @method Tingkat find($id, $columns = ['*'])
 * @method Tingkat first($columns = ['*'])
*/
class TingkatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'TINGKAT',
        'KODE_LULUS'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tingkat::class;
    }
}
