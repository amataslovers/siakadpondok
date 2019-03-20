<?php

namespace App\Http\Controllers;

use App\DataTables\TingkatDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTingkatRequest;
use App\Http\Requests\UpdateTingkatRequest;
use App\Repositories\TingkatRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TingkatController extends AppBaseController
{
    /** @var  TingkatRepository */
    private $tingkatRepository;

    public function __construct(TingkatRepository $tingkatRepo)
    {
        $this->tingkatRepository = $tingkatRepo;
    }

    /**
     * Display a listing of the Tingkat.
     *
     * @param TingkatDataTable $tingkatDataTable
     * @return Response
     */
    public function index(TingkatDataTable $tingkatDataTable)
    {
        return $tingkatDataTable->render('tingkats.index');
    }

    /**
     * Show the form for creating a new Tingkat.
     *
     * @return Response
     */
    public function create()
    {
        return view('tingkats.create');
    }

    /**
     * Store a newly created Tingkat in storage.
     *
     * @param CreateTingkatRequest $request
     *
     * @return Response
     */
    public function store(CreateTingkatRequest $request)
    {
        $input = $request->all();

        $tingkat = $this->tingkatRepository->create($input);

        Flash::success('Tingkat saved successfully.');

        return redirect(route('tingkats.index'));
    }

    /**
     * Display the specified Tingkat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tingkat = $this->tingkatRepository->findWithoutFail($id);

        if (empty($tingkat)) {
            Flash::error('Tingkat not found');

            return redirect(route('tingkats.index'));
        }

        return view('tingkats.show')->with('tingkat', $tingkat);
    }

    /**
     * Show the form for editing the specified Tingkat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tingkat = $this->tingkatRepository->findWithoutFail($id);

        if (empty($tingkat)) {
            Flash::error('Tingkat not found');

            return redirect(route('tingkats.index'));
        }

        return view('tingkats.edit')->with('tingkat', $tingkat);
    }

    /**
     * Update the specified Tingkat in storage.
     *
     * @param  int              $id
     * @param UpdateTingkatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTingkatRequest $request)
    {
        $tingkat = $this->tingkatRepository->findWithoutFail($id);

        if (empty($tingkat)) {
            Flash::error('Tingkat not found');

            return redirect(route('tingkats.index'));
        }

        $tingkat = $this->tingkatRepository->update($request->all(), $id);

        Flash::success('Tingkat updated successfully.');

        return redirect(route('tingkats.index'));
    }

    /**
     * Remove the specified Tingkat from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tingkat = $this->tingkatRepository->findWithoutFail($id);

        if (empty($tingkat)) {
            Flash::error('Tingkat not found');

            return redirect(route('tingkats.index'));
        }

        $this->tingkatRepository->delete($id);

        Flash::success('Tingkat deleted successfully.');

        return redirect(route('tingkats.index'));
    }
}
