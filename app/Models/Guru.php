<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\User;

/**
 * Class Guru
 * @package App\Models
 * @version February 28, 2019, 12:06 pm UTC
 *
 * @property \App\Models\Agama agama
 * @property \Illuminate\Database\Eloquent\Collection detailKeluarga
 * @property \Illuminate\Database\Eloquent\Collection DetailMapel
 * @property \Illuminate\Database\Eloquent\Collection keluargaMurid
 * @property \Illuminate\Database\Eloquent\Collection nilaiAkademik
 * @property \Illuminate\Database\Eloquent\Collection pelanggaranMurid
 * @property integer ID_AGAMA
 * @property string NAMA
 * @property string NAMA_ARAB
 * @property string JENIS_KELAMIN
 * @property string GELAR_DEPAN
 * @property string GELAR_BELAKANG
 * @property string ALAMAT
 * @property date TANGGAL_LAHIR
 * @property string TEMPAT_LAHIR
 * @property string NOTELP
 * @property string EMAIL
 * @property string FOTO
 */
class Guru extends Model
{
    use SoftDeletes;

    public $table = 'guru';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'NIP_GURU';

    public $fillable = [
        'NIP_GURU',
        'ID_AGAMA',
        'NAMA',
        'NAMA_ARAB',
        'JENIS_KELAMIN',
        'GELAR_DEPAN',
        'GELAR_BELAKANG',
        'ALAMAT',
        'TANGGAL_LAHIR',
        'TEMPAT_LAHIR',
        'NOTELP',
        'EMAIL',
        'FOTO'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'NIP_GURU' => 'string',
        'ID_AGAMA' => 'integer',
        'NAMA' => 'string',
        'NAMA_ARAB' => 'string',
        'JENIS_KELAMIN' => 'string',
        'GELAR_DEPAN' => 'string',
        'GELAR_BELAKANG' => 'string',
        'ALAMAT' => 'string',
        'TANGGAL_LAHIR' => 'date',
        'TEMPAT_LAHIR' => 'string',
        'NOTELP' => 'string',
        'EMAIL' => 'string',
        'FOTO' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'NAMA' => 'required',
        'TEMPAT_LAHIR' => 'required',
        'TANGGAL_LAHIR' => 'required',
        'ALAMAT' => 'required',
        'email' => 'sometimes|email'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($guru) {
            User::where('name', $guru->NIP_GURU)->delete();
        });

        static::updating(function ($guru) {
            User::where('name', $guru->NIP_GURU)->update(['name' => $guru->NIP_GURU, 'full_name' => $guru->NAMA]);
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function agama()
    {
        return $this->belongsTo(\App\Models\Agama::class, 'ID_AGAMA');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pengampu()
    {
        return $this->hasMany(\App\Models\Pengampu::class, 'NIP_GURU');
    }

    public function setTanggalLahirAttribute($data)
    {
        $this->attributes['TANGGAL_LAHIR'] = Carbon::createFromFormat('d/m/Y', $data);
    }

    public function getTanggalLahirAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getNamaLengkapAttribute()
    {
        return $this->NIP_GURU . ' || ' . $this->GELAR_DEPAN . '. ' . $this->NAMA . ' ' . $this->GELAR_BELAKANG;
    }
}
