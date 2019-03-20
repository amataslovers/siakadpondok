<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Agama
 * @package App\Models
 * @version February 23, 2019, 3:09 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection detailKeluarga
 * @property \Illuminate\Database\Eloquent\Collection Guru
 * @property \Illuminate\Database\Eloquent\Collection keluargaMurid
 * @property \Illuminate\Database\Eloquent\Collection Murid
 * @property \Illuminate\Database\Eloquent\Collection nilaiAkademik
 * @property \Illuminate\Database\Eloquent\Collection pelanggaranMurid
 * @property \Illuminate\Database\Eloquent\Collection TenagaUmum
 * @property string NAMA
 */
class Agama extends Model
{
    use SoftDeletes;

    public $table = 'agama';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_AGAMA';

    public $fillable = [
        'NAMA'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_AGAMA' => 'integer',
        'NAMA' => 'string'
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
    public function guru()
    {
        return $this->hasMany(\App\Models\Guru::class, 'ID_AGAMA');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function jenisKeluarga()
    {
        return $this->belongsToMany(\App\Models\JenisKeluarga::class, 'keluarga_murid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function murid()
    {
        return $this->hasMany(\App\Models\Murid::class, 'ID_AGAMA');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tenagaUmum()
    {
        return $this->hasMany(\App\Models\TenagaUmum::class, 'ID_AGAMA');
    }
}
