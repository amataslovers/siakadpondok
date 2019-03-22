<?php

namespace App\Http\Controllers;

use App\DataTables\NilaiKarakterDataTable;
use App\Http\Requests\CreateNilaiKarakterRequest;
use App\Http\Requests\UpdateNilaiKarakterRequest;
use App\Repositories\NilaiKarakterRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;
use App\Models\Semester;
use App\Models\Kelas;
use Yajra\DataTables\DataTables;
use App\Models\HistoryKelas;
use App\Models\Sanksi;
use Illuminate\Support\Facades\DB;
use App\Models\NilaiKarakter;

class NilaiKarakterController extends AppBaseController
{
    /** @var  NilaiKarakterRepository */
    private $nilaiKarakterRepository;

    public function __construct(NilaiKarakterRepository $nilaiKarakterRepo)
    {
        $this->nilaiKarakterRepository = $nilaiKarakterRepo;
    }

    /**
     * Display a listing of the NilaiKarakter.
     *
     * @param NilaiKarakterDataTable $nilaiKarakterDataTable
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $nilai = $this->nilaiKarakterRepository->all();
            return DataTables::of($nilai)
                ->addColumn('action', 'nilai_karakters.datatables_actions')
                ->make();
        }

        $semester = Semester::all()->pluck('nama_lengkap', 'ID_SEMESTER');
        $kelas = Kelas::all()->pluck('nama_lengkap', 'ID_KELAS');
        return view('nilai_karakters.index')->with(compact('semester', 'kelas'));
    }

    /**
     * Show the form for creating a new NilaiKarakter.
     *
     * @return Response
     */
    public function create()
    {
        return view('nilai_karakters.create');
    }

    public function formNilai(Request $request)
    {
        $cekHistoryKelas = HistoryKelas::with(['pelanggaranMurid.peraturan.sanksi', 'murid:NIS,NAMA'])->where([
            ['ID_KELAS', $request->get('ID_KELAS')],
            ['ID_SEMESTER', $request->get('ID_SEMESTER')]
        ])->get();

        $cekNilaiKarakter = NilaiKarakter::whereIn('ID_HISTORY_KELAS', $cekHistoryKelas->pluck('ID_HISTORY_KELAS'))->get();

        if (!$cekNilaiKarakter->isEmpty()) {
            Flash::success('Nilai Karakter sudah terisi.');
            return redirect(route('nilaiKarakters.index'));
        }

        return view('nilai_karakters.create')->with(['history' => $cekHistoryKelas]);
    }


    /**
     * Store a newly created NilaiKarakter in storage.
     *
     * @param CreateNilaiKarakterRequest $request
     *
     * @return Response
     */
    public function store(CreateNilaiKarakterRequest $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        try {
            foreach ($input['_ID_HISTORY_KELAS'] as $key => $value) {
                NilaiKarakter::updateOrCreate(
                    [
                        'ID_HISTORY_KELAS' => $input['_ID_HISTORY_KELAS'][$key],
                    ],
                    [
                        'IJIN' => $input['_IJIN'][$key],
                        'SAKIT' => $input['_SAKIT'][$key],
                        'ALFA' => $input['_ALFA'][$key],
                        'AKHLAQ' => $input['_AKHLAQ'][$key],
                        'KEBERSIHAN' => $input['_KEBERSIHAN'][$key],
                        'KERAJINAN' => $input['_KERAJINAN'][$key],
                        'KETEKUNAN' => $input['_KETEKUNAN'][$key]
                    ]
                );
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        Flash::success('Nilai Karakter saved successfully.');

        return redirect(route('nilaiKarakters.index'));
    }

    /**
     * Display the specified NilaiKarakter.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nilaiKarakter = $this->nilaiKarakterRepository->findWithoutFail($id);

        if (empty($nilaiKarakter)) {
            Flash::error('Nilai Karakter not found');

            return redirect(route('nilaiKarakters.index'));
        }

        return view('nilai_karakters.show')->with('nilaiKarakter', $nilaiKarakter);
    }

    /**
     * Show the form for editing the specified NilaiKarakter.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nilaiKarakter = $this->nilaiKarakterRepository->findWithoutFail($id);

        if (empty($nilaiKarakter)) {
            Flash::error('Nilai Karakter not found');

            return redirect(route('nilaiKarakters.index'));
        }

        return view('nilai_karakters.edit')->with('nilaiKarakter', $nilaiKarakter);
    }

    /**
     * Update the specified NilaiKarakter in storage.
     *
     * @param  int              $id
     * @param UpdateNilaiKarakterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNilaiKarakterRequest $request)
    {
        $nilaiKarakter = $this->nilaiKarakterRepository->findWithoutFail($id);

        if (empty($nilaiKarakter)) {
            Flash::error('Nilai Karakter not found');

            return redirect(route('nilaiKarakters.index'));
        }

        $nilaiKarakter = $this->nilaiKarakterRepository->update($request->all(), $id);

        Flash::success('Nilai Karakter updated successfully.');

        return redirect(route('nilaiKarakters.index'));
    }

    /**
     * Remove the specified NilaiKarakter from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nilaiKarakter = $this->nilaiKarakterRepository->findWithoutFail($id);

        if (empty($nilaiKarakter)) {
            Flash::error('Nilai Karakter not found');

            return redirect(route('nilaiKarakters.index'));
        }

        $this->nilaiKarakterRepository->delete($id);

        Flash::success('Nilai Karakter deleted successfully.');

        return redirect(route('nilaiKarakters.index'));
    }
}
