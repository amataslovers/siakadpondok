<?php

namespace App\Http\Controllers;

use App\DataTables\DetailKeluargaDataTable;
use App\Http\Requests\CreateDetailKeluargaRequest;
use App\Http\Requests\UpdateDetailKeluargaRequest;
use App\Repositories\DetailKeluargaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DetailKeluargaController extends AppBaseController
{
    /** @var  DetailKeluargaRepository */
    private $detailKeluargaRepository;

    public function __construct(DetailKeluargaRepository $detailKeluargaRepo)
    {
        $this->detailKeluargaRepository = $detailKeluargaRepo;
    }

    /**
     * Display a listing of the DetailKeluarga.
     *
     * @param DetailKeluargaDataTable $detailKeluargaDataTable
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $detailKeluarga = $this->detailKeluargaRepository
                ->with([
                    'murid:NIS,NAMA',
                    'keluargaMurid:ID_KELUARGA_MURID,ID_JENIS_KELUARGA,NAMA',
                    'keluargaMurid.jenisKeluarga:ID_JENIS_KELUARGA,NAMA',
                ])
                ->all();
            return DataTables::of($detailKeluarga)
                ->addColumn('action', 'detail_keluargas.datatables_actions')
                ->addIndexColumn()
                ->make();
        }
        return view('detail_keluargas.index');
    }

    /**
     * Show the form for creating a new DetailKeluarga.
     *
     * @return Response
     */
    public function create()
    {
        return view('detail_keluargas.create');
    }

    /**
     * Store a newly created DetailKeluarga in storage.
     *
     * @param CreateDetailKeluargaRequest $request
     *
     * @return Response
     */
    public function store(CreateDetailKeluargaRequest $request)
    {
        $input = $request->all();

        $detailKeluarga = $this->detailKeluargaRepository->create($input);

        Flash::success('Detail Keluarga saved successfully.');

        return redirect(route('detailKeluargas.index'));
    }

    /**
     * Display the specified DetailKeluarga.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detailKeluarga = $this->detailKeluargaRepository->findWithoutFail($id);

        if (empty($detailKeluarga)) {
            Flash::error('Detail Keluarga not found');

            return redirect(route('detailKeluargas.index'));
        }

        return view('detail_keluargas.show')->with('detailKeluarga', $detailKeluarga);
    }

    /**
     * Show the form for editing the specified DetailKeluarga.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detailKeluarga = $this->detailKeluargaRepository->findWithoutFail($id);

        if (empty($detailKeluarga)) {
            Flash::error('Detail Keluarga not found');

            return redirect(route('detailKeluargas.index'));
        }

        return view('detail_keluargas.edit')->with('detailKeluarga', $detailKeluarga);
    }

    /**
     * Update the specified DetailKeluarga in storage.
     *
     * @param  int              $id
     * @param UpdateDetailKeluargaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetailKeluargaRequest $request)
    {
        $detailKeluarga = $this->detailKeluargaRepository->findWithoutFail($id);

        if (empty($detailKeluarga)) {
            Flash::error('Detail Keluarga not found');

            return redirect(route('detailKeluargas.index'));
        }

        $detailKeluarga = $this->detailKeluargaRepository->update($request->all(), $id);

        Flash::success('Detail Keluarga updated successfully.');

        return redirect(route('detailKeluargas.index'));
    }

    /**
     * Remove the specified DetailKeluarga from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detailKeluarga = $this->detailKeluargaRepository->findWithoutFail($id);

        if (empty($detailKeluarga)) {
            Flash::error('Detail Keluarga not found');

            return redirect(route('detailKeluargas.index'));
        }

        $this->detailKeluargaRepository->delete($id);

        Flash::success('Detail Keluarga deleted successfully.');

        return redirect(route('detailKeluargas.index'));
    }
}
