<?php

namespace App\Http\Controllers;

use App\DataTables\NilaiAkademikDataTable;
use App\Http\Requests\CreateNilaiAkademikRequest;
use App\Http\Requests\UpdateNilaiAkademikRequest;
use App\Repositories\NilaiAkademikRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Guru;
use App\Models\MataPelajaran;
use App\Models\Semester;
use App\Models\Kelas;
use App\Models\Pengampu;
use App\Models\Murid;
use App\Models\HistoryKelas;
use DB;
use App\Models\NilaiAkademik;

class NilaiAkademikController extends AppBaseController
{
    /** @var  NilaiAkademikRepository */
    private $nilaiAkademikRepository;

    public function __construct(NilaiAkademikRepository $nilaiAkademikRepo)
    {
        $this->nilaiAkademikRepository = $nilaiAkademikRepo;
    }

    /**
     * Display a listing of the NilaiAkademik.
     *
     * @param NilaiAkademikDataTable $nilaiAkademikDataTable
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $nilai = $this->nilaiAkademikRepository->all();
            $nilai = NilaiAkademik::with([
                    'murid:NIS,NAMA',
                    'pengampu.mataPelajaran:ID_MATA_PELAJARAN,NAMA',
                    'pengampu.kelas.tingkat:ID_TINGKAT,TINGKAT',
                    'semester:ID_SEMESTER,SEMESTER'
                ])->get();
            return DataTables::of($nilai)
                ->addColumn('action', 'nilai_akademiks.datatables_actions')
                ->addIndexColumn()
                ->make();
        }

        $mapel = MataPelajaran::all()->pluck('kode_nama', 'ID_MATA_PELAJARAN');
        $guru = Guru::all()->pluck('nama_lengkap', 'NIP_GURU');
        $semester = Semester::all()->pluck('nama_lengkap', 'ID_SEMESTER');
        $kelas = Kelas::all()->pluck('nama_lengkap', 'ID_KELAS');
        return view('nilai_akademiks.index')->with(compact('mapel', 'guru', 'semester', 'kelas'));
    }

    /**
     * Show the form for creating a new NilaiAkademik.
     *
     * @return Response
     */
    public function create()
    {
        return view('nilai_akademiks.create');
    }

    /**
     * Buat form nilai sesuai yang diinginkan
     *
     * @return Response
     */
    public function formNilai(Request $request)
    {
        $cat = $request->get('CAT');
        $semester = Semester::find($request->get('ID_SEMESTER'));
        $detail = Pengampu::with(['mataPelajaran', 'guru', 'kelas', 'tahunAjaran'])->where([
                                ['ID_MATA_PELAJARAN', $request->get('ID_MATA_PELAJARAN')],
                                ['NIP_GURU', $request->get('NIP_GURU')],
                                ['ID_TAHUN_AJARAN', $semester->tahunAjaran->ID_TAHUN_AJARAN],
                                ['ID_KELAS', $request->get('ID_KELAS')]
                            ])->first();
        if (empty($detail)) {
            Flash::error('Maaf, data tidak cocok');
            return redirect(route('nilaiAkademiks.index'));
        }
        $murid = Murid::whereIn('NIS', 
                                HistoryKelas::where([
                                                    ['ID_KELAS', $request->get('ID_KELAS')],
                                                    ['ID_SEMESTER', $semester->ID_SEMESTER]
                                                    ]
                                                    )->select('NIS')
                                )->select('NIS', 'NAMA')->get();
        $idMurid = collect($murid);
        
        if ($cat == 1) {
            $nilai = NilaiAkademik::where([
                                        ['ID_PENGAMPU', $detail->ID_PENGAMPU],
                                        ['ID_SEMESTER', $semester->ID_SEMESTER]
                                    ])
                                    ->whereNotNull('NILAI_UTS')
                                    ->whereIn('NIS', $idMurid->pluck('NIS'))
                                    ->get();
            if(!$nilai->isEmpty())
            {
                Flash::error('Maaf, data nilai UTS sudah tersedia');
                return redirect(route('nilaiAkademiks.index'));
            }
        }
        if ($cat == 2) {
            $nilai = NilaiAkademik::where([
                                        ['ID_PENGAMPU', $detail->ID_PENGAMPU],
                                        ['ID_SEMESTER', $semester->ID_SEMESTER]
                                    ])
                                    ->whereNotNull('NILAI_UTS')
                                    ->whereIn('NIS', $idMurid->pluck('NIS'))
                                    ->get();
            if(!$nilai->isEmpty())
            {
                $hasil = NilaiAkademik::where([
                                        ['ID_PENGAMPU', $detail->ID_PENGAMPU],
                                        ['ID_SEMESTER', $semester->ID_SEMESTER]
                                    ])
                                    ->whereNull('NILAI_UAS')
                                    ->whereIn('NIS', $idMurid->pluck('NIS'))
                                    ->get();
                if ($hasil->isEmpty()) {
                    Flash::error('Maaf, data nilai UAS sudah tersedia');
                    return redirect(route('nilaiAkademiks.index'));
                }
            }else{
                Flash::error('Maaf, data nilai UTS belum diinputkan');
                return redirect(route('nilaiAkademiks.index'));
            }
        }
        if ($cat == 3) {
            $nilai = NilaiAkademik::where([
                                ['ID_PENGAMPU', $detail->ID_PENGAMPU],
                                ['ID_SEMESTER', $semester->ID_SEMESTER]
                            ])
                            ->whereNotNull('NILAI_UTS')
                            ->whereIn('NIS', $idMurid->pluck('NIS'))
                            ->get();
            if(!$nilai->isEmpty())
            {
                Flash::error('Maaf, data nilai UTS - UAS sudah tersedia');
                return redirect(route('nilaiAkademiks.index'));
            }
        }
        return view('nilai_akademiks.create')->with(compact('detail', 'murid', 'cat', 'semester'));
    }

    /**
     * Store a newly created NilaiAkademik in storage.
     *
     * @param CreateNilaiAkademikRequest $request
     *
     * @return Response
     */
    public function store(CreateNilaiAkademikRequest $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $cat = $request->get('CAT');
            // dd();
            //inputberdasarkan cat
            
            if ($cat == 1) {
                if(isset($input['NIS'], $input['NAMA'], $input['NILAI_UTS']))
                {
                    foreach ($input['NIS'] as $key => $value) {
                        NilaiAkademik::updateOrCreate(
                            [
                                'ID_PENGAMPU' => $input['ID_PENGAMPU'],
                                'ID_SEMESTER' => $input['ID_SEMESTER'],
                                'NIS' => $input['NIS'][$key]
                            ],
                            [
                                'NILAI_UTS' => $input['NILAI_UTS'][$key]
                            ]
                        );
                    }
                }
            } else if ($cat == 2) {
                if(isset($input['NIS'], $input['NAMA'], $input['NILAI_UAS']))
                {
                    foreach ($input['NIS'] as $key => $value) {
                        NilaiAkademik::updateOrCreate(
                            [
                                'ID_PENGAMPU' => $input['ID_PENGAMPU'],
                                'NIS' => $input['NIS'][$key],
                                'ID_SEMESTER' => $input['ID_SEMESTER']
                            ],
                            [
                                'NILAI_UAS' => $input['NILAI_UAS'][$key]
                            ]
                        );
                    }
                }
            } else if ($cat == 3) {
                if(isset($input['NIS'], $input['NAMA'], $input['NILAI_UTS'], $input['NILAI_UAS']))
                {
                    foreach ($input['NIS'] as $key => $value) {
                        NilaiAkademik::updateOrCreate(
                            [
                                'ID_PENGAMPU' => $input['ID_PENGAMPU'],
                                'NIS' => $input['NIS'][$key],
                                'ID_SEMESTER' => $input['ID_SEMESTER']
                            ],
                            [
                                'NILAI_UTS' => $input['NILAI_UTS'][$key],
                                'NILAI_UAS' => $input['NILAI_UAS'][$key]
                            ]
                        );
                    }
                }
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        Flash::success('Nilai Akademik saved successfully.');

        return redirect(route('nilaiAkademiks.index'));
    }

    /**
     * Display the specified NilaiAkademik.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nilaiAkademik = $this->nilaiAkademikRepository->findWithoutFail($id);

        if (empty($nilaiAkademik)) {
            Flash::error('Nilai Akademik not found');

            return redirect(route('nilaiAkademiks.index'));
        }

        return view('nilai_akademiks.show')->with('nilaiAkademik', $nilaiAkademik);
    }

    /**
     * Show the form for editing the specified NilaiAkademik.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nilaiAkademik = $this->nilaiAkademikRepository->findWithoutFail($id);

        if (empty($nilaiAkademik)) {
            Flash::error('Nilai Akademik not found');

            return redirect(route('nilaiAkademiks.index'));
        }

        return view('nilai_akademiks.edit')->with('nilaiAkademik', $nilaiAkademik);
    }

    /**
     * Update the specified NilaiAkademik in storage.
     *
     * @param  int              $id
     * @param UpdateNilaiAkademikRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNilaiAkademikRequest $request)
    {
        $nilaiAkademik = $this->nilaiAkademikRepository->findWithoutFail($id);

        if (empty($nilaiAkademik)) {
            Flash::error('Nilai Akademik not found');

            return redirect(route('nilaiAkademiks.index'));
        }

        $nilaiAkademik = $this->nilaiAkademikRepository->update($request->all(), $id);

        Flash::success('Nilai Akademik updated successfully.');

        return redirect(route('nilaiAkademiks.index'));
    }

    /**
     * Remove the specified NilaiAkademik from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nilaiAkademik = $this->nilaiAkademikRepository->findWithoutFail($id);

        if (empty($nilaiAkademik)) {
            Flash::error('Nilai Akademik not found');

            return redirect(route('nilaiAkademiks.index'));
        }

        $this->nilaiAkademikRepository->delete($id);

        Flash::success('Nilai Akademik deleted successfully.');

        return redirect(route('nilaiAkademiks.index'));
    }
}
