<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CatatanSpp
 * @package App\Models
 * @version February 24, 2019, 12:06 am UTC
 *
 * @property \App\Models\HistoryKela historyKela
 * @property \Illuminate\Database\Eloquent\Collection detailKeluarga
 * @property \Illuminate\Database\Eloquent\Collection keluargaMurid
 * @property \Illuminate\Database\Eloquent\Collection nilaiAkademik
 * @property \Illuminate\Database\Eloquent\Collection pelanggaranMurid
 * @property integer ID_HISTORY_KELAS
 * @property date TANGGAL_BAYAR
 * @property string KETERANGAN
 * @property bigInteger TOTAL_BAYAR
 */
class CatatanSpp extends Model
{
    use SoftDeletes;

    public $table = 'catatan_spp';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_CATATAN_SPP';

    public $fillable = [
        'ID_HISTORY_KELAS',
        'TANGGAL_BAYAR',
        'BULAN',
        'KETERANGAN',
        'TOTAL_BAYAR'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_CATATAN_SPP' => 'integer',
        'ID_HISTORY_KELAS' => 'integer',
        'TANGGAL_BAYAR' => 'date',
        'BULAN' => 'integer',
        'KETERANGAN' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ID_HISTORY_KELAS' => 'required',
        'TANGGAL_BAYAR' => 'required',
        'BULAN' => 'required',
    ];

    public function setTanggalBayarAttribute($data)
    {
        $this->attributes['TANGGAL_BAYAR'] = \Carbon\Carbon::createFromFormat('d/m/Y', $data);
    }

    public function getTanggalBayarAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function historyKelas()
    {
        return $this->belongsTo(\App\Models\HistoryKelas::class, 'ID_HISTORY_KELAS')->withDefault();
    }
}
