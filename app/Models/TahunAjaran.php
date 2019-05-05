<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TahunAjaran
 * @package App\Models
 * @version February 23, 2019, 3:45 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection detailKeluarga
 * @property \Illuminate\Database\Eloquent\Collection keluargaMurid
 * @property \Illuminate\Database\Eloquent\Collection nilaiAkademik
 * @property \Illuminate\Database\Eloquent\Collection pelanggaranMurid
 * @property \Illuminate\Database\Eloquent\Collection Semester
 * @property string NAMA
 * @property boolean STATUS
 */
class TahunAjaran extends Model
{
    use SoftDeletes;

    public $table = 'tahun_ajaran';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_TAHUN_AJARAN';

    public $fillable = [
        'NAMA',
        'STATUS'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_TAHUN_AJARAN' => 'integer',
        'NAMA' => 'string',
        'STATUS' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function semester()
    {
        return $this->hasMany(\App\Models\Semester::class, 'ID_TAHUN_AJARAN');
    }

    public function getNamaStatusAttribute()
    {
        return $this->NAMA . ' || ' . (($this->STATUS) ? 'Aktif' : 'NonAktif');
        // return $this->NAMA . ' || ' . $this->STATUS;
    }
}
