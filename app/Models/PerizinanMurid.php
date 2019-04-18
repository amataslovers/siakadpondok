<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class PerizinanMurid
 * @package App\Models
 * @version April 8, 2019, 1:55 pm UTC
 *
 * @property \App\Models\HistoryKela historyKela
 * @property \Illuminate\Database\Eloquent\Collection detailKeluarga
 * @property \Illuminate\Database\Eloquent\Collection keluargaMurid
 * @property \Illuminate\Database\Eloquent\Collection pelanggaranMurid
 * @property integer ID_HISTORY_KELAS
 * @property string JENIS
 * @property string KETERANGAN
 * @property date TANGGAL
 * @property integer TOTAL_HARI
 */
class PerizinanMurid extends Model
{
    use SoftDeletes;

    public $table = 'perizinan_murid';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_PERIZINAN_MURID';

    public $fillable = [
        'ID_HISTORY_KELAS',
        'JENIS',
        'KETERANGAN',
        'TANGGAL',
        'TOTAL_HARI'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_HISTORY_KELAS' => 'integer',
        'JENIS' => 'string',
        'KETERANGAN' => 'string',
        'TANGGAL' => 'date',
        'TOTAL_HARI' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ID_HISTORY_KELAS' => 'required',
        'TANGGAL' => 'required'
    ];

    public function setTanggalAttribute($data)
    {
        $this->attributes['TANGGAL'] = Carbon::createFromFormat('d/m/Y', $data);
    }

    public function getTanggalAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function historyKelas()
    {
        return $this->belongsTo(\App\Models\HistoryKelas::class, 'ID_HISTORY_KELAS');
    }
}
