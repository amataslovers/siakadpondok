<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Peraturan
 * @package App\Models
 * @version February 23, 2019, 3:42 pm UTC
 *
 * @property \App\Models\Sanksi sanksi
 * @property \Illuminate\Database\Eloquent\Collection detailKeluarga
 * @property \Illuminate\Database\Eloquent\Collection keluargaMurid
 * @property \Illuminate\Database\Eloquent\Collection nilaiAkademik
 * @property \Illuminate\Database\Eloquent\Collection pelanggaranMurid
 * @property integer ID_SANKSI
 * @property string NAMA_PERATURAN
 */
class Peraturan extends Model
{
    use SoftDeletes;

    public $table = 'peraturan';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_PERATURAN';

    public $fillable = [
        'ID_SANKSI',
        'NAMA_PERATURAN'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_PERATURAN' => 'integer',
        'ID_SANKSI' => 'integer',
        'NAMA_PERATURAN' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'NAMA_PERATURAN' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sanksi()
    {
        return $this->belongsTo(\App\Models\Sanksi::class, 'ID_SANKSI')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function historyKelas()
    {
        return $this->belongsToMany(\App\Models\HistoryKelas::class, 'pelanggaran_murid', 'ID_HISTORY_KELAS', 'ID_PERATURAN');
    }
}
