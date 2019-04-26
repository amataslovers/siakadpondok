<?php

namespace App\Http\Controllers;

use App\DataTables\SanksiDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSanksiRequest;
use App\Http\Requests\UpdateSanksiRequest;
use App\Repositories\SanksiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SanksiController extends AppBaseController
{
    /** @var  SanksiRepository */
    private $sanksiRepository;

    public function __construct(SanksiRepository $sanksiRepo)
    {
        $this->sanksiRepository = $sanksiRepo;
        $this->middleware('permission:sanksi-view');
        $this->middleware('permission:sanksi-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:sanksi-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:sanksi-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Sanksi.
     *
     * @param SanksiDataTable $sanksiDataTable
     * @return Response
     */
    public function index(SanksiDataTable $sanksiDataTable)
    {
        return $sanksiDataTable->render('sanksis.index');
    }

    /**
     * Show the form for creating a new Sanksi.
     *
     * @return Response
     */
    public function create()
    {
        return view('sanksis.create');
    }

    /**
     * Store a newly created Sanksi in storage.
     *
     * @param CreateSanksiRequest $request
     *
     * @return Response
     */
    public function store(CreateSanksiRequest $request)
    {
        $input = $request->all();

        $sanksi = $this->sanksiRepository->create($input);

        Flash::success('Sanksi saved successfully.');

        return redirect(route('sanksis.index'));
    }

    /**
     * Display the specified Sanksi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sanksi = $this->sanksiRepository->findWithoutFail($id);

        if (empty($sanksi)) {
            Flash::error('Sanksi not found');

            return redirect(route('sanksis.index'));
        }

        return view('sanksis.show')->with('sanksi', $sanksi);
    }

    /**
     * Show the form for editing the specified Sanksi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sanksi = $this->sanksiRepository->findWithoutFail($id);

        if (empty($sanksi)) {
            Flash::error('Sanksi not found');

            return redirect(route('sanksis.index'));
        }

        return view('sanksis.edit')->with('sanksi', $sanksi);
    }

    /**
     * Update the specified Sanksi in storage.
     *
     * @param  int              $id
     * @param UpdateSanksiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSanksiRequest $request)
    {
        $sanksi = $this->sanksiRepository->findWithoutFail($id);

        if (empty($sanksi)) {
            Flash::error('Sanksi not found');

            return redirect(route('sanksis.index'));
        }

        $sanksi = $this->sanksiRepository->update($request->all(), $id);

        Flash::success('Sanksi updated successfully.');

        return redirect(route('sanksis.index'));
    }

    /**
     * Remove the specified Sanksi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sanksi = $this->sanksiRepository->findWithoutFail($id);

        if (empty($sanksi)) {
            Flash::error('Sanksi not found');

            return redirect(route('sanksis.index'));
        }

        $this->sanksiRepository->delete($id);

        Flash::success('Sanksi deleted successfully.');

        return redirect(route('sanksis.index'));
    }
}
