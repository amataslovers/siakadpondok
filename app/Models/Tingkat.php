<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tingkat
 * @package App\Models
 * @version March 8, 2019, 2:45 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection detailKeluarga
 * @property \Illuminate\Database\Eloquent\Collection Kela
 * @property \Illuminate\Database\Eloquent\Collection keluargaMurid
 * @property \Illuminate\Database\Eloquent\Collection nilaiAkademik
 * @property \Illuminate\Database\Eloquent\Collection pelanggaranMurid
 * @property integer TINGKAT
 * @property integer KODE_LULUS
 */
class Tingkat extends Model
{
    use SoftDeletes;

    public $table = 'tingkat';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_TINGKAT';

    public $fillable = [
        'TINGKAT',
        'SETARA',
        'KODE_LULUS'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_TINGKAT' => 'integer',
        'TINGKAT' => 'integer',
        'SETARA' => 'integer',
        'KODE_LULUS' => 'integer'
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
    public function kelas()
    {
        return $this->hasMany(\App\Models\Kela::class);
    }
}
