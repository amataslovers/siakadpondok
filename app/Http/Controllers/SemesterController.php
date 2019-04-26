<?php

namespace App\Http\Controllers;

use App\DataTables\SemesterDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;
use App\Repositories\SemesterRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\TahunAjaran;

class SemesterController extends AppBaseController
{
    /** @var  SemesterRepository */
    private $semesterRepository;

    public function __construct(SemesterRepository $semesterRepo)
    {
        $this->semesterRepository = $semesterRepo;
        $this->middleware('permission:semester-view');
        $this->middleware('permission:semester-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:semester-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:semester-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Semester.
     *
     * @param SemesterDataTable $semesterDataTable
     * @return Response
     */
    public function index(SemesterDataTable $semesterDataTable)
    {
        return $semesterDataTable->render('semesters.index');
    }

    /**
     * Show the form for creating a new Semester.
     *
     * @return Response
     */
    public function create()
    {
        $tahunAjaran = TahunAjaran::all()->pluck('nama_status', 'ID_TAHUN_AJARAN');
        return view('semesters.create', compact('tahunAjaran'));
    }

    /**
     * Store a newly created Semester in storage.
     *
     * @param CreateSemesterRequest $request
     *
     * @return Response
     */
    public function store(CreateSemesterRequest $request)
    {
        $input = $request->all();

        $semester = $this->semesterRepository->create($input);

        Flash::success('Semester saved successfully.');

        return redirect(route('semesters.index'));
    }

    /**
     * Display the specified Semester.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $semester = $this->semesterRepository->findWithoutFail($id);

        if (empty($semester)) {
            Flash::error('Semester not found');

            return redirect(route('semesters.index'));
        }

        return view('semesters.show')->with('semester', $semester);
    }

    /**
     * Show the form for editing the specified Semester.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $semester = $this->semesterRepository->findWithoutFail($id);

        if (empty($semester)) {
            Flash::error('Semester not found');

            return redirect(route('semesters.index'));
        }
        $tahunAjaran = TahunAjaran::all()->pluck('nama_status', 'ID_TAHUN_AJARAN');
        return view('semesters.edit')->with(['semester' => $semester, 'tahunAjaran' => $tahunAjaran]);
    }

    /**
     * Update the specified Semester in storage.
     *
     * @param  int              $id
     * @param UpdateSemesterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSemesterRequest $request)
    {
        $semester = $this->semesterRepository->findWithoutFail($id);

        if (empty($semester)) {
            Flash::error('Semester not found');

            return redirect(route('semesters.index'));
        }

        $semester = $this->semesterRepository->update($request->all(), $id);

        Flash::success('Semester updated successfully.');

        return redirect(route('semesters.index'));
    }

    /**
     * Remove the specified Semester from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $semester = $this->semesterRepository->findWithoutFail($id);

        if (empty($semester)) {
            Flash::error('Semester not found');

            return redirect(route('semesters.index'));
        }

        $this->semesterRepository->delete($id);

        Flash::success('Semester deleted successfully.');

        return redirect(route('semesters.index'));
    }
}
