<?php

namespace App\Repositories;

use App\Models\TahunAjaran;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TahunAjaranRepository
 * @package App\Repositories
 * @version February 23, 2019, 3:45 pm UTC
 *
 * @method TahunAjaran findWithoutFail($id, $columns = ['*'])
 * @method TahunAjaran find($id, $columns = ['*'])
 * @method TahunAjaran first($columns = ['*'])
*/
class TahunAjaranRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NAMA',
        'STATUS'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TahunAjaran::class;
    }
}
