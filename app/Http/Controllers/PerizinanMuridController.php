<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePerizinanMuridRequest;
use App\Http\Requests\UpdatePerizinanMuridRequest;
use App\Repositories\PerizinanMuridRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\HistoryKelas;
use Yajra\DataTables\DataTables;
use App\Models\PerizinanMurid;

class PerizinanMuridController extends AppBaseController
{
    /** @var  PerizinanMuridRepository */
    private $perizinanMuridRepository;

    public function __construct(PerizinanMuridRepository $perizinanMuridRepo)
    {
        $this->perizinanMuridRepository = $perizinanMuridRepo;
        $this->middleware('permission:perizinan-murid-view');
        $this->middleware('permission:perizinan-murid-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:perizinan-murid-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:perizinan-murid-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the PerizinanMurid.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $perizinanMurid = PerizinanMurid::with([
                'historyKelas.murid:NIS,NAMA',
                'historyKelas.kelas.tingkat:ID_TINGKAT,TINGKAT',
                'historyKelas.semester.tahunAjaran'
            ])
                ->when(auth()->user()->hasRole('murid'), function ($q) {
                    $q->whereHas('historyKelas', function ($query) {
                        $query->where('NIS', auth()->user()->name);
                    });
                })
                ->get();
            return DataTables::of($perizinanMurid)
                ->addIndexColumn()
                ->addColumn('action', 'perizinan_murids.datatables_actions')
                ->addColumn('nisMurid', function ($perizinanMurid) {
                    return $perizinanMurid->historyKelas->murid->NIS;
                })
                ->addColumn('namaMurid', function ($perizinanMurid) {
                    return $perizinanMurid->historyKelas->murid->NAMA;
                })
                ->addColumn('namaKelas', function ($perizinanMurid) {
                    return $perizinanMurid->historyKelas->kelas->tingkat->TINGKAT . ' ' . $perizinanMurid->historyKelas->kelas->NAMA;
                })
                ->addColumn('semester', function ($perizinanMurid) {
                    return $perizinanMurid->historyKelas->semester->SEMESTER . ' - ' . $perizinanMurid->historyKelas->semester->tahunAjaran->NAMA;
                })
                ->editColumn('TANGGAL', function ($perizinanMurid) {
                    return $perizinanMurid->TANGGAL;
                })
                ->make();
        }
        return view('perizinan_murids.index');
    }

    /**
     * Show the form for creating a new PerizinanMurid.
     *
     * @return Response
     */
    public function create()
    {
        $murid = HistoryKelas::orderByDesc('created_at')
            ->whereHas('murid', function ($q) {
                $q->where('STATUS_AKTIF', 1);
            })
            ->get()
            ->pluck('full_name', 'ID_HISTORY_KELAS');
        return view('perizinan_murids.create')->with(compact('murid'));
    }

    /**
     * Store a newly created PerizinanMurid in storage.
     *
     * @param CreatePerizinanMuridRequest $request
     *
     * @return Response
     */
    public function store(CreatePerizinanMuridRequest $request)
    {
        $input = $request->all();

        $perizinanMurid = $this->perizinanMuridRepository->create($input);

        Flash::success('Perizinan Murid saved successfully.');

        return redirect(route('perizinanMurids.index'));
    }

    /**
     * Display the specified PerizinanMurid.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $perizinanMurid = $this->perizinanMuridRepository->findWithoutFail($id);

        if (empty($perizinanMurid)) {
            Flash::error('Perizinan Murid not found');

            return redirect(route('perizinanMurids.index'));
        }

        return view('perizinan_murids.show')->with('perizinanMurid', $perizinanMurid);
    }

    /**
     * Show the form for editing the specified PerizinanMurid.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $perizinanMurid = $this->perizinanMuridRepository->findWithoutFail($id);

        if (empty($perizinanMurid)) {
            Flash::error('Perizinan Murid not found');

            return redirect(route('perizinanMurids.index'));
        }

        $murid = HistoryKelas::orderByDesc('created_at')
            ->whereHas('murid', function ($q) {
                $q->where('STATUS_AKTIF', 1);
            })
            ->get()
            ->pluck('full_name', 'ID_HISTORY_KELAS');
        return view('perizinan_murids.edit')->with(compact('murid', 'perizinanMurid'));
    }

    /**
     * Update the specified PerizinanMurid in storage.
     *
     * @param  int              $id
     * @param UpdatePerizinanMuridRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePerizinanMuridRequest $request)
    {
        $perizinanMurid = $this->perizinanMuridRepository->findWithoutFail($id);

        if (empty($perizinanMurid)) {
            Flash::error('Perizinan Murid not found');

            return redirect(route('perizinanMurids.index'));
        }

        $perizinanMurid = $this->perizinanMuridRepository->update($request->all(), $id);

        Flash::success('Perizinan Murid updated successfully.');

        return redirect(route('perizinanMurids.index'));
    }

    /**
     * Remove the specified PerizinanMurid from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $perizinanMurid = $this->perizinanMuridRepository->findWithoutFail($id);

        if (empty($perizinanMurid)) {
            Flash::error('Perizinan Murid not found');

            return redirect(route('perizinanMurids.index'));
        }

        $this->perizinanMuridRepository->delete($id);

        Flash::success('Perizinan Murid deleted successfully.');

        return redirect(route('perizinanMurids.index'));
    }
}
