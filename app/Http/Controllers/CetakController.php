<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryKelas;
use Yajra\DataTables\DataTables;
use PDF;

class CetakController extends Controller
{
    public function lihatRapot(Request $request)
    {
        if ($request->ajax()) {
            $murid = HistoryKelas::has('nilaiAkademik')
                ->with([
                    'murid:NIS,NAMA',
                    'kelas.tingkat:ID_TINGKAT,TINGKAT',
                    'semester.tahunAjaran'
                ])
                ->get();
            return DataTables::of($murid)
                ->addIndexColumn()
                ->addColumn('action', 'cetak.rapot.datatables_actions')
                ->addColumn('namaKelas', function ($murid) {
                    return $murid->kelas->tingkat->TINGKAT . ' ' . $murid->kelas->NAMA;
                })
                ->addColumn('namaSemester', function ($murid) {
                    return $murid->semester->SEMESTER . ' - ' . $murid->semester->tahunAjaran->NAMA;
                })
                ->make();
        }

        return view('cetak.rapot.index');
    }

    public function downloadRapot($id)
    {
        $murid = HistoryKelas::where('ID_HISTORY_KELAS', $id)
            ->with([
                'murid:NIS,NAMA',
                'kelas.tingkat',
                'semester.tahunAjaran',
                'nilaiAkademik.pengampu.mataPelajaran',
                'nilaiKarakter'
            ])->first();

        if (empty($murid)) {
            Flash::error('Rapot tidak ditemukan');

            return view('cetak.rapot.index');
        }

        // ranking murid
        $allMurid = HistoryKelas::where(['ID_KELAS' => $murid->kelas->ID_KELAS, 'ID_SEMESTER' => $murid->semester->ID_SEMESTER])
            ->with('nilaiAkademik')->get();

        $semuaTotalNilaiMurid = collect();
        foreach ($allMurid as $value) {
            $total = 0;
            foreach ($value->nilaiAkademik as $item) {
                $total += $item->NILAI_UAS;
            }
            $semuaTotalNilaiMurid->push(['murid' => $value->NIS, 'nilai' => $total]);
        }

        $semuaTotalNilaiMuridSorted = $semuaTotalNilaiMurid->sortByDesc('nilai')->values()->all();
        foreach ($semuaTotalNilaiMuridSorted as $key => $value) {
            if ($value['murid'] == $murid->NIS) {
                $rank = $key + 1;
            }
        }
        $totalMurid = $allMurid->count();

        //cek naik ato tidak
        // $semester = \App\Models\Semester::where('ID_TAHUN_AJARAN', $murid->semester->ID_TAHUN_AJARAN)->select('ID_SEMESTER')->pluck('ID_SEMESTER');
        // $dataMuridKelas = HistoryKelas::where(['NIS' => $murid->NIS])
        //     ->whereIn('ID_SEMESTER', $semester)->get();

        // return response()->json($dataMuridKelas);


        $pdf = PDF::loadView('cetak.rapot.templateRapot', compact('murid', 'rank', 'totalMurid'))->setPaper('legal', 'portrait');
        return $pdf->stream();
    }


    public function lihatIjazah(Request $request)
    {
        if ($request->ajax()) {
            $murid = HistoryKelas::has('nilaiAkademik')
                ->whereHas('kelas.tingkat', function ($q) {
                    $q->whereIn('KODE_LULUS', [1, 2, 3]);
                })
                ->where('STATUS_NAIK', 1)
                ->with([
                    'murid:NIS,NAMA',
                    'kelas.tingkat',
                    'semester.tahunAjaran'
                ])
                ->get();
            return DataTables::of($murid)
                ->addIndexColumn()
                ->addColumn('action', 'cetak.ijazah.datatables_actions')
                ->addColumn('ijazah', function ($murid) {
                    if ($murid->kelas->tingkat->KODE_LULUS == 1) {
                        return '<span class="label label-success"> Ibtidaiyah </span>';
                    } elseif ($murid->kelas->tingkat->KODE_LULUS == 2) {
                        return '<span class="label label-success"> Tsanawiyah </span>';
                    } elseif ($murid->kelas->tingkat->KODE_LULUS == 3) {
                        return '<span class="label label-success"> Aliyah </span>';
                    }
                })
                ->rawColumns(['ijazah', 'action'])
                ->make();
        }

        return view('cetak.ijazah.index');
    }

    public function downloadIjazah($id)
    {
        $murid = HistoryKelas::where('ID_HISTORY_KELAS', $id)
            ->with([
                'murid:NIS,NAMA,TANGGAL_LAHIR,TEMPAT_LAHIR',
                'kelas.tingkat',
                'semester.tahunAjaran',
                'nilaiAkademik.pengampu.mataPelajaran',
                'nilaiKarakter'
            ])->first();

        if (empty($murid)) {
            Flash::error('Ijazah tidak ditemukan');

            return view('cetak.ijazah.index');
        }

        // ranking murid
        $allMurid = HistoryKelas::where(['ID_KELAS' => $murid->kelas->ID_KELAS, 'ID_SEMESTER' => $murid->semester->ID_SEMESTER])
            ->with('nilaiAkademik')->get();

        $semuaTotalNilaiMurid = collect();
        foreach ($allMurid as $value) {
            $total = 0;
            foreach ($value->nilaiAkademik as $item) {
                $total += $item->NILAI_UAS;
            }
            $semuaTotalNilaiMurid->push(['murid' => $value->NIS, 'nilai' => $total]);
        }

        $semuaTotalNilaiMuridSorted = $semuaTotalNilaiMurid->sortByDesc('nilai')->values()->all();
        foreach ($semuaTotalNilaiMuridSorted as $key => $value) {
            if ($value['murid'] == $murid->NIS) {
                $rank = $key + 1;
            }
        }
        $totalMurid = $allMurid->count();

        //cek naik ato tidak
        // $semester = \App\Models\Semester::where('ID_TAHUN_AJARAN', $murid->semester->ID_TAHUN_AJARAN)->select('ID_SEMESTER')->pluck('ID_SEMESTER');
        // $dataMuridKelas = HistoryKelas::where(['NIS' => $murid->NIS])
        //     ->whereIn('ID_SEMESTER', $semester)->get();

        // return response()->json($dataMuridKelas);

        if (empty($murid)) {
            Flash::error('Catatan Spp not found');

            return redirect(route('cetakRapotIndex'));
        }

        setlocale(LC_TIME, 'IND');
        \Carbon\Carbon::setLocale('IND');
        $tglLahir = \Carbon\Carbon::createFromFormat('d/m/Y', $murid->murid->TANGGAL_LAHIR)->formatLocalized('%d %B %Y');
        $pdf = PDF::loadView('cetak.ijazah.templateIjazah', compact('murid', 'rank', 'totalMurid', 'tglLahir'))
            ->setPaper('legal', 'portrait');
        return $pdf->stream();
    }
}
