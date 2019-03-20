<?php

namespace App\Http\Controllers;

use App\DataTables\JenisKeluargaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateJenisKeluargaRequest;
use App\Http\Requests\UpdateJenisKeluargaRequest;
use App\Repositories\JenisKeluargaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class JenisKeluargaController extends AppBaseController
{
    /** @var  JenisKeluargaRepository */
    private $jenisKeluargaRepository;

    public function __construct(JenisKeluargaRepository $jenisKeluargaRepo)
    {
        $this->jenisKeluargaRepository = $jenisKeluargaRepo;
    }

    /**
     * Display a listing of the JenisKeluarga.
     *
     * @param JenisKeluargaDataTable $jenisKeluargaDataTable
     * @return Response
     */
    public function index(JenisKeluargaDataTable $jenisKeluargaDataTable)
    {
        return $jenisKeluargaDataTable->render('jenis_keluargas.index');
    }

    /**
     * Show the form for creating a new JenisKeluarga.
     *
     * @return Response
     */
    public function create()
    {
        return view('jenis_keluargas.create');
    }

    /**
     * Store a newly created JenisKeluarga in storage.
     *
     * @param CreateJenisKeluargaRequest $request
     *
     * @return Response
     */
    public function store(CreateJenisKeluargaRequest $request)
    {
        $input = $request->all();

        $jenisKeluarga = $this->jenisKeluargaRepository->create($input);

        Flash::success('Jenis Keluarga saved successfully.');

        return redirect(route('jenisKeluargas.index'));
    }

    /**
     * Display the specified JenisKeluarga.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jenisKeluarga = $this->jenisKeluargaRepository->findWithoutFail($id);

        if (empty($jenisKeluarga)) {
            Flash::error('Jenis Keluarga not found');

            return redirect(route('jenisKeluargas.index'));
        }

        return view('jenis_keluargas.show')->with('jenisKeluarga', $jenisKeluarga);
    }

    /**
     * Show the form for editing the specified JenisKeluarga.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jenisKeluarga = $this->jenisKeluargaRepository->findWithoutFail($id);

        if (empty($jenisKeluarga)) {
            Flash::error('Jenis Keluarga not found');

            return redirect(route('jenisKeluargas.index'));
        }

        return view('jenis_keluargas.edit')->with('jenisKeluarga', $jenisKeluarga);
    }

    /**
     * Update the specified JenisKeluarga in storage.
     *
     * @param  int              $id
     * @param UpdateJenisKeluargaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJenisKeluargaRequest $request)
    {
        $jenisKeluarga = $this->jenisKeluargaRepository->findWithoutFail($id);

        if (empty($jenisKeluarga)) {
            Flash::error('Jenis Keluarga not found');

            return redirect(route('jenisKeluargas.index'));
        }

        $jenisKeluarga = $this->jenisKeluargaRepository->update($request->all(), $id);

        Flash::success('Jenis Keluarga updated successfully.');

        return redirect(route('jenisKeluargas.index'));
    }

    /**
     * Remove the specified JenisKeluarga from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jenisKeluarga = $this->jenisKeluargaRepository->findWithoutFail($id);

        if (empty($jenisKeluarga)) {
            Flash::error('Jenis Keluarga not found');

            return redirect(route('jenisKeluargas.index'));
        }

        $this->jenisKeluargaRepository->delete($id);

        Flash::success('Jenis Keluarga deleted successfully.');

        return redirect(route('jenisKeluargas.index'));
    }
}
