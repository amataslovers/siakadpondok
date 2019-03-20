<?php

namespace App\Repositories;

use App\Models\Semester;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SemesterRepository
 * @package App\Repositories
 * @version February 23, 2019, 3:44 pm UTC
 *
 * @method Semester findWithoutFail($id, $columns = ['*'])
 * @method Semester find($id, $columns = ['*'])
 * @method Semester first($columns = ['*'])
*/
class SemesterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_TAHUN_AJARAN',
        'SEMESTER',
        'STATUS'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Semester::class;
    }
}
