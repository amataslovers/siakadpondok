<?php

namespace App\Repositories;

use App\Models\NilaiKarakter;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NilaiKarakterRepository
 * @package App\Repositories
 * @version February 23, 2019, 3:40 pm UTC
 *
 * @method NilaiKarakter findWithoutFail($id, $columns = ['*'])
 * @method NilaiKarakter find($id, $columns = ['*'])
 * @method NilaiKarakter first($columns = ['*'])
*/
class NilaiKarakterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_HISTORY_KELAS',
        'IJIN',
        'SAKIT',
        'ALFA',
        'AKHLAQ',
        'KEBERSIHAN',
        'KERAJINAN'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return NilaiKarakter::class;
    }
}
