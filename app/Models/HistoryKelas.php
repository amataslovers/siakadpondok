<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class HistoryKelas
 * @package App\Models
 * @version February 23, 2019, 3:24 pm UTC
 *
 * @property \App\Models\Kela kela
 * @property \App\Models\Murid murid
 * @property \App\Models\Semester semester
 * @property \Illuminate\Database\Eloquent\Collection detailKeluarga
 * @property \Illuminate\Database\Eloquent\Collection keluargaMurid
 * @property \Illuminate\Database\Eloquent\Collection nilaiAkademik
 * @property \Illuminate\Database\Eloquent\Collection NilaiKarakter
 * @property \Illuminate\Database\Eloquent\Collection pelanggaranMurid
 * @property integer ID_KELAS
 * @property integer ID_SEMESTER
 * @property string NIS
 */
class HistoryKelas extends Model
{
    use SoftDeletes;

    public $table = 'history_kelas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_HISTORY_KELAS';

    public $fillable = [
        'ID_KELAS',
        'ID_SEMESTER',
        'NIS'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_HISTORY_KELAS' => 'integer',
        'ID_KELAS' => 'integer',
        'ID_SEMESTER' => 'integer',
        'NIS' => 'string'
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
    public function kelas()
    {
        return $this->belongsTo(\App\Models\Kelas::class, 'ID_KELAS');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function murid()
    {
        return $this->belongsTo(\App\Models\Murid::class, 'NIS');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function semester()
    {
        return $this->belongsTo(\App\Models\Semester::class, 'ID_SEMESTER');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function nilaiKarakter()
    {
        return $this->hasOne(\App\Models\NilaiKarakter::class, 'ID_HISTORY_KELAS');
    }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    //  **/
    // public function peraturan()
    // {
    //     return $this->belongsToMany(\App\Models\Peraturan::class, 'pelanggaran_murid','ID_HISTORY_KELAS', 'ID_PERATURAN');
    // }

    public function pelanggaranMurid()
    {
        return $this->hasMany(\App\Models\PelanggaranMurid::class, 'ID_HISTORY_KELAS');
    }

    public function nilaiAkademik()
    {
        return $this->hasMany(\App\Models\NilaiAkademik::class, 'ID_HISTORY_KELAS');
    }

    public function getFullNameAttribute()
    {
        return $this->murid->NAMA . ' | Kelas ' . $this->kelas->tingkat->TINGKAT . 
                ' | ' . $this->kelas->NAMA . ' | Semester ' . $this->semester->SEMESTER;
    }
}
