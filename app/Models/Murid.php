<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\User;
use File;

/**
 * Class Murid
 * @package App\Models
 * @version February 23, 2019, 3:32 pm UTC
 *
 * @property \App\Models\Agama agama
 * @property \Illuminate\Database\Eloquent\Collection CatatanSpp
 * @property \Illuminate\Database\Eloquent\Collection detailKeluarga
 * @property \Illuminate\Database\Eloquent\Collection HistoryKela
 * @property \Illuminate\Database\Eloquent\Collection keluargaMurid
 * @property \Illuminate\Database\Eloquent\Collection nilaiAkademik
 * @property \Illuminate\Database\Eloquent\Collection pelanggaranMurid
 * @property integer ID_AGAMA
 * @property string NAMA
 * @property string NAMA_ARAB
 * @property string JENIS_KELAMIN
 * @property string TEMPAT_LAHIR
 * @property date TANGGAL_LAHIR
 * @property string ALAMAT
 * @property string EMAIL
 * @property string NOTELP
 * @property string NAMA_ASAL_SEKOLAH
 * @property string ALAMAT_ASAL_SEKOLAH
 * @property string IJAZAH_SD
 * @property string IJAZAH_SMP
 * @property string IJAZAH_SMA
 * @property date TANGGAL_MASUK
 * @property date TANGGAL_KELUAR
 * @property integer ANGKATAN
 * @property string FOTO_AKTE_LAHIR
 * @property string FOTO
 * @property boolean STATUS_AKTIF
 */
class Murid extends Model
{

    public $table = 'murid';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'NIS';
    public $incrementing = false;

    public $fillable = [
        'NIS',
        'NIK',
        'ID_AGAMA',
        'NAMA',
        'NAMA_ARAB',
        'JENIS_KELAMIN',
        'TEMPAT_LAHIR',
        'TANGGAL_LAHIR',
        'ALAMAT',
        'EMAIL',
        'NOTELP',
        'NAMA_ASAL_SEKOLAH',
        'ALAMAT_ASAL_SEKOLAH',
        'IJAZAH_SD',
        'IJAZAH_SMP',
        'IJAZAH_SMA',
        'TANGGAL_MASUK',
        'TANGGAL_KELUAR',
        'ANGKATAN',
        'FOTO_AKTE_LAHIR',
        'FOTO',
        'STATUS_AKTIF'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'NIS' => 'string',
        'NIK' => 'string',
        'ID_AGAMA' => 'integer',
        'NAMA' => 'string',
        'NAMA_ARAB' => 'string',
        'JENIS_KELAMIN' => 'string',
        'TEMPAT_LAHIR' => 'string',
        'TANGGAL_LAHIR' => 'date',
        'ALAMAT' => 'string',
        'EMAIL' => 'string',
        'NOTELP' => 'string',
        'NAMA_ASAL_SEKOLAH' => 'string',
        'ALAMAT_ASAL_SEKOLAH' => 'string',
        'IJAZAH_SD' => 'string',
        'IJAZAH_SMP' => 'string',
        'IJAZAH_SMA' => 'string',
        'TANGGAL_MASUK' => 'date',
        'TANGGAL_KELUAR' => 'date',
        'ANGKATAN' => 'integer',
        'FOTO_AKTE_LAHIR' => 'string',
        'FOTO' => 'string',
        'STATUS_AKTIF' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'NIS' => 'required',
        'NIK' => 'required',
        'TANGGAL_LAHIR' => 'required',
        'FOTO' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,svg|max:20048',
        'IJAZAH_SD' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,svg|max:20048',
        'IJAZAH_SMP' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,svg|max:20048',
        'IJAZAH_SMA' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,svg|max:20048',
        'FOTO_AKTE_LAHIR' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,svg|max:20048',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($murid) {
            User::where('name', $murid->NIS)->delete();
        });

        static::updating(function ($murid) {
            User::where('name', $murid->NIS)->update(['name' => $murid->NIS]);
        });
    }

    public function setTanggalLahirAttribute($data)
    {
        $this->attributes['TANGGAL_LAHIR'] = Carbon::createFromFormat('d/m/Y', $data);
    }

    public function getTanggalLahirAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function uploadGambar($request)
    {
        $input = $request->all();
        $nis = $input['NIS'];
        if ($request->file('FOTO')) {
            if (!empty($this->FOTO)) {
                File::delete(public_path("upload/profile/" . $this->FOTO));
            }
            $input['FOTO'] = $nis . '-' . date('d-m-Y') . '.' . request()->FOTO->getClientOriginalExtension();
            $image = $request->file('FOTO');
            $image->move(public_path('upload/profile/'), $input['FOTO']);
        }
        if ($request->file('IJAZAH_SD')) {
            if (!empty($this->IJAZAH_SD)) {
                File::delete(public_path("upload/ijazah_sd/" . $this->IJAZAH_SD));
            }
            $input['IJAZAH_SD'] = $nis . '- IJAZAH SD -' . date('d-m-Y') . '.' . request()->IJAZAH_SD->getClientOriginalExtension();
            $image = $request->file('IJAZAH_SD');
            $image->move(public_path('upload/ijazah_sd/'), $input['IJAZAH_SD']);
        }
        if ($request->file('IJAZAH_SMP')) {
            if (!empty($this->IJAZAH_SMP)) {
                File::delete(public_path("upload/ijazah_smp/" . $this->IJAZAH_SMP));
            }
            $input['IJAZAH_SMP'] = $nis . '- IJAZAH SMP -' . date('d-m-Y') . '.' . request()->IJAZAH_SMP->getClientOriginalExtension();
            $image = $request->file('IJAZAH_SMP');
            $image->move(public_path('upload/ijazah_smp/'), $input['IJAZAH_SMP']);
        }
        if ($request->file('IJAZAH_SMA')) {
            if (!empty($this->IJAZAH_SMA)) {
                File::delete(public_path("upload/ijazah_sma/" . $this->IJAZAH_SMA));
            }
            $input['IJAZAH_SMA'] = $nis . '- IJAZAH SMA -' . date('d-m-Y') . '.' . request()->IJAZAH_SMA->getClientOriginalExtension();
            $image = $request->file('IJAZAH_SMA');
            $image->move(public_path('upload/ijazah_sma/'), $input['IJAZAH_SMA']);
        }
        if ($request->file('FOTO_AKTE_LAHIR')) {
            if (!empty($this->FOTO_AKTE_LAHIR)) {
                File::delete(public_path("upload/akte_lahir/" . $this->FOTO_AKTE_LAHIR));
            }
            $input['FOTO_AKTE_LAHIR'] = $nis . '- AKTE LAHIR -' . date('d-m-Y') . '.' . request()->FOTO_AKTE_LAHIR->getClientOriginalExtension();
            $image = $request->file('FOTO_AKTE_LAHIR');
            $image->move(public_path('upload/akte_lahir/'), $input['FOTO_AKTE_LAHIR']);
        }

        return $input;
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
    public function catatanSpp()
    {
        return $this->hasMany(\App\Models\CatatanSpp::class, 'NIS');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function keluargaMurid()
    {
        return $this->belongsToMany(\App\Models\KeluargaMurid::class, 'detail_keluarga', 'NIS', 'ID_KELUARGA_MURID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function historyKelas()
    {
        return $this->hasMany(\App\Models\HistoryKelas::class, 'NIS');
    }

    public function kelasSekarang()
    {
        return $this->hasMany(\App\Models\HistoryKelas::class, 'NIS')->orderBy('ID_HISTORY_KELAS', 'desc')->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function pengampu()
    {
        return $this->belongsToMany(\App\Models\Pengampu::class, 'nilai_akademik', 'NIS', 'ID_PENGAMPU')->withPivot('NILAI_UTS', 'NILAI_UAS');
    }

    public function kelas()
    {
        return $this->belongsToMany(\App\Models\Kelas::class, 'history_kelas', 'NIS', 'ID_KELAS')->groupBy('ID_KELAS');
    }

    public function nilaiAkademik()
    {
        return $this->hasMany(\App\Models\NilaiAkademik::class, 'NIS');
    }
}
