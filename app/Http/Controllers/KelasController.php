<?php

namespace App\Http\Controllers;

use App\DataTables\KelasDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use App\Repositories\KelasRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Guru;
use App\Models\TahunAjaran;
use App\Models\Tingkat;

class KelasController extends AppBaseController
{
    /** @var  KelasRepository */
    private $kelasRepository;

    public function __construct(KelasRepository $kelasRepo)
    {
        $this->kelasRepository = $kelasRepo;
    }

    /**
     * Display a listing of the Kelas.
     *
     * @param KelasDataTable $kelasDataTable
     * @return Response
     */
    public function index(KelasDataTable $kelasDataTable)
    {
        return $kelasDataTable->render('kelas.index');
    }

    /**
     * Show the form for creating a new Kelas.
     *
     * @return Response
     */
    public function create()
    {
        $guru = Guru::all()->pluck('nama_lengkap', 'NIP_GURU');
        $tingkat = Tingkat::pluck('TINGKAT', 'ID_TINGKAT');
        $tahun = TahunAjaran::pluck('NAMA', 'ID_TAHUN_AJARAN');
        return view('kelas.create')->with(compact('guru', 'tingkat', 'tahun'));
    }

    /**
     * Store a newly created Kelas in storage.
     *
     * @param CreateKelasRequest $request
     *
     * @return Response
     */
    public function store(CreateKelasRequest $request)
    {
        $input = $request->all();

        $kelas = $this->kelasRepository->create($input);

        Flash::success('Kelas saved successfully.');

        return redirect(route('kelas.index'));
    }

    /**
     * Display the specified Kelas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kelas = $this->kelasRepository->findWithoutFail($id);

        if (empty($kelas)) {
            Flash::error('Kelas not found');

            return redirect(route('kelas.index'));
        }

        return view('kelas.show')->with('kelas', $kelas);
    }

    /**
     * Show the form for editing the specified Kelas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kelas = $this->kelasRepository->findWithoutFail($id);

        if (empty($kelas)) {
            Flash::error('Kelas not found');

            return redirect(route('kelas.index'));
        }

        $guru = Guru::all()->pluck('nama_lengkap', 'NIP_GURU');
        $tingkat = Tingkat::pluck('TINGKAT', 'ID_TINGKAT');
        $tahun = TahunAjaran::pluck('NAMA', 'ID_TAHUN_AJARAN');
        return view('kelas.edit')->with(compact('kelas', 'guru', 'tingkat', 'tahun'));
    }

    /**
     * Update the specified Kelas in storage.
     *
     * @param  int              $id
     * @param UpdateKelasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKelasRequest $request)
    {
        $kelas = $this->kelasRepository->findWithoutFail($id);

        if (empty($kelas)) {
            Flash::error('Kelas not found');

            return redirect(route('kelas.index'));
        }

        $kelas = $this->kelasRepository->update($request->all(), $id);

        Flash::success('Kelas updated successfully.');

        return redirect(route('kelas.index'));
    }

    /**
     * Remove the specified Kelas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kelas = $this->kelasRepository->findWithoutFail($id);

        if (empty($kelas)) {
            Flash::error('Kelas not found');

            return redirect(route('kelas.index'));
        }

        $this->kelasRepository->delete($id);

        Flash::success('Kelas deleted successfully.');

        return redirect(route('kelas.index'));
    }
}
