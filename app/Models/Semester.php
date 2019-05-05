<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Semester
 * @package App\Models
 * @version February 23, 2019, 3:44 pm UTC
 *
 * @property \App\Models\TahunAjaran tahunAjaran
 * @property \Illuminate\Database\Eloquent\Collection detailKeluarga
 * @property \Illuminate\Database\Eloquent\Collection DetailMapel
 * @property \Illuminate\Database\Eloquent\Collection HistoryKela
 * @property \Illuminate\Database\Eloquent\Collection keluargaMurid
 * @property \Illuminate\Database\Eloquent\Collection nilaiAkademik
 * @property \Illuminate\Database\Eloquent\Collection pelanggaranMurid
 * @property integer ID_TAHUN_AJARAN
 * @property integer SEMESTER
 * @property boolean STATUS
 */
class Semester extends Model
{
    use SoftDeletes;

    public $table = 'semester';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_SEMESTER';

    public $fillable = [
        'ID_TAHUN_AJARAN',
        'SEMESTER',
        'STATUS'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_SEMESTER' => 'integer',
        'ID_TAHUN_AJARAN' => 'integer',
        'SEMESTER' => 'integer',
        'STATUS' => 'boolean'
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
    public function tahunAjaran()
    {
        return $this->belongsTo(\App\Models\TahunAjaran::class, 'ID_TAHUN_AJARAN')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pengampu()
    {
        return $this->hasMany(\App\Models\Pengampu::class, 'ID_SEMESTER');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function historyKelas()
    {
        return $this->hasMany(\App\Models\HistoryKelas::class, 'ID_SEMESTER');
    }

    public function getNamaLengkapAttribute()
    {
        return $this->tahunAjaran->NAMA . ' | Semester ' . $this->SEMESTER;
    }
}
