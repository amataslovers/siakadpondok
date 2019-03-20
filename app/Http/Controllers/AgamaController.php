<?php

namespace App\Http\Controllers;

use App\DataTables\AgamaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAgamaRequest;
use App\Http\Requests\UpdateAgamaRequest;
use App\Repositories\AgamaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AgamaController extends AppBaseController
{
    /** @var  AgamaRepository */
    private $agamaRepository;

    public function __construct(AgamaRepository $agamaRepo)
    {
        $this->agamaRepository = $agamaRepo;
    }

    /**
     * Display a listing of the Agama.
     *
     * @param AgamaDataTable $agamaDataTable
     * @return Response
     */
    public function index(AgamaDataTable $agamaDataTable)
    {
        return $agamaDataTable->render('agamas.index');
    }

    /**
     * Show the form for creating a new Agama.
     *
     * @return Response
     */
    public function create()
    {
        return view('agamas.create');
    }

    /**
     * Store a newly created Agama in storage.
     *
     * @param CreateAgamaRequest $request
     *
     * @return Response
     */
    public function store(CreateAgamaRequest $request)
    {
        $input = $request->all();

        $agama = $this->agamaRepository->create($input);

        Flash::success('Agama saved successfully.');

        return redirect(route('agamas.index'));
    }

    /**
     * Display the specified Agama.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agama = $this->agamaRepository->findWithoutFail($id);

        if (empty($agama)) {
            Flash::error('Agama not found');

            return redirect(route('agamas.index'));
        }

        return view('agamas.show')->with('agama', $agama);
    }

    /**
     * Show the form for editing the specified Agama.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $agama = $this->agamaRepository->findWithoutFail($id);

        if (empty($agama)) {
            Flash::error('Agama not found');

            return redirect(route('agamas.index'));
        }

        return view('agamas.edit')->with('agama', $agama);
    }

    /**
     * Update the specified Agama in storage.
     *
     * @param  int              $id
     * @param UpdateAgamaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgamaRequest $request)
    {
        $agama = $this->agamaRepository->findWithoutFail($id);

        if (empty($agama)) {
            Flash::error('Agama not found');

            return redirect(route('agamas.index'));
        }

        $agama = $this->agamaRepository->update($request->all(), $id);

        Flash::success('Agama updated successfully.');

        return redirect(route('agamas.index'));
    }

    /**
     * Remove the specified Agama from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agama = $this->agamaRepository->findWithoutFail($id);

        if (empty($agama)) {
            Flash::error('Agama not found');

            return redirect(route('agamas.index'));
        }

        $this->agamaRepository->delete($id);

        Flash::success('Agama deleted successfully.');

        return redirect(route('agamas.index'));
    }
}
