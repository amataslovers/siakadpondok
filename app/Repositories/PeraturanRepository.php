<?php

namespace App\Repositories;

use App\Models\Peraturan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PeraturanRepository
 * @package App\Repositories
 * @version February 23, 2019, 3:42 pm UTC
 *
 * @method Peraturan findWithoutFail($id, $columns = ['*'])
 * @method Peraturan find($id, $columns = ['*'])
 * @method Peraturan first($columns = ['*'])
*/
class PeraturanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_SANKSI',
        'NAMA_PERATURAN'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Peraturan::class;
    }
}
