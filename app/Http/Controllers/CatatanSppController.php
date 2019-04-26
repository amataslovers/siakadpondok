<?php

namespace App\Http\Controllers;

use App\DataTables\CatatanSppDataTable;
use App\Http\Requests\CreateCatatanSppRequest;
use App\Http\Requests\UpdateCatatanSppRequest;
use App\Repositories\CatatanSppRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\HistoryKelas;
use App\Models\CatatanSpp;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CatatanSppController extends AppBaseController
{
    /** @var  CatatanSppRepository */
    private $catatanSppRepository;

    public function __construct(CatatanSppRepository $catatanSppRepo)
    {
        $this->catatanSppRepository = $catatanSppRepo;
        $this->middleware('permission:catatan-spp-view');
        $this->middleware('permission:catatan-spp-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:catatan-spp-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:catatan-spp-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the CatatanSpp.
     *
     * @param CatatanSppDataTable $catatanSppDataTable
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $catatanSpp = $this->catatanSppRepository
                ->with([
                    'historyKelas.murid:NIS,NAMA',
                    'historyKelas.kelas:ID_KELAS,ID_TINGKAT,NAMA',
                    'historyKelas.kelas.tingkat:ID_TINGKAT,TINGKAT',
                    'historyKelas.semester:ID_SEMESTER,ID_TAHUN_AJARAN,SEMESTER',
                    'historyKelas.semester.tahunAjaran:ID_TAHUN_AJARAN,NAMA'
                ])
                ->all();
            return DataTables::of($catatanSpp)
                ->addColumn('action', 'catatan_spps.datatables_actions')
                ->addIndexColumn()
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
                ->editColumn('TANGGAL_BAYAR', function ($pelanggaranMurid) {
                    return $pelanggaranMurid->TANGGAL_BAYAR;
                })
                ->editColumn('BULAN', function ($pelanggaranMurid) {
                    setlocale(LC_TIME, 'IND');
                    return \Carbon\Carbon::createFromFormat('m', $pelanggaranMurid->BULAN)->localeMonth;
                })
                ->make();
        }
        return view('catatan_spps.index');
    }

    /**
     * Show the form for creating a new CatatanSpp.
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
            ->pluck('full_name_spp', 'ID_HISTORY_KELAS');
        return view('catatan_spps.create')->with(compact('murid'));
    }

    /**
     * Store a newly created CatatanSpp in storage.
     *
     * @param CreateCatatanSppRequest $request
     *
     * @return Response
     */
    public function store(CreateCatatanSppRequest $request)
    {
        $input = $request->all();

        $kelasMurid = HistoryKelas::where(['ID_HISTORY_KELAS' => $input['ID_HISTORY_KELAS']])
            ->with('kelas.tingkat')->first();
        $historyKelasMurid = HistoryKelas::where(['NIS' => $kelasMurid->NIS, 'ID_KELAS' => $kelasMurid->ID_KELAS])->pluck('ID_HISTORY_KELAS');
        $cekBayar = CatatanSpp::where(['BULAN' => $input['BULAN']])
            ->whereIn('ID_HISTORY_KELAS', $historyKelasMurid)
            ->with(['historyKelas.murid:NIS,NAMA'])->get();
        if ($cekBayar->isNotEmpty()) {
            Flash::error('Gagal menyimpan karena murid : ' . $cekBayar->first()->historyKelas->murid->NAMA  . ' kelas ' . $kelasMurid->kelas->tingkat->TINGKAT . ' pada bulan ' . $input['BULAN'] . ' sudah tercatat membayar.');
            return redirect(route('catatanSpps.index'));
        }

        $catatanSpp = $this->catatanSppRepository->create($input);

        Flash::success('Catatan Spp Murid saved successfully.');

        return redirect(route('catatanSpps.index'));
    }

    /**
     * Display the specified CatatanSpp.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catatanSpp = $this->catatanSppRepository->findWithoutFail($id);

        if (empty($catatanSpp)) {
            Flash::error('Catatan Spp not found');

            return redirect(route('catatanSpps.index'));
        }

        return view('catatan_spps.show')->with('catatanSpp', $catatanSpp);
    }

    /**
     * Show the form for editing the specified CatatanSpp.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catatanSpp = $this->catatanSppRepository->findWithoutFail($id);

        if (empty($catatanSpp)) {
            Flash::error('Catatan Spp not found');

            return redirect(route('catatanSpps.index'));
        }

        $murid = HistoryKelas::orderByDesc('created_at')
            ->whereHas('murid', function ($q) {
                $q->where('STATUS_AKTIF', 1);
            })
            ->get()
            ->pluck('full_name_spp', 'ID_HISTORY_KELAS');
        return view('catatan_spps.edit')->with(compact('catatanSpp', 'murid'));
    }

    /**
     * Update the specified CatatanSpp in storage.
     *
     * @param  int              $id
     * @param UpdateCatatanSppRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCatatanSppRequest $request)
    {
        $catatanSpp = $this->catatanSppRepository->findWithoutFail($id);

        if (empty($catatanSpp)) {
            Flash::error('Catatan Spp not found');

            return redirect(route('catatanSpps.index'));
        }

        $catatanSpp = $this->catatanSppRepository->update($request->all(), $id);

        Flash::success('Catatan Spp updated successfully.');

        return redirect(route('catatanSpps.index'));
    }

    /**
     * Remove the specified CatatanSpp from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catatanSpp = $this->catatanSppRepository->findWithoutFail($id);

        if (empty($catatanSpp)) {
            Flash::error('Catatan Spp not found');

            return redirect(route('catatanSpps.index'));
        }

        $this->catatanSppRepository->delete($id);

        Flash::success('Catatan Spp deleted successfully.');

        return redirect(route('catatanSpps.index'));
    }
}
