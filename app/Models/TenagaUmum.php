<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\User;

/**
 * Class TenagaUmum
 * @package App\Models
 * @version February 23, 2019, 3:46 pm UTC
 *
 * @property \App\Models\Agama agama
 * @property \Illuminate\Database\Eloquent\Collection detailKeluarga
 * @property \Illuminate\Database\Eloquent\Collection keluargaMurid
 * @property \Illuminate\Database\Eloquent\Collection nilaiAkademik
 * @property \Illuminate\Database\Eloquent\Collection pelanggaranMurid
 * @property integer ID_AGAMA
 * @property string NAMA
 * @property string JENIS_KELAMIN
 * @property string TEMPAT_LAHIR
 * @property date TANGGAL_LAHIR
 * @property string ALAMAT
 * @property string NOTELP
 * @property string EMAIL
 * @property string FOTO
 */
class TenagaUmum extends Model
{
    use SoftDeletes;

    public $table = 'tenaga_umum';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'NIP';

    public $fillable = [
        'ID_AGAMA',
        'NIP',
        'NAMA',
        'JENIS_KELAMIN',
        'TEMPAT_LAHIR',
        'TANGGAL_LAHIR',
        'ALAMAT',
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
        'NIP' => 'string',
        'ID_AGAMA' => 'integer',
        'NAMA' => 'string',
        'JENIS_KELAMIN' => 'string',
        'TEMPAT_LAHIR' => 'string',
        'TANGGAL_LAHIR' => 'date',
        'ALAMAT' => 'string',
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
        // 'NIP' => 'required|unique:tenaga_umum,NIP',
        'NAMA' => 'required',
        'TEMPAT_LAHIR' => 'required',
        'TANGGAL_LAHIR' => 'required',
        'ALAMAT' => 'required',
        'email' => 'sometimes|email'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($tenagaUmum) {
            User::where('name', $tenagaUmum->NIP)->delete();
        });

        static::updating(function ($tenagaUmum) {
            User::where('name', $tenagaUmum->original['NIP'])->update(['name' => $tenagaUmum->NIP, 'full_name' => $tenagaUmum->NAMA]);
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function agama()
    {
        return $this->belongsTo(\App\Models\Agama::class, 'ID_AGAMA')->withDefault();
    }

    public function setTanggalLahirAttribute($data)
    {
        $this->attributes['TANGGAL_LAHIR'] = Carbon::createFromFormat('d/m/Y', $data);
    }

    public function getTanggalLahirAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
