<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DetailKeluarga
 * @package App\Models
 * @version February 23, 2019, 3:12 pm UTC
 *
 * @property \App\Models\KeluargaMurid keluargaMurid
 * @property \App\Models\Murid murid
 * @property \Illuminate\Database\Eloquent\Collection keluargaMurid
 * @property \Illuminate\Database\Eloquent\Collection nilaiAkademik
 * @property \Illuminate\Database\Eloquent\Collection pelanggaranMurid
 * @property string NIS
 * @property integer ID_KELUARGA_MURID
 */
class DetailKeluarga extends Model
{
    // use SoftDeletes;

    public $table = 'detail_keluarga';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_DETAIL_KELUARGA';

    public $fillable = [
        'NIS',
        'ID_KELUARGA_MURID'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_DETAIL_KELUARGA' => 'integer',
        'NIS' => 'string',
        'ID_KELUARGA_MURID' => 'integer'
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
    public function keluargaMurid()
    {
        return $this->belongsTo(\App\Models\KeluargaMurid::class, 'ID_KELUARGA_MURID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function murid()
    {
        return $this->belongsTo(\App\Models\Murid::class, 'NIS');
    }
}
