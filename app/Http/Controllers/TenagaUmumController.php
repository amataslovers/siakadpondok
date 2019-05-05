<?php

namespace App\Http\Controllers;

use App\DataTables\TenagaUmumDataTable;
use App\Http\Requests\CreateTenagaUmumRequest;
use App\Http\Requests\UpdateTenagaUmumRequest;
use App\Repositories\TenagaUmumRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Agama;
use DB;
use File;
use App\User;

class TenagaUmumController extends AppBaseController
{
    /** @var  TenagaUmumRepository */
    private $tenagaUmumRepository;

    public function __construct(TenagaUmumRepository $tenagaUmumRepo)
    {
        $this->tenagaUmumRepository = $tenagaUmumRepo;
        $this->middleware('permission:tenaga-umum-view');
        $this->middleware('permission:tenaga-umum-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:tenaga-umum-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:tenaga-umum-delete', ['only' => ['destroy']]);
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
        $agama = Agama::pluck('NAMA', 'ID_AGAMA');
        return view('tenaga_umums.create', compact('agama'));
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
        request()->validate([
            'NIP' => 'required|unique:tenaga_umum,NIP'
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            $nip = $input['NIP'];
            if (!$input['EMAIL']) {
                $input['EMAIL'] = $nip . '@pondok.com';
            }
            $buatUser = User::create([
                'name' => $nip,
                'full_name' => $input['NAMA'],
                'email' => $input['EMAIL'],
                'password' => bcrypt('tupondok')
            ]);
            $buatUser->assignRole('tenaga-umum');

            if ($request->file('FOTO')) {
                $input['FOTO'] = $nip . '-' . date('d-m-Y') . '.' . request()->FOTO->getClientOriginalExtension();
                $image = $request->file('FOTO');
                $image->move(public_path('upload/profile/'), $input['FOTO']);
            }

            $tenagaUmum = $this->tenagaUmumRepository->create($input);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

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

        $agama = Agama::pluck('NAMA', 'ID_AGAMA');
        return view('tenaga_umums.show')->with(compact('tenagaUmum', 'agama'));
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

        $agama = Agama::pluck('NAMA', 'ID_AGAMA');
        return view('tenaga_umums.edit')->with(compact('tenagaUmum', 'agama'));
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
        request()->validate([
            'NIP' => 'required|unique:tenaga_umum,NIP,' . $id . ',NIP'
        ]);
        DB::transaction(function () use ($id, $request) {
            $tenagaUmum = $this->tenagaUmumRepository->findWithoutFail($id);

            if (empty($tenagaUmum)) {
                Flash::error('Tenaga Umum not found');

                return redirect(route('tenagaUmums.index'));
            }

            $input = $request->all();
            $nip = $input['NIP'];
            if ($request->file('FOTO')) {
                if (!empty($tenagaUmum->FOTO)) {
                    File::delete(public_path("upload/profile/" . $tenagaUmum->FOTO));
                }
                $input['FOTO'] = $nip . '-' . date('d-m-Y') . '.' . request()->FOTO->getClientOriginalExtension();
                $image = $request->file('FOTO');
                $image->move(public_path('upload/profile/'), $input['FOTO']);
            }

            $tenagaUmum = $this->tenagaUmumRepository->update($input, $id);
        });

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
        DB::transaction(function () use ($id) {
            $tenagaUmum = $this->tenagaUmumRepository->findWithoutFail($id);

            if (empty($tenagaUmum)) {
                Flash::error('Tenaga Umum not found');

                return redirect(route('tenagaUmums.index'));
            }

            if (!empty($tenagaUmum->FOTO)) {
                File::delete(public_path("upload/profile/" . $tenagaUmum->FOTO));
            }

            $this->tenagaUmumRepository->delete($id);
        });

        Flash::success('Tenaga Umum deleted successfully.');

        return redirect(route('tenagaUmums.index'));
    }
}
