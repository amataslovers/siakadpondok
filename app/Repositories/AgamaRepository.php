<?php

namespace App\Repositories;

use App\Models\Agama;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AgamaRepository
 * @package App\Repositories
 * @version February 23, 2019, 3:09 pm UTC
 *
 * @method Agama findWithoutFail($id, $columns = ['*'])
 * @method Agama find($id, $columns = ['*'])
 * @method Agama first($columns = ['*'])
*/
class AgamaRepository extends BaseRepository
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
        return Agama::class;
    }
}
