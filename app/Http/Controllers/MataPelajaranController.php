<?php

namespace App\Http\Controllers;

use App\DataTables\MataPelajaranDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMataPelajaranRequest;
use App\Http\Requests\UpdateMataPelajaranRequest;
use App\Repositories\MataPelajaranRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MataPelajaranController extends AppBaseController
{
    /** @var  MataPelajaranRepository */
    private $mataPelajaranRepository;

    public function __construct(MataPelajaranRepository $mataPelajaranRepo)
    {
        $this->mataPelajaranRepository = $mataPelajaranRepo;
    }

    /**
     * Display a listing of the MataPelajaran.
     *
     * @param MataPelajaranDataTable $mataPelajaranDataTable
     * @return Response
     */
    public function index(MataPelajaranDataTable $mataPelajaranDataTable)
    {
        return $mataPelajaranDataTable->render('mata_pelajarans.index');
    }

    /**
     * Show the form for creating a new MataPelajaran.
     *
     * @return Response
     */
    public function create()
    {
        return view('mata_pelajarans.create');
    }

    /**
     * Store a newly created MataPelajaran in storage.
     *
     * @param CreateMataPelajaranRequest $request
     *
     * @return Response
     */
    public function store(CreateMataPelajaranRequest $request)
    {
        $input = $request->all();

        $mataPelajaran = $this->mataPelajaranRepository->create($input);

        Flash::success('Mata Pelajaran saved successfully.');

        return redirect(route('mataPelajarans.index'));
    }

    /**
     * Display the specified MataPelajaran.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mataPelajaran = $this->mataPelajaranRepository->findWithoutFail($id);

        if (empty($mataPelajaran)) {
            Flash::error('Mata Pelajaran not found');

            return redirect(route('mataPelajarans.index'));
        }

        return view('mata_pelajarans.show')->with('mataPelajaran', $mataPelajaran);
    }

    /**
     * Show the form for editing the specified MataPelajaran.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mataPelajaran = $this->mataPelajaranRepository->findWithoutFail($id);

        if (empty($mataPelajaran)) {
            Flash::error('Mata Pelajaran not found');

            return redirect(route('mataPelajarans.index'));
        }

        return view('mata_pelajarans.edit')->with('mataPelajaran', $mataPelajaran);
    }

    /**
     * Update the specified MataPelajaran in storage.
     *
     * @param  int              $id
     * @param UpdateMataPelajaranRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMataPelajaranRequest $request)
    {
        $mataPelajaran = $this->mataPelajaranRepository->findWithoutFail($id);

        if (empty($mataPelajaran)) {
            Flash::error('Mata Pelajaran not found');

            return redirect(route('mataPelajarans.index'));
        }

        $mataPelajaran = $this->mataPelajaranRepository->update($request->all(), $id);

        Flash::success('Mata Pelajaran updated successfully.');

        return redirect(route('mataPelajarans.index'));
    }

    /**
     * Remove the specified MataPelajaran from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mataPelajaran = $this->mataPelajaranRepository->findWithoutFail($id);

        if (empty($mataPelajaran)) {
            Flash::error('Mata Pelajaran not found');

            return redirect(route('mataPelajarans.index'));
        }

        $this->mataPelajaranRepository->delete($id);

        Flash::success('Mata Pelajaran deleted successfully.');

        return redirect(route('mataPelajarans.index'));
    }
}
