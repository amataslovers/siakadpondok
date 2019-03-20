<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pengampu
 * @package App\Models
 * @version March 9, 2019, 12:02 am UTC
 *
 * @property \App\Models\Semester semester
 * @property \App\Models\Kela kela
 * @property \App\Models\Guru guru
 * @property \App\Models\MataPelajaran mataPelajaran
 * @property \Illuminate\Database\Eloquent\Collection detailKeluarga
 * @property \Illuminate\Database\Eloquent\Collection keluargaMurid
 * @property \Illuminate\Database\Eloquent\Collection nilaiAkademik
 * @property \Illuminate\Database\Eloquent\Collection pelanggaranMurid
 * @property integer ID_MATA_PELAJARAN
 * @property string NIP_GURU
 * @property integer ID_TAHUN_AJARAN
 * @property decimal KKM
 * @property integer ID_KELAS
 * @property string HARI
 * @property time JAM
 */
class Pengampu extends Model
{
    use SoftDeletes;

    public $table = 'pengampu';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_PENGAMPU';

    public $fillable = [
        'ID_MATA_PELAJARAN',
        'NIP_GURU',
        'ID_TAHUN_AJARAN',
        'KKM',
        'ID_KELAS',
        'HARI',
        'JAM'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_PENGAMPU' => 'integer',
        'ID_MATA_PELAJARAN' => 'integer',
        'NIP_GURU' => 'string',
        'ID_TAHUN_AJARAN' => 'integer',
        'ID_KELAS' => 'integer',
        'HARI' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tahunAjaran()
    {
        return $this->belongsTo(\App\Models\TahunAjaran::class, 'ID_TAHUN_AJARAN');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kelas()
    {
        return $this->belongsTo(\App\Models\Kelas::class, 'ID_KELAS');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function guru()
    {
        return $this->belongsTo(\App\Models\Guru::class, 'NIP_GURU');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function mataPelajaran()
    {
        return $this->belongsTo(\App\Models\MataPelajaran::class, 'ID_MATA_PELAJARAN');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function murid()
    {
        return $this->belongsToMany(\App\Models\Murid::class, 'nilai_akademik', 'ID_PENGAMPU', 'NIS')->withPivot('NILAI_UTS', 'NILAI_UAS');
    }

    public function nilaiAkademik()
    {
        return $this->hasMany(\App\Models\NilaiAkademik::class, 'ID_PENGAMPU');
    }
}
