<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function () {

    Route::resource('agamas', 'AgamaController');

    Route::resource('detailKeluargas', 'DetailKeluargaController');

    Route::resource('historyKelas', 'HistoryKelasController');

    Route::resource('jenisKeluargas', 'JenisKeluargaController');

    Route::resource('tingkats', 'TingkatController');

    Route::resource('pengampus', 'PengampuController');

    Route::resource('kelas', 'KelasController');

    Route::resource('keluargaMurids', 'KeluargaMuridController');

    Route::resource('mataPelajarans', 'MataPelajaranController');

    Route::resource('murids', 'MuridController');

    Route::resource('pelanggaranMurids', 'PelanggaranMuridController');

    Route::resource('peraturans', 'PeraturanController');

    Route::resource('sanksis', 'SanksiController');

    Route::resource('semesters', 'SemesterController');

    Route::resource('tahunAjarans', 'TahunAjaranController');

    Route::resource('tenagaUmums', 'TenagaUmumController');

    Route::resource('catatanSpps', 'CatatanSppController');

    Route::resource('gurus', 'GuruController');

    Route::get('api/keluarga/{id}', 'KeluargaMuridController@getDetailKeluargaById')->name('get-detail-keluarga');
    Route::get('api/peraturan/{id}', 'PelanggaranMuridController@getPeraturanByIdSanksi')->name('get-peraturan');
    Route::delete('api/keluarga/{id}/{nis}', 'KeluargaMuridController@deleteKeluargaViaAjax');

    Route::post('nilaiAkademiks/form-nilai', 'NilaiAkademikController@formNilai')->name('form-isi-nilai-akademik');
    Route::resource('nilaiAkademiks', 'NilaiAkademikController');

    Route::post('nilaiKarakters/form-nilai', 'NilaiKarakterController@formNilai')->name('form-isi-nilai-karakter');
    Route::resource('nilaiKarakters', 'NilaiKarakterController');

    Route::get('kenaikanKelas', 'KenaikanKelasController@index')->name('index-kenaikan-kelas');
    Route::post('kenaikanKelas', 'KenaikanKelasController@prosesNaikKelas')->name('proses-naik-kelas');
    Route::get('tengah-semester', 'KenaikanKelasController@tengahSemester')->name('index-tengah-semester');
    Route::post('tengah-semester', 'KenaikanKelasController@tengahSemester')->name('post-tengah-semester');

    Route::get('cetak/rapot/', 'CetakController@lihatRapot')->name('cetakRapotIndex');
    Route::get('cetak/rapot/{id}', 'CetakController@downloadRapot')->name('cetakRapotDownload');
    // Route::post('users/ganti-password', );
});
