<?php

namespace App\Repositories;

use App\Models\NilaiAkademik;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NilaiAkademikRepository
 * @package App\Repositories
 * @version February 23, 2019, 3:35 pm UTC
 *
 * @method NilaiAkademik findWithoutFail($id, $columns = ['*'])
 * @method NilaiAkademik find($id, $columns = ['*'])
 * @method NilaiAkademik first($columns = ['*'])
*/
class NilaiAkademikRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_DETAIL_MAPEL',
        'NIS',
        'ID_SEMESTER',
        'NILAI_UTS',
        'NILAI_UAS'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return NilaiAkademik::class;
    }
}
