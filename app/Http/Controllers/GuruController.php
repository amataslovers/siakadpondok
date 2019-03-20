<?php

namespace App\Http\Controllers;

use App\DataTables\GuruDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateGuruRequest;
use App\Http\Requests\UpdateGuruRequest;
use App\Repositories\GuruRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use DB;
use App\Models\Agama;
use App\User;

class GuruController extends AppBaseController
{
    /** @var  GuruRepository */
    private $guruRepository;

    public function __construct(GuruRepository $guruRepo)
    {
        $this->guruRepository = $guruRepo;
    }

    /**
     * Display a listing of the Guru.
     *
     * @param GuruDataTable $guruDataTable
     * @return Response
     */
    public function index(GuruDataTable $guruDataTable)
    {
        return $guruDataTable->render('gurus.index');
    }

    /**
     * Show the form for creating a new Guru.
     *
     * @return Response
     */
    public function create()
    {
        $agama = Agama::pluck('NAMA', 'ID_AGAMA');
        return view('gurus.create', compact('agama'));
    }

    /**
     * Store a newly created Guru in storage.
     *
     * @param CreateGuruRequest $request
     *
     * @return Response
     */
    public function store(CreateGuruRequest $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $nip = $input['NIP_GURU'];
            if (!$input['EMAIL']) {
                $input['EMAIL'] = $nip.'@pondok.com';
            }
            $buatUser = User::create([
                'name' => $nip,
                'full_name' => $input['NAMA'],
                'email' => $input['EMAIL'],
                'password' => bcrypt('gurupondok')
            ]);
            
            if ($request->file('FOTO')) {
                $input['FOTO'] = $nip.'-'.date('d-m-Y').'.'.request()->FOTO->getClientOriginalExtension();
                $image = $request->file('FOTO');
                $image->move(public_path('upload/profile/'), $input['FOTO']);
            }

            $guru = $this->guruRepository->create($input);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        Flash::success('Guru saved successfully.');

        return redirect(route('gurus.index'));
    }

    /**
     * Display the specified Guru.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $guru = $this->guruRepository->findWithoutFail($id);

        if (empty($guru)) {
            Flash::error('Guru not found');

            return redirect(route('gurus.index'));
        }

        return view('gurus.show')->with('guru', $guru);
    }

    /**
     * Show the form for editing the specified Guru.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $guru = $this->guruRepository->findWithoutFail($id);

        if (empty($guru)) {
            Flash::error('Guru not found');

            return redirect(route('gurus.index'));
        }

        $agama = Agama::pluck('NAMA', 'ID_AGAMA');
        return view('gurus.edit')->with(compact('guru', 'agama'));
    }

    /**
     * Update the specified Guru in storage.
     *
     * @param  int              $id
     * @param UpdateGuruRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGuruRequest $request)
    {
        $guru = $this->guruRepository->findWithoutFail($id);

        if (empty($guru)) {
            Flash::error('Guru not found');

            return redirect(route('gurus.index'));
        }

        $input = $request->all();
        $nip = $input['NIP_GURU'];
        if($request->file('FOTO')){
            if (!empty($guru->FOTO)) {
                File::delete(public_path("upload/profile/".$guru->FOTO));
            }
            $input['FOTO'] = $nip.'-'.date('d-m-Y').'.'.request()->FOTO->getClientOriginalExtension();
            $image = $request->file('FOTO');
            $image->move(public_path('upload/profile/'), $input['FOTO']);
        }

        $guru = $this->guruRepository->update($input, $id);

        Flash::success('Guru updated successfully.');

        return redirect(route('gurus.index'));
    }

    /**
     * Remove the specified Guru from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $guru = $this->guruRepository->findWithoutFail($id);

        if (empty($guru)) {
            Flash::error('Guru not found');

            return redirect(route('gurus.index'));
        }

        if (!empty($guru->FOTO)) {
            File::delete(public_path("upload/profile/".$guru->FOTO));
        }

        $this->guruRepository->delete($id);

        Flash::success('Guru deleted successfully.');

        return redirect(route('gurus.index'));
    }
}
