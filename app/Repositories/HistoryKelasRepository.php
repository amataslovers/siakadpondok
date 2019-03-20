<?php

namespace App\Repositories;

use App\Models\HistoryKelas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class HistoryKelasRepository
 * @package App\Repositories
 * @version February 23, 2019, 3:24 pm UTC
 *
 * @method HistoryKelas findWithoutFail($id, $columns = ['*'])
 * @method HistoryKelas find($id, $columns = ['*'])
 * @method HistoryKelas first($columns = ['*'])
*/
class HistoryKelasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_KELAS',
        'ID_SEMESTER',
        'NIS'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return HistoryKelas::class;
    }
}
