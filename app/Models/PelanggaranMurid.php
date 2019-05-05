<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class PelanggaranMurid
 * @package App\Models
 * @version February 23, 2019, 3:41 pm UTC
 *
 * @property \App\Models\Peraturan peraturan
 * @property \App\Models\HistoryKela historyKela
 * @property \Illuminate\Database\Eloquent\Collection detailKeluarga
 * @property \Illuminate\Database\Eloquent\Collection keluargaMurid
 * @property \Illuminate\Database\Eloquent\Collection nilaiAkademik
 * @property integer ID_PERATURAN
 * @property integer ID_HISTORY_KELAS
 * @property date TANGGAL_MELANGGAR
 * @property string KETERANGAN
 */
class PelanggaranMurid extends Model
{
    use SoftDeletes;

    public $table = 'pelanggaran_murid';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_PELANGGARAN_MURID';

    public $fillable = [
        'ID_PERATURAN',
        'ID_HISTORY_KELAS',
        'TANGGAL_MELANGGAR',
        'KETERANGAN'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_PELANGGARAN_MURID' => 'integer',
        'ID_PERATURAN' => 'integer',
        'ID_HISTORY_KELAS' => 'integer',
        'TANGGAL_MELANGGAR' => 'date',
        'KETERANGAN' => 'string'
    ];

    protected $appends = ['TANGGAL_MELANGGAR'];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ID_PERATURAN' => 'required',
        'ID_HISTORY_KELAS' => 'required',
        'TANGGAL_MELANGGAR' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function peraturan()
    {
        return $this->belongsTo(\App\Models\Peraturan::class, 'ID_PERATURAN')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function historyKelas()
    {
        return $this->belongsTo(\App\Models\HistoryKelas::class, 'ID_HISTORY_KELAS')->withDefault();
    }

    public function setTanggalMelanggarAttribute($data)
    {
        $this->attributes['TANGGAL_MELANGGAR'] = Carbon::createFromFormat('d/m/Y', $data);
    }

    public function getTanggalMelanggarAttribute()
    {
        return Carbon::parse($this->attributes['TANGGAL_MELANGGAR'])->format('d/m/Y');
    }
}
