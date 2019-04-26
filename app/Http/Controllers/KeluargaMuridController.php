<?php

namespace App\Http\Controllers;

use App\DataTables\KeluargaMuridDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKeluargaMuridRequest;
use App\Http\Requests\UpdateKeluargaMuridRequest;
use App\Repositories\KeluargaMuridRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\KeluargaMurid;
use App\Models\DetailKeluarga;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Agama;
use App\Models\JenisKeluarga;

class KeluargaMuridController extends AppBaseController
{
    /** @var  KeluargaMuridRepository */
    private $keluargaMuridRepository;

    public function __construct(KeluargaMuridRepository $keluargaMuridRepo)
    {
        $this->keluargaMuridRepository = $keluargaMuridRepo;
        $this->middleware('permission:keluarga-murid-view');
        $this->middleware('permission:keluarga-murid-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:keluarga-murid-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:keluarga-murid-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the KeluargaMurid.
     *
     * @param KeluargaMuridDataTable $keluargaMuridDataTable
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keluargaMurid = $this->keluargaMuridRepository
                ->with([
                    'jenisKeluarga:ID_JENIS_KELUARGA,NAMA',
                ])
                ->all();
            return DataTables::of($keluargaMurid)
                ->addColumn('action', 'keluarga_murids.datatables_actions')
                ->addIndexColumn()
                ->editColumn('TANGGAL_LAHIR', function ($keluargaMurid) {
                    return $keluargaMurid->TANGGAL_LAHIR;
                })
                ->make();
        }
        return view('keluarga_murids.index');
    }

    /**
     * Show the form for creating a new KeluargaMurid.
     *
     * @return Response
     */
    public function create()
    {
        $agama = Agama::pluck('NAMA', 'ID_AGAMA');
        $jenisKeluarga = JenisKeluarga::pluck('NAMA', 'ID_JENIS_KELUARGA');
        return view('keluarga_murids.create')->with(compact('agama', 'jenisKeluarga'));
    }

    /**
     * Store a newly created KeluargaMurid in storage.
     *
     * @param CreateKeluargaMuridRequest $request
     *
     * @return Response
     */
    public function store(CreateKeluargaMuridRequest $request)
    {
        $input = $request->all();

        $keluargaMurid = $this->keluargaMuridRepository->create($input);

        Flash::success('Keluarga Murid saved successfully.');

        return redirect(route('keluargaMurids.index'));
    }

    /**
     * Display the specified KeluargaMurid.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $keluargaMurid = $this->keluargaMuridRepository->findWithoutFail($id);

        if (empty($keluargaMurid)) {
            Flash::error('Keluarga Murid not found');

            return redirect(route('keluargaMurids.index'));
        }

        return view('keluarga_murids.show')->with('keluargaMurid', $keluargaMurid);
    }

    /**
     * Show the form for editing the specified KeluargaMurid.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $keluargaMurid = $this->keluargaMuridRepository->findWithoutFail($id);

        if (empty($keluargaMurid)) {
            Flash::error('Keluarga Murid not found');

            return redirect(route('keluargaMurids.index'));
        }
        $agama = Agama::pluck('NAMA', 'ID_AGAMA');
        $jenisKeluarga = JenisKeluarga::pluck('NAMA', 'ID_JENIS_KELUARGA');
        return view('keluarga_murids.edit')->with(compact('keluargaMurid', 'agama', 'jenisKeluarga'));
    }

    /**
     * Update the specified KeluargaMurid in storage.
     *
     * @param  int              $id
     * @param UpdateKeluargaMuridRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKeluargaMuridRequest $request)
    {
        $keluargaMurid = $this->keluargaMuridRepository->findWithoutFail($id);

        if (empty($keluargaMurid)) {
            Flash::error('Keluarga Murid not found');

            return redirect(route('keluargaMurids.index'));
        }

        $keluargaMurid = $this->keluargaMuridRepository->update($request->all(), $id);

        Flash::success('Keluarga Murid updated successfully.');

        return redirect(route('keluargaMurids.index'));
    }

    /**
     * Remove the specified KeluargaMurid from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $keluargaMurid = $this->keluargaMuridRepository->findWithoutFail($id);

        if (empty($keluargaMurid)) {
            Flash::error('Keluarga Murid not found');

            return redirect(route('keluargaMurids.index'));
        }

        $this->keluargaMuridRepository->delete($id);

        Flash::success('Keluarga Murid deleted successfully.');

        return redirect(route('keluargaMurids.index'));
    }

    public function getDetailKeluargaById($id)
    {
        $keluarga = KeluargaMurid::with('agama', 'jenisKeluarga')->find($id);

        return response()->json($keluarga);
    }

    public function deleteKeluargaViaAjax($id, $nis)
    {
        $keluarga = KeluargaMurid::where('ID_KELUARGA_MURID', $id)->has('murid', '>', 1)->get();
        if (!$keluarga->isEmpty()) {
            DetailKeluarga::where(['ID_KELUARGA_MURID' => $id, 'NIS' => $nis])->delete();
            return response()->json(false);
        } else {
            KeluargaMurid::find($id)->delete();
            return response()->json(true);
        }
    }
}
