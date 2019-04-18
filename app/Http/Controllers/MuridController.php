<?php

namespace App\Http\Controllers;

use App\DataTables\MuridDataTable;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMuridRequest;
use App\Http\Requests\UpdateMuridRequest;
use App\Repositories\MuridRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Agama;
use App\Models\Murid;
use App\Models\Kelas;
use App\User;
use App\Models\JenisKeluarga;
use App\Models\KeluargaMurid;
use Illuminate\Support\Facades\DB;
use App\Models\DetailKeluarga;
use App\Models\HistoryKelas;
use App\Models\Semester;
use File;
use Yajra\DataTables\DataTables;

class MuridController extends AppBaseController
{
    /** @var  MuridRepository */
    private $muridRepository;

    public function __construct(MuridRepository $muridRepo)
    {
        $this->muridRepository = $muridRepo;
    }

    /**
     * Display a listing of the Murid.
     *
     * @param MuridDataTable $muridDataTable
     * @return Response
     */
    // public function index(MuridDataTable $muridDataTable)
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if (is_null($request->get('status'))) {
                $murid = $this->muridRepository->with('agama')->all();
            } else {
                $murid = Murid::where('STATUS_AKTIF', 0)->get();
            }
            return DataTables::of($murid)
                ->addColumn('action', 'murids.datatables_actions')
                ->addIndexColumn()
                ->editColumn('STATUS_AKTIF', function ($murid) {
                    if ($murid->STATUS_AKTIF) {
                        return '<span class="label label-success"> Aktif </span>';
                    } else {
                        return '<span class="label label-danger"> Non Aktif </span>';
                    }
                })
                ->editColumn('TANGGAL_LAHIR', function ($murid) {
                    return $murid->TANGGAL_LAHIR;
                })
                ->rawColumns(['STATUS_AKTIF', 'action'])
                ->make();
        }
        return view('murids.index');
    }

    /**
     * Show the form for creating a new Murid.
     *
     * @return Response
     */
    public function create()
    {
        $agama = Agama::pluck('NAMA', 'ID_AGAMA');
        $kelas = Kelas::orderBy('created_at', 'desc')->get()->pluck('nama_lengkap', 'ID_KELAS');
        $dataJenisKeluarga = JenisKeluarga::pluck('NAMA', 'ID_JENIS_KELUARGA');
        $dataKeluargaAll = KeluargaMurid::all()->pluck('nama_keluarga_lengkap', 'ID_KELUARGA_MURID');
        return view('murids.create', compact('agama', 'kelas', 'dataJenisKeluarga', 'dataKeluargaAll'));
    }

    /**
     * Store a newly created Murid in storage.
     *
     * @param CreateMuridRequest $request
     *
     * @return Response
     */
    public function store(CreateMuridRequest $request)
    {
        DB::beginTransaction();
        try {
            $dataMurid = new Murid();
            $input = $dataMurid->uploadGambar($request);
            if (!$input['EMAIL']) {
                $input['EMAIL'] = $input['NIS'] . '@pondok.com';
            }

            $murid = $this->muridRepository->create($input);
            $buatUser = User::create([
                'name' => $input['NIS'],
                'full_name' => $input['NAMA'],
                'email' => $input['EMAIL'],
                'password' => bcrypt('pondok')
            ]);

            $semester = Semester::where('STATUS', '1')->first();
            $historyKelas = new HistoryKelas();
            $historyKelas->ID_KELAS = $input['ID_KELAS'];
            $historyKelas->ID_SEMESTER = $semester->ID_SEMESTER;
            $historyKelas->NIS = $murid->NIS;
            $historyKelas->save();

            if (isset($input['_nama'])) {
                foreach ($input['_nama'] as $key => $row) {
                    if ($input['_id_keluarga_murid'][$key] !== 'undefined') {
                        $detailKeluarga = new DetailKeluarga();
                        $detailKeluarga->NIS = $murid->NIS;
                        $detailKeluarga->ID_KELUARGA_MURID = $input['_id_keluarga_murid'][$key];
                        $detailKeluarga->save();
                    } else {
                        $keluargaMurid = new KeluargaMurid();
                        $keluargaMurid->NAMA = $input['_nama'][$key];
                        $keluargaMurid->TANGGAL_LAHIR = $input['_tanggal_lahir'][$key];
                        $keluargaMurid->TEMPAT_LAHIR = $input['_tempat_lahir'][$key];
                        $keluargaMurid->ID_AGAMA = $input['_agama_id'][$key];
                        $keluargaMurid->ID_JENIS_KELUARGA = $input['_jenis_keluarga_id'][$key];
                        $keluargaMurid->ALAMAT = $input['_alamat'][$key];
                        $keluargaMurid->NOTELP = $input['_notelp'][$key];
                        $keluargaMurid->EMAIL = $input['_email'][$key];
                        $keluargaMurid->PEKERJAAN = $input['_pekerjaan'][$key];
                        $keluargaMurid->save();

                        $detailKeluarga = new DetailKeluarga();
                        $detailKeluarga->NIS = $murid->NIS;
                        $detailKeluarga->ID_KELUARGA_MURID = $keluargaMurid->ID_KELUARGA_MURID;
                        $detailKeluarga->save();
                    }
                }
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        Flash::success('Murid saved successfully.');

        return redirect(route('murids.index'));
    }

    /**
     * Display the specified Murid.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $murid = $this->muridRepository->findWithoutFail($id);

        if (empty($murid)) {
            Flash::error('Murid not found');

            return redirect(route('murids.index'));
        }

        return view('murids.show')->with('murid', $murid);
    }

    /**
     * Show the form for editing the specified Murid.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $murid = Murid::where('NIS', $id)->with(['keluargaMurid.jenisKeluarga', 'keluargaMurid.agama'])->first();
        if (empty($murid)) {
            Flash::error('Murid not found');

            return redirect(route('murids.index'));
        }

        $agama = Agama::pluck('NAMA', 'ID_AGAMA');
        $dataJenisKeluarga = JenisKeluarga::pluck('NAMA', 'ID_JENIS_KELUARGA');
        $dataKeluargaAll = KeluargaMurid::whereDoesntHave('murid', function ($q) use ($murid) {
            $q->where('murid.NIS', $murid->NIS);
        })->get()->pluck('nama_keluarga_lengkap', 'ID_KELUARGA_MURID');

        return view('murids.edit')->with(compact('murid', 'agama', 'dataJenisKeluarga', 'dataKeluargaAll'));
    }

    /**
     * Update the specified Murid in storage.
     *
     * @param  int              $id
     * @param UpdateMuridRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMuridRequest $request)
    {
        DB::beginTransaction();
        try {
            $murid = $this->muridRepository->findWithoutFail($id);

            if (empty($murid)) {
                Flash::error('Murid not found');

                return redirect(route('murids.index'));
            }

            $input = $murid->uploadGambar($request);

            $murid = $this->muridRepository->update($input, $id);
            $cekDataKeluarga = DetailKeluarga::where('NIS', $murid->NIS)->get();
            foreach ($cekDataKeluarga as $key => $value) {
                $cekKelMurid = DetailKeluarga::where('ID_KELUARGA_MURID', $value->ID_KELUARGA_MURID)->get();
                if ($cekKelMurid->count() > 1) {
                    DetailKeluarga::where(['NIS' => $murid->NIS, 'ID_KELUARGA_MURID' => $value->ID_KELUARGA_MURID])->delete();
                } else {
                    KeluargaMurid::where(['ID_KELUARGA_MURID' => $value->ID_KELUARGA_MURID])->delete();
                }
            }

            if (isset($input['_nama'])) {
                foreach ($input['_nama'] as $key => $row) {
                    if ($input['_id_keluarga_murid'][$key] !== 'undefined') {
                        $detailKeluarga = new DetailKeluarga();
                        $detailKeluarga->NIS = $murid->NIS;
                        $detailKeluarga->ID_KELUARGA_MURID = $input['_id_keluarga_murid'][$key];
                        $detailKeluarga->save();
                    } else {
                        $keluargaMurid = new KeluargaMurid();
                        $keluargaMurid->NAMA = $input['_nama'][$key];
                        $keluargaMurid->TANGGAL_LAHIR = $input['_tanggal_lahir'][$key];
                        $keluargaMurid->TEMPAT_LAHIR = $input['_tempat_lahir'][$key];
                        $keluargaMurid->ID_AGAMA = $input['_agama_id'][$key];
                        $keluargaMurid->ID_JENIS_KELUARGA = $input['_jenis_keluarga_id'][$key];
                        $keluargaMurid->ALAMAT = $input['_alamat'][$key];
                        $keluargaMurid->NOTELP = $input['_notelp'][$key];
                        $keluargaMurid->EMAIL = $input['_email'][$key];
                        $keluargaMurid->PEKERJAAN = $input['_pekerjaan'][$key];
                        $keluargaMurid->save();

                        $detailKeluarga = new DetailKeluarga();
                        $detailKeluarga->NIS = $murid->NIS;
                        $detailKeluarga->ID_KELUARGA_MURID = $keluargaMurid->ID_KELUARGA_MURID;
                        $detailKeluarga->save();
                    }
                }
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        Flash::success('Murid updated successfully.');

        return redirect(route('murids.index'));
    }

    /**
     * Remove the specified Murid from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $murid = $this->muridRepository->findWithoutFail($id);

        if (empty($murid)) {
            Flash::error('Murid not found');

            return redirect(route('murids.index'));
        }

        if (!empty($murid->FOTO)) {
            File::delete(public_path("upload/profile/" . $murid->FOTO));
        }
        if (!empty($murid->IJAZAH_SD)) {
            File::delete(public_path("upload/ijazah_sd/" . $murid->IJAZAH_SD));
        }
        if (!empty($murid->IJAZAH_SMP)) {
            File::delete(public_path("upload/ijazah_smp/" . $murid->IJAZAH_SMP));
        }
        if (!empty($murid->IJAZAH_SMA)) {
            File::delete(public_path("upload/ijazah_sma/" . $murid->IJAZAH_SMA));
        }
        if (!empty($murid->FOTO_AKTE_LAHIR)) {
            File::delete(public_path("upload/akte_lahir/" . $murid->FOTO_AKTE_LAHIR));
        }

        $this->muridRepository->delete($id);

        Flash::success('Murid deleted successfully.');

        return redirect(route('murids.index'));
    }
}
