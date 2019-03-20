<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Kelas
 * @package App\Models
 * @version March 9, 2019, 12:14 am UTC
 *
 * @property \App\Models\TahunAjaran tahunAjaran
 * @property \App\Models\Guru guru
 * @property \App\Models\Tingkat tingkat
 * @property \Illuminate\Database\Eloquent\Collection detailKeluarga
 * @property \Illuminate\Database\Eloquent\Collection HistoryKela
 * @property \Illuminate\Database\Eloquent\Collection keluargaMurid
 * @property \Illuminate\Database\Eloquent\Collection nilaiAkademik
 * @property \Illuminate\Database\Eloquent\Collection pelanggaranMurid
 * @property \Illuminate\Database\Eloquent\Collection Pengampu
 * @property string NIP_GURU
 * @property integer ID_TINGKAT
 * @property integer ID_TAHUN_AJARAN
 * @property string NAMA
 */
class Kelas extends Model
{
    use SoftDeletes;

    public $table = 'kelas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_KELAS';

    public $fillable = [
        'NIP_GURU',
        'ID_TINGKAT',
        'ID_TAHUN_AJARAN',
        'NAMA',
        'TAHUN_ANGKATAN',
        'STATUS'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_KELAS' => 'integer',
        'NIP_GURU' => 'string',
        'ID_TINGKAT' => 'integer',
        'ID_TAHUN_AJARAN' => 'integer',
        'NAMA' => 'string',
        'TAHUN_ANGKATAN' => 'integer',
        'STATUS' => 'integer'
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
    public function guru()
    {
        return $this->belongsTo(\App\Models\Guru::class, 'NIP_GURU');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tingkat()
    {
        return $this->belongsTo(\App\Models\Tingkat::class, 'ID_TINGKAT');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function historyKelas()
    {
        return $this->hasMany(\App\Models\HistoryKelas::class, 'ID_KELAS');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pengampu()
    {
        return $this->hasMany(\App\Models\Pengampu::class, 'ID_KELAS');
    }

    public function getNamaLengkapAttribute()
    {
        return 'Kelas '. $this->tingkat->TINGKAT . ' | ' . $this->NAMA . ' | ' . $this->tahunAjaran->NAMA;
    }
}
