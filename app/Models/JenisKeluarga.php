<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class JenisKeluarga
 * @package App\Models
 * @version February 23, 2019, 3:25 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection detailKeluarga
 * @property \Illuminate\Database\Eloquent\Collection keluargaMurid
 * @property \Illuminate\Database\Eloquent\Collection nilaiAkademik
 * @property \Illuminate\Database\Eloquent\Collection pelanggaranMurid
 * @property string NAMA
 */
class JenisKeluarga extends Model
{
    use SoftDeletes;

    public $table = 'jenis_keluarga';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_JENIS_KELUARGA';

    public $fillable = [
        'NAMA'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_JENIS_KELUARGA' => 'integer',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function agama()
    {
        return $this->belongsToMany(\App\Models\Agama::class, 'keluarga_murid');
    }
}
