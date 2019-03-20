<?php

namespace App\Http\Controllers;

use App\DataTables\PengampuDataTable;
use App\Http\Requests\CreatePengampuRequest;
use App\Http\Requests\UpdatePengampuRequest;
use App\Repositories\PengampuRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\MataPelajaran;
use App\Models\Guru;
use App\Models\TahunAjaran;
use App\Models\Kelas;

class PengampuController extends AppBaseController
{
    /** @var  PengampuRepository */
    private $pengampuRepository;

    public function __construct(PengampuRepository $pengampuRepo)
    {
        $this->pengampuRepository = $pengampuRepo;
    }

    /**
     * Display a listing of the Pengampu.
     *
     * @param PengampuDataTable $pengampuDataTable
     * @return Response
     */
    public function index(Request $request)
    {
        // return $pengampuDataTable->render('pengampus.index');
        if ($request->ajax()) {
            $pengampu = $this->pengampuRepository->with(['mataPelajaran', 'guru', 'kelas', 'tahunAjaran'])->all();
            return DataTables::of($pengampu)
                ->addColumn('action', 'pengampus.datatables_actions')
                ->make();
        }
        return view('pengampus.index');
    }

    /**
     * Show the form for creating a new Pengampu.
     *
     * @return Response
     */
    public function create()
    {
        $mapel = MataPelajaran::all()->pluck('kode_nama', 'ID_MATA_PELAJARAN');
        $guru = Guru::all()->pluck('nama_lengkap', 'NIP_GURU');
        $tahun = TahunAjaran::pluck('NAMA', 'ID_TAHUN_AJARAN');
        $kelas = Kelas::all()->pluck('nama_lengkap', 'ID_KELAS');
        return view('pengampus.create')->with(compact('mapel', 'guru', 'tahun', 'kelas'));
    }

    /**
     * Store a newly created Pengampu in storage.
     *
     * @param CreatePengampuRequest $request
     *
     * @return Response
     */
    public function store(CreatePengampuRequest $request)
    {
        $input = $request->all();

        $pengampu = $this->pengampuRepository->create($input);

        Flash::success('Pengampu saved successfully.');

        return redirect(route('pengampus.index'));
    }

    /**
     * Display the specified Pengampu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pengampu = $this->pengampuRepository->findWithoutFail($id);

        if (empty($pengampu)) {
            Flash::error('Pengampu not found');

            return redirect(route('pengampus.index'));
        }

        return view('pengampus.show')->with('pengampu', $pengampu);
    }

    /**
     * Show the form for editing the specified Pengampu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pengampu = $this->pengampuRepository->findWithoutFail($id);

        if (empty($pengampu)) {
            Flash::error('Pengampu not found');

            return redirect(route('pengampus.index'));
        }
        $mapel = MataPelajaran::all()->pluck('kode_nama', 'ID_MATA_PELAJARAN');
        $guru = Guru::all()->pluck('nama_lengkap', 'NIP_GURU');
        $tahun = TahunAjaran::pluck('NAMA', 'ID_TAHUN_AJARAN');
        $kelas = Kelas::all()->pluck('nama_lengkap', 'ID_KELAS');
        return view('pengampus.edit')->with(compact('pengampu', 'mapel', 'guru', 'tahun', 'kelas'));
    }

    /**
     * Update the specified Pengampu in storage.
     *
     * @param  int              $id
     * @param UpdatePengampuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePengampuRequest $request)
    {
        $pengampu = $this->pengampuRepository->findWithoutFail($id);

        if (empty($pengampu)) {
            Flash::error('Pengampu not found');

            return redirect(route('pengampus.index'));
        }

        $pengampu = $this->pengampuRepository->update($request->all(), $id);

        Flash::success('Pengampu updated successfully.');

        return redirect(route('pengampus.index'));
    }

    /**
     * Remove the specified Pengampu from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pengampu = $this->pengampuRepository->findWithoutFail($id);

        if (empty($pengampu)) {
            Flash::error('Pengampu not found');

            return redirect(route('pengampus.index'));
        }

        $this->pengampuRepository->delete($id);

        Flash::success('Pengampu deleted successfully.');

        return redirect(route('pengampus.index'));
    }
}
