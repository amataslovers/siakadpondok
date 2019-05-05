<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sanksi
 * @package App\Models
 * @version February 23, 2019, 3:43 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection detailKeluarga
 * @property \Illuminate\Database\Eloquent\Collection keluargaMurid
 * @property \Illuminate\Database\Eloquent\Collection nilaiAkademik
 * @property \Illuminate\Database\Eloquent\Collection pelanggaranMurid
 * @property \Illuminate\Database\Eloquent\Collection Peraturan
 * @property string NAMA_SANKSI
 */
class Sanksi extends Model
{
    use SoftDeletes;

    public $table = 'sanksi';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_SANKSI';

    public $fillable = [
        'NAMA_SANKSI'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_SANKSI' => 'integer',
        'NAMA_SANKSI' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'NAMA_SANKSI' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function peraturan()
    {
        return $this->hasMany(\App\Models\Peraturan::class, 'ID_SANKSI');
    }
}
