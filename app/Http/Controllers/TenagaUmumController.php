<?php

namespace App\Http\Controllers;

use App\DataTables\TenagaUmumDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTenagaUmumRequest;
use App\Http\Requests\UpdateTenagaUmumRequest;
use App\Repositories\TenagaUmumRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TenagaUmumController extends AppBaseController
{
    /** @var  TenagaUmumRepository */
    private $tenagaUmumRepository;

    public function __construct(TenagaUmumRepository $tenagaUmumRepo)
    {
        $this->tenagaUmumRepository = $tenagaUmumRepo;
    }

    /**
     * Display a listing of the TenagaUmum.
     *
     * @param TenagaUmumDataTable $tenagaUmumDataTable
     * @return Response
     */
    public function index(TenagaUmumDataTable $tenagaUmumDataTable)
    {
        return $tenagaUmumDataTable->render('tenaga_umums.index');
    }

    /**
     * Show the form for creating a new TenagaUmum.
     *
     * @return Response
     */
    public function create()
    {
        return view('tenaga_umums.create');
    }

    /**
     * Store a newly created TenagaUmum in storage.
     *
     * @param CreateTenagaUmumRequest $request
     *
     * @return Response
     */
    public function store(CreateTenagaUmumRequest $request)
    {
        $input = $request->all();

        $tenagaUmum = $this->tenagaUmumRepository->create($input);

        Flash::success('Tenaga Umum saved successfully.');

        return redirect(route('tenagaUmums.index'));
    }

    /**
     * Display the specified TenagaUmum.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tenagaUmum = $this->tenagaUmumRepository->findWithoutFail($id);

        if (empty($tenagaUmum)) {
            Flash::error('Tenaga Umum not found');

            return redirect(route('tenagaUmums.index'));
        }

        return view('tenaga_umums.show')->with('tenagaUmum', $tenagaUmum);
    }

    /**
     * Show the form for editing the specified TenagaUmum.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tenagaUmum = $this->tenagaUmumRepository->findWithoutFail($id);

        if (empty($tenagaUmum)) {
            Flash::error('Tenaga Umum not found');

            return redirect(route('tenagaUmums.index'));
        }

        return view('tenaga_umums.edit')->with('tenagaUmum', $tenagaUmum);
    }

    /**
     * Update the specified TenagaUmum in storage.
     *
     * @param  int              $id
     * @param UpdateTenagaUmumRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTenagaUmumRequest $request)
    {
        $tenagaUmum = $this->tenagaUmumRepository->findWithoutFail($id);

        if (empty($tenagaUmum)) {
            Flash::error('Tenaga Umum not found');

            return redirect(route('tenagaUmums.index'));
        }

        $tenagaUmum = $this->tenagaUmumRepository->update($request->all(), $id);

        Flash::success('Tenaga Umum updated successfully.');

        return redirect(route('tenagaUmums.index'));
    }

    /**
     * Remove the specified TenagaUmum from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tenagaUmum = $this->tenagaUmumRepository->findWithoutFail($id);

        if (empty($tenagaUmum)) {
            Flash::error('Tenaga Umum not found');

            return redirect(route('tenagaUmums.index'));
        }

        $this->tenagaUmumRepository->delete($id);

        Flash::success('Tenaga Umum deleted successfully.');

        return redirect(route('tenagaUmums.index'));
    }
}
