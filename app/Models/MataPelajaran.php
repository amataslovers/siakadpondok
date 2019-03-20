<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MataPelajaran
 * @package App\Models
 * @version March 3, 2019, 3:38 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection detailKeluarga
 * @property \Illuminate\Database\Eloquent\Collection DetailMapel
 * @property \Illuminate\Database\Eloquent\Collection keluargaMurid
 * @property \Illuminate\Database\Eloquent\Collection nilaiAkademik
 * @property \Illuminate\Database\Eloquent\Collection pelanggaranMurid
 * @property string KODE_MAPEL
 * @property string NAMA
 * @property string NAMA_ARAB
 */
class MataPelajaran extends Model
{
    use SoftDeletes;

    public $table = 'mata_pelajaran';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_MATA_PELAJARAN';

    public $fillable = [
        'KODE_MAPEL',
        'NAMA',
        'NAMA_ARAB'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_MATA_PELAJARAN' => 'integer',
        'KODE_MAPEL' => 'string',
        'NAMA' => 'string',
        'NAMA_ARAB' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pengampu()
    {
        return $this->hasMany(\App\Models\Pengampu::class, 'ID_MATA_PELAJARAN');
    }

    public function getKodeNamaAttribute()
    {
        return $this->KODE_MAPEL .' - '. $this->NAMA;
    }
}
