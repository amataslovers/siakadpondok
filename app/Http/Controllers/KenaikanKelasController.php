<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengampu;
use Illuminate\Support\Facades\DB;
use App\Models\NilaiAkademik;
use App\Models\Semester;
use App\Models\TahunAjaran;
use App\Models\HistoryKelas;
use Flash;
use App\Models\NilaiKarakter;
use App\Models\Kelas;
use App\Models\Tingkat;
use App\Models\Murid;

class KenaikanKelasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:tenaga-umum|administrator']);
    }

    public function index(Request $request)
    {

        $semester = Semester::whereHas('tahunAjaran', function ($q) {
            $q->where('STATUS', 1);
        })
            ->orderBy('SEMESTER', 'asc')
            ->select('ID_SEMESTER')
            ->get();

        $pengampu = Pengampu::whereHas('tahunAjaran', function ($q) {
            $q->where('STATUS', 1);
        })
            ->orderBy('created_at', 'asc')
            ->select('ID_PENGAMPU')
            ->get();

        if (count($semester) < 2) {
            Flash::error('Semester ganjil belum terpenuhi.');
            return view('kenaikan_kelas.index')->with(['hasil' => false]);
        }

        $idpengampu = $pengampu->pluck('ID_PENGAMPU');

        if (count($semester) > 1) {
            // cek posisi semester murid sekarang ganjil / genap
            $cekHistoryKelas = HistoryKelas::select('ID_KELAS')->where([
                ['ID_KELAS', $pengampu->first()->ID_KELAS],
                ['ID_SEMESTER', $semester->last()->ID_SEMESTER]
            ])->groupBy('ID_KELAS')->get();

            if (count($cekHistoryKelas) > 0) {
                Flash::error('Kenaikan kelas tidak dapat dilakukan.');
                return view('kenaikan_kelas.index')->with(['hasil' => false]);
            }
        }
        $hasil = collect();
        foreach ($idpengampu as $value) {
            //cek nilai apakah sudah ada berdsarkan mapel dan semester
            $nilai = NilaiAkademik::select('NIS')
                ->where([
                    ['ID_PENGAMPU', $value],
                    ['ID_SEMESTER', $semester->last()->ID_SEMESTER]
                ])
                ->whereNotNull('NILAI_UTS')
                ->whereNotNull('NILAI_UAS')
                ->groupBy('NIS')
                ->get();
            if (!$nilai->isEmpty()) {
                $hasil->push($nilai);
            }
        }
        if (count($idpengampu) !== count($hasil)) {
            Flash::error('Terdapat nilai akademik yang belum dimasukan.');
        } else {
            //cek apakah nilai karakter sudah ada atau belum
            $getHistoryMurid = HistoryKelas::select('ID_HISTORY_KELAS')
                ->where('ID_SEMESTER', $semester->last()->ID_SEMESTER)->pluck('ID_HISTORY_KELAS');
            $cekNilaiKarakter = NilaiKarakter::whereIn('ID_HISTORY_KELAS', $getHistoryMurid)->get();
            if ($cekNilaiKarakter->isEmpty()) {
                Flash::error('Nilai Karakter belum diinputkan.');
            } else {
                Flash::success('Nilai akhir semester telah lengkap.');
                Flash::success('Nilai karakter telah lengkap.');
            }
        }
        //cek apakah jumlah pengampu == hasil dari foreach nilai berdasarkan pengampu dan semester yg berjalan &&
        //cek apakah nilai karakter sudah terisi atau belum
        return view('kenaikan_kelas.index')->with(['hasil' => (count($idpengampu) == count($hasil) && !$cekNilaiKarakter->isEmpty()) ? true : false]);
    }

    public function tengahSemester(Request $request)
    {

        // mendapatkan semester berdasarkan tahun ajaran aktif
        $semester = Semester::whereHas('tahunAjaran', function ($q) {
            $q->where('STATUS', 1);
        })
            ->orderBy('SEMESTER', 'asc')
            ->get();

        // mendapatkan pengampu / detail mapel berdasarkan tahun ajaran yg aktif                            
        $pengampu = Pengampu::whereHas('tahunAjaran', function ($q) {
            $q->where('STATUS', 1);
        })
            ->orderBy('created_at', 'asc')
            ->get();

        $idpengampu = $pengampu->pluck('ID_PENGAMPU');

        if (count($semester) > 1) {
            // cek posisi semester murid sekarang ganjil / genap
            $cekHistoryKelas = HistoryKelas::select('ID_KELAS')->where([
                ['ID_KELAS', $pengampu->first()->ID_KELAS],
                ['ID_SEMESTER', $semester->last()->ID_SEMESTER]
            ])->groupBy('ID_KELAS')->get();

            if (count($cekHistoryKelas) > 0) {
                Flash::error('Kenaikan semester tidak dapat dilakukan.');
                return view('kenaikan_kelas.tengah_semester')->with(['hasil' => false]);
            }
        }
        $hasil = collect();
        foreach ($idpengampu as $value) {
            //cek nilai apakah sudah ada berdsarkan mapel dan semester
            $nilai = NilaiAkademik::select('NIS')
                ->where([
                    ['ID_PENGAMPU', $value],
                    ['ID_SEMESTER', $semester->first()->ID_SEMESTER]
                ])
                ->whereNotNull('NILAI_UTS')
                ->whereNotNull('NILAI_UAS')
                ->groupBy('NIS')
                ->get();
            if (!$nilai->isEmpty()) {
                $hasil->push($nilai);
            }
        }

        if (is_null($request->get('action'))) { //cek ada aksi atau tidak (tombol naik diklik)
            if (count($idpengampu) !== count($hasil)) {
                Flash::error('Terdapat nilai yang belum dimasukan.');
            } else {
                //cek apakah nilai karakter sudah ada atau belum
                $getHistoryMurid = HistoryKelas::select('ID_HISTORY_KELAS')
                    ->where('ID_SEMESTER', $semester->first()->ID_SEMESTER)->pluck('ID_HISTORY_KELAS');
                $cekNilaiKarakter = NilaiKarakter::whereIn('ID_HISTORY_KELAS', $getHistoryMurid)->get();
                if ($cekNilaiKarakter->isEmpty()) {
                    Flash::error('Nilai Karakter belum diinputkan.');
                } else {
                    Flash::success('Nilai tengah semester telah lengkap.');
                }
            }
            //cek apakah jumlah pengampu == hasil dari foreach nilai berdasarkan pengampu dan semester yg berjalan &&
            //cek apakah nilai karakter sudah terisi atau belum
            return view('kenaikan_kelas.tengah_semester')->with(['hasil' => (count($idpengampu) == count($hasil) && !$cekNilaiKarakter->isEmpty()) ? true : false]);
        } else {
            DB::beginTransaction();
            try {
                $dataSebelumNaik = HistoryKelas::where('ID_SEMESTER', $semester->first()->ID_SEMESTER)
                    ->get();
                if (count($semester) < 2) {
                    $semesterBaru = Semester::create([
                        'ID_TAHUN_AJARAN' => $semester->first()->ID_TAHUN_AJARAN,
                        'SEMESTER' => 2,
                        'STATUS' => 1
                    ]);

                    $semester->first()->update(['STATUS' => 0]);
                }

                foreach ($dataSebelumNaik as $value) {
                    $dataNaikKelas = HistoryKelas::create(
                        [
                            'ID_KELAS' => $value->ID_KELAS,
                            'ID_SEMESTER' => $semesterBaru->ID_SEMESTER,
                            'NIS' => $value->NIS
                        ]
                    );

                    $updateNilaiHistoryKelas = NilaiAkademik::where(
                        [
                            'NIS' => $value->NIS,
                            'ID_SEMESTER' => $value->ID_SEMESTER
                        ]
                    )->update(['ID_HISTORY_KELAS' => $value->ID_HISTORY_KELAS]);
                }

                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
            }
            Flash::success('Kenaikan tengah semester sukses.');
            return redirect()->route('index-kenaikan-kelas');
        }
    }

    public function prosesNaikKelas(Request $request)
    {
        DB::beginTransaction();
        try {
            $dataTahunAjaranLama = TahunAjaran::where('STATUS', 1)->first();
            $dataSemesterLama = Semester::whereHas('tahunAjaran', function ($q) {
                $q->where('STATUS', 1);
            })->where('STATUS', 1)->first();
            $dataTahunExplode = explode('/', $dataTahunAjaranLama->NAMA);
            $tahun = (int)end($dataTahunExplode);

            $dataTahunAjaranBaru = TahunAjaran::create([
                'NAMA' => $tahun . '/' . ++$tahun,
                'STATUS' => 0
            ]);
            $dataSemesterBaru = Semester::create([
                'ID_TAHUN_AJARAN' => $dataTahunAjaranBaru->ID_TAHUN_AJARAN,
                'SEMESTER' => 1,
                'STATUS' => 0
            ]);

            $dataKelasLama = Kelas::with('tingkat')
                ->whereHas('tahunAjaran', function ($query) {
                    $query->where('STATUS', 1);
                })
                ->where('STATUS', 1)
                ->get();

            $dataTingkat = Tingkat::orderBy('TINGKAT')->get();

            foreach ($dataKelasLama as $key => $value) {
                if ((int)$dataTingkat->last()->TINGKAT == (int)$value->tingkat->TINGKAT) {
                    Kelas::where('TAHUN_ANGKATAN', $value->TAHUN_ANGKATAN)->update(['STATUS' => 0]);
                } else {
                    $tingkatLama = $dataTingkat->where('TINGKAT', $value->TINGKAT)->keys()->first();
                    $tingkatBaru = $dataTingkat->get(++$tingkatLama)->ID_TINGKAT;
                    $buatKelasBaru = Kelas::create([
                        'NIP_GURU' => $value->NIP_GURU,
                        'ID_TINGKAT' => $tingkatBaru,
                        'NAMA' => $value->NAMA,
                        'ID_TAHUN_AJARAN' => $dataTahunAjaranBaru->ID_TAHUN_AJARAN,
                        'TAHUN_ANGKATAN' => $value->TAHUN_ANGKATAN,
                        'STATUS' => 1
                    ]);
                }
            }

            $dataSebelumNaik = HistoryKelas::with(['murid:NIS', 'murid.nilaiAkademik.pengampu', 'kelas'])
                ->where('ID_SEMESTER', $dataSemesterLama->ID_SEMESTER)
                ->get();
            // $b = $dataSebelumNaik->first()->murid->nilaiAkademik->first()->pengampu->KKM;

            foreach ($dataSebelumNaik as $key => $value) {
                $jumlahNilaiDiBawahKKM = 0;
                foreach ($value->murid->nilaiAkademik as $num => $data) {
                    $nilaiUas = $data->NILAI_UAS;
                    $kkm = $data->pengampu->KKM;
                    if ((int)$data->pengampu->STATUS_KKM) {
                        if (floatval($nilaiUas) < floatval($kkm)) {
                            ++$jumlahNilaiDiBawahKKM;
                        }
                    }
                }

                if ($jumlahNilaiDiBawahKKM < 2) {
                    if ((int)$value->kelas->STATUS) {
                        $dataKelasMurid = Kelas::where('TAHUN_ANGKATAN', $value->kelas->TAHUN_ANGKATAN)
                            ->where('ID_TAHUN_AJARAN', $dataTahunAjaranBaru->ID_TAHUN_AJARAN)
                            ->select('ID_KELAS')
                            ->first();

                        $dataNaikKelas = HistoryKelas::create(
                            [
                                'ID_KELAS' => $dataKelasMurid->ID_KELAS,
                                'ID_SEMESTER' => $dataSemesterBaru->ID_SEMESTER,
                                'NIS' => $value->NIS
                            ]
                        );
                    } else {
                        Murid::where('NIS', $value->NIS)->update(['STATUS_AKTIF' => 0]);
                    }
                    //ubah status naik true
                    $value->STATUS_NAIK = 1;
                    $value->save();
                } else {
                    $dataKelasMurid = Kelas::where('TAHUN_ANGKATAN', (int)--$value->kelas->TAHUN_ANGKATAN)
                        ->where('ID_TAHUN_AJARAN', $dataTahunAjaranBaru->ID_TAHUN_AJARAN)
                        ->select('ID_KELAS')
                        ->first();

                    $dataNaikKelas = HistoryKelas::create(
                        [
                            'ID_KELAS' => $dataKelasMurid->ID_KELAS,
                            'ID_SEMESTER' => $dataSemesterBaru->ID_SEMESTER,
                            'NIS' => $value->NIS
                        ]
                    );
                    $value->STATUS_NAIK = 0;
                    $value->save();
                }
            }
            $updateTahunAjaranLama = TahunAjaran::where('ID_TAHUN_AJARAN', $dataTahunAjaranLama->ID_TAHUN_AJARAN)
                ->update(['STATUS' => 0]);

            $updateSemesterLama = Semester::where('ID_SEMESTER', $dataSemesterLama->ID_SEMESTER)
                ->update(['STATUS' => 0]);

            $updateTahunAjaranBaru = TahunAjaran::where('ID_TAHUN_AJARAN', $dataTahunAjaranBaru->ID_TAHUN_AJARAN)
                ->update(['STATUS' => 1]);

            $updateSemesterBaru = Semester::where('ID_SEMESTER', $dataSemesterBaru->ID_SEMESTER)
                ->update(['STATUS' => 1]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        Flash::success('Kenaikan kelas semester sukses.');
        return redirect()->route('index-kenaikan-kelas');
    }
}
