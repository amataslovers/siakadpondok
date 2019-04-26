<?php

namespace App\Http\Controllers;

use App\DataTables\TahunAjaranDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTahunAjaranRequest;
use App\Http\Requests\UpdateTahunAjaranRequest;
use App\Repositories\TahunAjaranRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TahunAjaranController extends AppBaseController
{
    /** @var  TahunAjaranRepository */
    private $tahunAjaranRepository;

    public function __construct(TahunAjaranRepository $tahunAjaranRepo)
    {
        $this->tahunAjaranRepository = $tahunAjaranRepo;
        $this->middleware('permission:tahun-ajaran-view');
        $this->middleware('permission:tahun-ajaran-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:tahun-ajaran-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:tahun-ajaran-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the TahunAjaran.
     *
     * @param TahunAjaranDataTable $tahunAjaranDataTable
     * @return Response
     */
    public function index(TahunAjaranDataTable $tahunAjaranDataTable)
    {
        return $tahunAjaranDataTable->render('tahun_ajarans.index');
    }

    /**
     * Show the form for creating a new TahunAjaran.
     *
     * @return Response
     */
    public function create()
    {
        return view('tahun_ajarans.create');
    }

    /**
     * Store a newly created TahunAjaran in storage.
     *
     * @param CreateTahunAjaranRequest $request
     *
     * @return Response
     */
    public function store(CreateTahunAjaranRequest $request)
    {
        $input = $request->all();

        $tahunAjaran = $this->tahunAjaranRepository->create($input);

        Flash::success('Tahun Ajaran saved successfully.');

        return redirect(route('tahunAjarans.index'));
    }

    /**
     * Display the specified TahunAjaran.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tahunAjaran = $this->tahunAjaranRepository->findWithoutFail($id);

        if (empty($tahunAjaran)) {
            Flash::error('Tahun Ajaran not found');

            return redirect(route('tahunAjarans.index'));
        }

        return view('tahun_ajarans.show')->with('tahunAjaran', $tahunAjaran);
    }

    /**
     * Show the form for editing the specified TahunAjaran.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tahunAjaran = $this->tahunAjaranRepository->findWithoutFail($id);

        if (empty($tahunAjaran)) {
            Flash::error('Tahun Ajaran not found');

            return redirect(route('tahunAjarans.index'));
        }

        return view('tahun_ajarans.edit')->with('tahunAjaran', $tahunAjaran);
    }

    /**
     * Update the specified TahunAjaran in storage.
     *
     * @param  int              $id
     * @param UpdateTahunAjaranRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTahunAjaranRequest $request)
    {
        $tahunAjaran = $this->tahunAjaranRepository->findWithoutFail($id);

        if (empty($tahunAjaran)) {
            Flash::error('Tahun Ajaran not found');

            return redirect(route('tahunAjarans.index'));
        }

        $tahunAjaran = $this->tahunAjaranRepository->update($request->all(), $id);

        Flash::success('Tahun Ajaran updated successfully.');

        return redirect(route('tahunAjarans.index'));
    }

    /**
     * Remove the specified TahunAjaran from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tahunAjaran = $this->tahunAjaranRepository->findWithoutFail($id);

        if (empty($tahunAjaran)) {
            Flash::error('Tahun Ajaran not found');

            return redirect(route('tahunAjarans.index'));
        }

        $this->tahunAjaranRepository->delete($id);

        Flash::success('Tahun Ajaran deleted successfully.');

        return redirect(route('tahunAjarans.index'));
    }
}
