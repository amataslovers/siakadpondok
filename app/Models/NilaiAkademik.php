<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NilaiAkademik
 * @package App\Models
 * @version February 23, 2019, 3:35 pm UTC
 *
 * @property \App\Models\Murid murid
 * @property \App\Models\DetailMapel detailMapel
 * @property \Illuminate\Database\Eloquent\Collection detailKeluarga
 * @property \Illuminate\Database\Eloquent\Collection keluargaMurid
 * @property \Illuminate\Database\Eloquent\Collection pelanggaranMurid
 * @property integer ID_PENGAMPU
 * @property string NIS
 * @property decimal NILAI_UTS
 * @property decimal NILAI_UAS
 */
class NilaiAkademik extends Model
{
    use SoftDeletes;

    public $table = 'nilai_akademik';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_NILAI';

    public $fillable = [
        'ID_PENGAMPU',
        'NIS',
        'ID_SEMESTER',
        'NILAI_UTS',
        'NILAI_UAS',
        'ID_HISTORY_KELAS'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_NILAI' => 'integer',
        'ID_PENGAMPU' => 'integer',
        'ID_SEMESTER' => 'integer',
        'NIS' => 'string',
        'ID_HISTORY_KELAS' => 'integer'
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
    public function murid()
    {
        return $this->belongsTo(\App\Models\Murid::class, 'NIS')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pengampu()
    {
        return $this->belongsTo(\App\Models\Pengampu::class, 'ID_PENGAMPU')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function semester()
    {
        return $this->belongsTo(\App\Models\Semester::class, 'ID_SEMESTER')->withDefault();
    }

    public function historyKelas()
    {
        return $this->belongsTo(\App\Models\HistoryKelas::class, 'ID_HISTORY_KELAS')->withDefault();
    }
}
