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
 * @property string JENIS_PEMBAYARAN
 * @property string NO_REFERENSI
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
        'JENIS_PEMBAYARAN',
        'NO_REFERENSI',
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
        'JENIS_PEMBAYARAN' => 'string',
        'NO_REFERENSI' => 'string',
        'KETERANGAN' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function historyKelas()
    {
        return $this->belongsTo(\App\Models\HistoryKelas::class, 'ID_HISTORY_KELAS');
    }
}
