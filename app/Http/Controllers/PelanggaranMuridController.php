<?php

namespace App\Http\Controllers;

use App\DataTables\PelanggaranMuridDataTable;
use App\Http\Requests\CreatePelanggaranMuridRequest;
use App\Http\Requests\UpdatePelanggaranMuridRequest;
use App\Repositories\PelanggaranMuridRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Sanksi;
use App\Models\Peraturan;
use App\Models\HistoryKelas;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use App\Models\PelanggaranMurid;

class PelanggaranMuridController extends AppBaseController
{
    /** @var  PelanggaranMuridRepository */
    private $pelanggaranMuridRepository;

    public function __construct(PelanggaranMuridRepository $pelanggaranMuridRepo)
    {
        $this->pelanggaranMuridRepository = $pelanggaranMuridRepo;
        $this->middleware('permission:pelanggaran-murid-view');
        $this->middleware('permission:pelanggaran-murid-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:pelanggaran-murid-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:pelanggaran-murid-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the PelanggaranMurid.
     *
     * @param PelanggaranMuridDataTable $pelanggaranMuridDataTable
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $pelanggaranMurid = PelanggaranMurid::with([
                'historyKelas.murid:NIS,NAMA',
                'historyKelas.kelas:ID_KELAS,ID_TINGKAT,NAMA,TAHUN_ANGKATAN',
                'historyKelas.kelas.tingkat:ID_TINGKAT,TINGKAT',
                'historyKelas.semester:ID_SEMESTER,ID_TAHUN_AJARAN,SEMESTER',
                'historyKelas.semester.tahunAjaran:ID_TAHUN_AJARAN,NAMA',
                'peraturan:ID_PERATURAN,ID_SANKSI,NAMA_PERATURAN',
                'peraturan.sanksi:ID_SANKSI,NAMA_SANKSI'
            ])
                ->when(auth()->user()->hasRole('murid'), function ($q) {
                    $q->whereHas('historyKelas', function ($query) {
                        $query->where('NIS', auth()->user()->name);
                    });
                })
                ->orderBy('created_at', 'desc')
                ->get();
            return DataTables::of($pelanggaranMurid)
                ->addIndexColumn()
                ->addColumn('action', 'pelanggaran_murids.datatables_actions')
                ->addColumn('nisMurid', function ($pelanggaranMurid) {
                    return $pelanggaranMurid->historyKelas->murid->NIS;
                })
                ->addColumn('namaMurid', function ($pelanggaranMurid) {
                    return $pelanggaranMurid->historyKelas->murid->NAMA;
                })
                ->addColumn('namaKelas', function ($pelanggaranMurid) {
                    return $pelanggaranMurid->historyKelas->kelas->tingkat->TINGKAT . ' ' . $pelanggaranMurid->historyKelas->kelas->NAMA;
                })
                ->addColumn('semester', function ($pelanggaranMurid) {
                    return $pelanggaranMurid->historyKelas->semester->SEMESTER . ' - ' . $pelanggaranMurid->historyKelas->semester->tahunAjaran->NAMA;
                })
                ->editColumn('TANGGAL_MELANGGAR', function ($pelanggaranMurid) {
                    return $pelanggaranMurid->TANGGAL_MELANGGAR;
                })
                ->make();
        }
        return view('pelanggaran_murids.index');
    }

    /**
     * Show the form for creating a new PelanggaranMurid.
     *
     * @return Response
     */
    public function create()
    {
        $sanksi = Sanksi::pluck('NAMA_SANKSI', 'ID_SANKSI');
        $murid = HistoryKelas::orderByDesc('created_at')
            ->whereHas('murid', function ($q) {
                $q->where('STATUS_AKTIF', 1);
            })
            ->get()
            ->pluck('full_name', 'ID_HISTORY_KELAS');
        return view('pelanggaran_murids.create')->with(compact('sanksi', 'murid'));
    }

    /**
     * Store a newly created PelanggaranMurid in storage.
     *
     * @param CreatePelanggaranMuridRequest $request
     *
     * @return Response
     */
    public function store(CreatePelanggaranMuridRequest $request)
    {
        $input = $request->all();

        $tglNow = Carbon::now();
        $tglLast = Carbon::now()->addMonthNoOverflow(-1);
        $cekPelanggaran = PelanggaranMurid::where([
            'ID_HISTORY_KELAS' => $input['ID_HISTORY_KELAS'],
            'ID_PERATURAN' => $input['ID_PERATURAN']
        ])
            ->whereBetween('TANGGAL_MELANGGAR', [$tglLast, $tglNow])
            ->first();
        if (!empty($cekPelanggaran)) {
            Flash::error('Pelanggaran Murid gagal tersimpan karena murid mempunyai pelanggaran yang sama dalam 1 bulan terakhir.');
            return back()->withInput();
        }

        $pelanggaranMurid = $this->pelanggaranMuridRepository->create($input);

        Flash::success('Pelanggaran Murid saved successfully.');

        return redirect(route('pelanggaranMurids.index'));
    }

    /**
     * Display the specified PelanggaranMurid.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pelanggaranMurid = $this->pelanggaranMuridRepository->findWithoutFail($id);

        if (empty($pelanggaranMurid)) {
            Flash::error('Pelanggaran Murid not found');

            return redirect(route('pelanggaranMurids.index'));
        }

        return view('pelanggaran_murids.show')->with('pelanggaranMurid', $pelanggaranMurid);
    }

    /**
     * Show the form for editing the specified PelanggaranMurid.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pelanggaranMurid = $this->pelanggaranMuridRepository->findWithoutFail($id);

        if (empty($pelanggaranMurid)) {
            Flash::error('Pelanggaran Murid not found');

            return redirect(route('pelanggaranMurids.index'));
        }
        $sanksi = Sanksi::pluck('NAMA_SANKSI', 'ID_SANKSI');
        $murid = HistoryKelas::orderByDesc('created_at')
            ->whereHas('murid', function ($q) {
                $q->where('STATUS_AKTIF', 1);
            })
            ->get()
            ->pluck('full_name', 'ID_HISTORY_KELAS');
        return view('pelanggaran_murids.edit')->with(['pelanggaranMurid' => $pelanggaranMurid, 'sanksi' => $sanksi, 'murid' => $murid]);
    }

    /**
     * Update the specified PelanggaranMurid in storage.
     *
     * @param  int              $id
     * @param UpdatePelanggaranMuridRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePelanggaranMuridRequest $request)
    {
        $pelanggaranMurid = $this->pelanggaranMuridRepository->findWithoutFail($id);

        if (empty($pelanggaranMurid)) {
            Flash::error('Pelanggaran Murid not found');

            return redirect(route('pelanggaranMurids.index'));
        }

        $pelanggaranMurid = $this->pelanggaranMuridRepository->update($request->all(), $id);

        Flash::success('Pelanggaran Murid updated successfully.');

        return redirect(route('pelanggaranMurids.index'));
    }

    /**
     * Remove the specified PelanggaranMurid from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pelanggaranMurid = $this->pelanggaranMuridRepository->findWithoutFail($id);

        if (empty($pelanggaranMurid)) {
            Flash::error('Pelanggaran Murid not found');

            return redirect(route('pelanggaranMurids.index'));
        }

        $this->pelanggaranMuridRepository->delete($id);

        Flash::success('Pelanggaran Murid deleted successfully.');

        return redirect(route('pelanggaranMurids.index'));
    }

    public function getPeraturanByIdSanksi($id)
    {
        $peraturan = Peraturan::where('ID_SANKSI', $id)->get();
        return $peraturan;
    }

    public function getInfoPelanggaranMurid($id)
    {
        $tglNow = Carbon::now();
        $tglLast = Carbon::now()->addMonthNoOverflow(-1);
        $pelanggaran = PelanggaranMurid::whereBetween('TANGGAL_MELANGGAR', [$tglLast, $tglNow])
            ->with('historyKelas.murid:NIS,NAMA', 'peraturan.sanksi')
            ->where('ID_HISTORY_KELAS', $id)
            ->get();
        return response()->json($pelanggaran);
    }
}
