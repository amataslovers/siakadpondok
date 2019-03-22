<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NilaiKarakter
 * @package App\Models
 * @version February 23, 2019, 3:40 pm UTC
 *
 * @property \App\Models\HistoryKela historyKela
 * @property \Illuminate\Database\Eloquent\Collection detailKeluarga
 * @property \Illuminate\Database\Eloquent\Collection keluargaMurid
 * @property \Illuminate\Database\Eloquent\Collection nilaiAkademik
 * @property \Illuminate\Database\Eloquent\Collection pelanggaranMurid
 * @property integer ID_HISTORY_KELAS
 * @property integer IJIN
 * @property integer SAKIT
 * @property integer ALFA
 * @property integer AKHLAQ
 * @property integer KEBERSIHAN
 * @property integer KERAJINAN
 */
class NilaiKarakter extends Model
{
    use SoftDeletes;

    public $table = 'nilai_karakter';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_NILAI_KARAKTER';

    public $fillable = [
        'ID_HISTORY_KELAS',
        'IJIN',
        'SAKIT',
        'ALFA',
        'AKHLAQ',
        'KEBERSIHAN',
        'KERAJINAN',
        'KETEKUNAN'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_NILAI_KARAKTER' => 'integer',
        'ID_HISTORY_KELAS' => 'integer',
        'IJIN' => 'integer',
        'SAKIT' => 'integer',
        'ALFA' => 'integer',
        'AKHLAQ' => 'integer',
        'KEBERSIHAN' => 'integer',
        'KERAJINAN' => 'integer',
        'KETEKUNAN'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function historyKelas()
    {
        return $this->belongsTo(\App\Models\HistoryKelas::class, 'ID_HISTORY_KELAS');
    }
}
