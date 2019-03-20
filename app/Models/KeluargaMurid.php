<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\Models\DetailKeluarga;

/**
 * Class KeluargaMurid
 * @package App\Models
 * @version February 23, 2019, 3:29 pm UTC
 *
 * @property \App\Models\JenisKeluarga jenisKeluarga
 * @property \App\Models\Agama agama
 * @property \Illuminate\Database\Eloquent\Collection detailKeluarga
 * @property \Illuminate\Database\Eloquent\Collection nilaiAkademik
 * @property \Illuminate\Database\Eloquent\Collection pelanggaranMurid
 * @property integer ID_JENIS_KELUARGA
 * @property integer ID_AGAMA
 * @property string NAMA
 * @property date TANGGAL_LAHIR
 * @property string TEMPAT_LAHIR
 * @property string ALAMAT
 * @property string EMAIL
 * @property string NOTELP
 * @property string PEKERJAAN
 */
class KeluargaMurid extends Model
{
    use SoftDeletes;

    public $table = 'keluarga_murid';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_KELUARGA_MURID';

    public $fillable = [
        'ID_JENIS_KELUARGA',
        'ID_AGAMA',
        'NAMA',
        'TANGGAL_LAHIR',
        'TEMPAT_LAHIR',
        'ALAMAT',
        'EMAIL',
        'NOTELP',
        'PEKERJAAN'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_KELUARGA_MURID' => 'integer',
        'ID_JENIS_KELUARGA' => 'integer',
        'ID_AGAMA' => 'integer',
        'NAMA' => 'string',
        'TANGGAL_LAHIR' => 'date',
        'TEMPAT_LAHIR' => 'string',
        'ALAMAT' => 'string',
        'EMAIL' => 'string',
        'NOTELP' => 'string',
        'PEKERJAAN' => 'string'
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
    public function jenisKeluarga()
    {
        return $this->belongsTo(\App\Models\JenisKeluarga::class, 'ID_JENIS_KELUARGA');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function agama()
    {
        return $this->belongsTo(\App\Models\Agama::class, 'ID_AGAMA');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function murids()
    {
        return $this->belongsToMany(\App\Models\Murid::class, 'detail_keluarga', 'NIS', 'ID_DETAIL_KELUARGA');
    }

    public function setTanggalLahirAttribute($data)
    {
        $this->attributes['TANGGAL_LAHIR'] = Carbon::createFromFormat('d/m/Y', $data);
    }

    public function getTanggalLahirAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getNamaKeluargaLengkapAttribute()
    {
        return $this->jenisKeluarga->NAMA . ' || ' . $this->NAMA . ' || ' . $this->TANGGAL_LAHIR;
    }

    public function idKeluargaTerdata($data)
    {
        $dataIdKeluarga = array();
        foreach ($data as $value) {
            array_push($dataIdKeluarga, $value->ID_KELUARGA_MURID);
        }
        return $dataIdKeluarga;
    }
}
