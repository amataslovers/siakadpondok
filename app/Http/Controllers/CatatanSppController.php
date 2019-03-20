<?php

namespace App\Http\Controllers;

use App\DataTables\CatatanSppDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCatatanSppRequest;
use App\Http\Requests\UpdateCatatanSppRequest;
use App\Repositories\CatatanSppRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CatatanSppController extends AppBaseController
{
    /** @var  CatatanSppRepository */
    private $catatanSppRepository;

    public function __construct(CatatanSppRepository $catatanSppRepo)
    {
        $this->catatanSppRepository = $catatanSppRepo;
    }

    /**
     * Display a listing of the CatatanSpp.
     *
     * @param CatatanSppDataTable $catatanSppDataTable
     * @return Response
     */
    public function index(CatatanSppDataTable $catatanSppDataTable)
    {
        return $catatanSppDataTable->render('catatan_spps.index');
    }

    /**
     * Show the form for creating a new CatatanSpp.
     *
     * @return Response
     */
    public function create()
    {
        return view('catatan_spps.create');
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

        $catatanSpp = $this->catatanSppRepository->create($input);

        Flash::success('Catatan Spp saved successfully.');

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

        return view('catatan_spps.edit')->with('catatanSpp', $catatanSpp);
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
