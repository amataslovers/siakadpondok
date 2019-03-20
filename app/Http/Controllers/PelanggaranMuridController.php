<?php

namespace App\Http\Controllers;

use App\DataTables\PelanggaranMuridDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePelanggaranMuridRequest;
use App\Http\Requests\UpdatePelanggaranMuridRequest;
use App\Repositories\PelanggaranMuridRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Sanksi;
use App\Models\Peraturan;
use App\Models\HistoryKelas;

class PelanggaranMuridController extends AppBaseController
{
    /** @var  PelanggaranMuridRepository */
    private $pelanggaranMuridRepository;

    public function __construct(PelanggaranMuridRepository $pelanggaranMuridRepo)
    {
        $this->pelanggaranMuridRepository = $pelanggaranMuridRepo;
    }

    /**
     * Display a listing of the PelanggaranMurid.
     *
     * @param PelanggaranMuridDataTable $pelanggaranMuridDataTable
     * @return Response
     */
    public function index(PelanggaranMuridDataTable $pelanggaranMuridDataTable)
    {
        return $pelanggaranMuridDataTable->render('pelanggaran_murids.index');
    }

    /**
     * Show the form for creating a new PelanggaranMurid.
     *
     * @return Response
     */
    public function create()
    {
        $sanksi = Sanksi::pluck('NAMA_SANKSI', 'ID_SANKSI');
        $murid = HistoryKelas::all()->pluck('full_name', 'ID_HISTORY_KELAS');
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
        $murid = HistoryKelas::all()->pluck('full_name', 'ID_HISTORY_KELAS');
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
}
