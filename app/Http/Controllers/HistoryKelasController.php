<?php

namespace App\Http\Controllers;

use App\DataTables\HistoryKelasDataTable;
use App\Http\Requests\CreateHistoryKelasRequest;
use App\Http\Requests\UpdateHistoryKelasRequest;
use App\Repositories\HistoryKelasRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\HistoryKelas;
use App\Models\Kelas;
use App\Models\Semester;

class HistoryKelasController extends AppBaseController
{
    /** @var  HistoryKelasRepository */
    private $historyKelasRepository;

    public function __construct(HistoryKelasRepository $historyKelasRepo)
    {
        $this->historyKelasRepository = $historyKelasRepo;
        $this->middleware('permission:history-kelas-view');
        $this->middleware('permission:history-kelas-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:history-kelas-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:history-kelas-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the HistoryKelas.
     *
     * @param HistoryKelasDataTable $historyKelasDataTable
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $historyKelas = $this->historyKelasRepository
                ->with([
                    'murid:NIS,NAMA',
                    'kelas:ID_KELAS,ID_TINGKAT,NAMA,TAHUN_ANGKATAN',
                    'kelas.tingkat:ID_TINGKAT,TINGKAT',
                    'semester:ID_SEMESTER,ID_TAHUN_AJARAN,SEMESTER',
                    'semester.tahunAjaran:ID_TAHUN_AJARAN,NAMA'
                ])
                ->all();
            return DataTables::of($historyKelas)
                ->addColumn('action', 'history_kelas.datatables_actions')
                ->addIndexColumn()
                ->addColumn('namaKelas', function ($historyKelas) {
                    return $historyKelas->kelas->tingkat->TINGKAT . ' ' . $historyKelas->kelas->NAMA;
                })
                ->make();
        }
        return view('history_kelas.index');
    }

    /**
     * Show the form for creating a new HistoryKelas.
     *
     * @return Response
     */
    public function create()
    {
        return view('history_kelas.create');
    }

    /**
     * Store a newly created HistoryKelas in storage.
     *
     * @param CreateHistoryKelasRequest $request
     *
     * @return Response
     */
    public function store(CreateHistoryKelasRequest $request)
    {
        $input = $request->all();

        $historyKelas = $this->historyKelasRepository->create($input);

        Flash::success('History Kelas saved successfully.');

        return redirect(route('historyKelas.index'));
    }

    /**
     * Display the specified HistoryKelas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $historyKelas = $this->historyKelasRepository->findWithoutFail($id);

        if (empty($historyKelas)) {
            Flash::error('History Kelas not found');

            return redirect(route('historyKelas.index'));
        }

        return view('history_kelas.show')->with('historyKelas', $historyKelas);
    }

    /**
     * Show the form for editing the specified HistoryKelas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $historyKelas = $this->historyKelasRepository->findWithoutFail($id);

        if (empty($historyKelas)) {
            Flash::error('History Kelas not found');

            return redirect(route('historyKelas.index'));
        }
        $kelas = Kelas::orderBy('created_at', 'desc')->get()->pluck('nama_lengkap', 'ID_KELAS');
        $semester = Semester::orderBy('created_at', 'desc')->get()->pluck('nama_lengkap', 'ID_SEMESTER');

        return view('history_kelas.edit')->with(compact('historyKelas', 'kelas', 'semester'));
    }

    /**
     * Update the specified HistoryKelas in storage.
     *
     * @param  int              $id
     * @param UpdateHistoryKelasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHistoryKelasRequest $request)
    {
        $historyKelas = $this->historyKelasRepository->findWithoutFail($id);

        if (empty($historyKelas)) {
            Flash::error('History Kelas not found');

            return redirect(route('historyKelas.index'));
        }

        $historyKelas = $this->historyKelasRepository->update($request->all(), $id);

        Flash::success('History Kelas updated successfully.');

        return redirect(route('historyKelas.index'));
    }

    /**
     * Remove the specified HistoryKelas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $historyKelas = $this->historyKelasRepository->findWithoutFail($id);

        if (empty($historyKelas)) {
            Flash::error('History Kelas not found');

            return redirect(route('historyKelas.index'));
        }

        $this->historyKelasRepository->delete($id);

        Flash::success('History Kelas deleted successfully.');

        return redirect(route('historyKelas.index'));
    }
}
