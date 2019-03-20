<?php

namespace App\Repositories;

use App\Models\Sanksi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SanksiRepository
 * @package App\Repositories
 * @version February 23, 2019, 3:43 pm UTC
 *
 * @method Sanksi findWithoutFail($id, $columns = ['*'])
 * @method Sanksi find($id, $columns = ['*'])
 * @method Sanksi first($columns = ['*'])
*/
class SanksiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NAMA_SANKSI'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Sanksi::class;
    }
}
