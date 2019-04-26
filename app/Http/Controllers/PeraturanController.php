<?php

namespace App\Http\Controllers;

use App\DataTables\PeraturanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePeraturanRequest;
use App\Http\Requests\UpdatePeraturanRequest;
use App\Repositories\PeraturanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Sanksi;

class PeraturanController extends AppBaseController
{
    /** @var  PeraturanRepository */
    private $peraturanRepository;

    public function __construct(PeraturanRepository $peraturanRepo)
    {
        $this->peraturanRepository = $peraturanRepo;
        $this->middleware('permission:peraturan-view');
        $this->middleware('permission:peraturan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:peraturan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:peraturan-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Peraturan.
     *
     * @param PeraturanDataTable $peraturanDataTable
     * @return Response
     */
    public function index(PeraturanDataTable $peraturanDataTable)
    {
        return $peraturanDataTable->render('peraturans.index');
    }

    /**
     * Show the form for creating a new Peraturan.
     *
     * @return Response
     */
    public function create()
    {
        $sanksi = Sanksi::pluck('NAMA_SANKSI', 'ID_SANKSI');
        return view('peraturans.create')->with(compact('sanksi'));
    }

    /**
     * Store a newly created Peraturan in storage.
     *
     * @param CreatePeraturanRequest $request
     *
     * @return Response
     */
    public function store(CreatePeraturanRequest $request)
    {
        $input = $request->all();

        $peraturan = $this->peraturanRepository->create($input);

        Flash::success('Peraturan saved successfully.');

        return redirect(route('peraturans.index'));
    }

    /**
     * Display the specified Peraturan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $peraturan = $this->peraturanRepository->findWithoutFail($id);

        if (empty($peraturan)) {
            Flash::error('Peraturan not found');

            return redirect(route('peraturans.index'));
        }

        return view('peraturans.show')->with('peraturan', $peraturan);
    }

    /**
     * Show the form for editing the specified Peraturan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $peraturan = $this->peraturanRepository->findWithoutFail($id);

        if (empty($peraturan)) {
            Flash::error('Peraturan not found');

            return redirect(route('peraturans.index'));
        }
        $sanksi = Sanksi::pluck('NAMA_SANKSI', 'ID_SANKSI');

        return view('peraturans.edit')->with(['peraturan' => $peraturan, 'sanksi' => $sanksi]);
    }

    /**
     * Update the specified Peraturan in storage.
     *
     * @param  int              $id
     * @param UpdatePeraturanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePeraturanRequest $request)
    {
        $peraturan = $this->peraturanRepository->findWithoutFail($id);

        if (empty($peraturan)) {
            Flash::error('Peraturan not found');

            return redirect(route('peraturans.index'));
        }

        $peraturan = $this->peraturanRepository->update($request->all(), $id);

        Flash::success('Peraturan updated successfully.');

        return redirect(route('peraturans.index'));
    }

    /**
     * Remove the specified Peraturan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $peraturan = $this->peraturanRepository->findWithoutFail($id);

        if (empty($peraturan)) {
            Flash::error('Peraturan not found');

            return redirect(route('peraturans.index'));
        }

        $this->peraturanRepository->delete($id);

        Flash::success('Peraturan deleted successfully.');

        return redirect(route('peraturans.index'));
    }
}
