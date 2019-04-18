<?php

namespace App\Http\Controllers;

use App\DataTables\TingkatDataTable;
use App\Http\Requests\CreateTingkatRequest;
use App\Http\Requests\UpdateTingkatRequest;
use App\Repositories\TingkatRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TingkatController extends AppBaseController
{
    /** @var  TingkatRepository */
    private $tingkatRepository;

    public function __construct(TingkatRepository $tingkatRepo)
    {
        $this->tingkatRepository = $tingkatRepo;
    }

    /**
     * Display a listing of the Tingkat.
     *
     * @param TingkatDataTable $tingkatDataTable
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $tingkats = $this->tingkatRepository->all();
            return DataTables::of($tingkats)
                ->addColumn('action', 'tingkats.datatables_actions')
                ->editColumn('KODE_LULUS', function ($tingkats) {
                    if ($tingkats->KODE_LULUS == 0) {
                        return '<span class="label label-primary"> ----- </span>';
                    } elseif ($tingkats->KODE_LULUS == 1) {
                        return '<span class="label label-primary"> Ibtidaiyah </span>';
                    } elseif ($tingkats->KODE_LULUS == 2) {
                        return '<span class="label label-primary"> Tsanawiyah </span>';
                    } elseif ($tingkats->KODE_LULUS == 3) {
                        return '<span class="label label-primary"> Aliyah </span>';
                    }
                })
                ->editColumn('SETARA', function ($tingkats) {
                    if ($tingkats->SETARA == 0) {
                        return '-----';
                    } elseif ($tingkats->SETARA == 1) {
                        return 'Ibtidaiyah';
                    } elseif ($tingkats->SETARA == 2) {
                        return 'Tsanawiyah';
                    } elseif ($tingkats->SETARA == 3) {
                        return 'Aliyah';
                    }
                })
                ->rawColumns(['KODE_LULUS', 'action'])
                ->make();
        }
        return view('tingkats.index');
    }

    /**
     * Show the form for creating a new Tingkat.
     *
     * @return Response
     */
    public function create()
    {
        return view('tingkats.create');
    }

    /**
     * Store a newly created Tingkat in storage.
     *
     * @param CreateTingkatRequest $request
     *
     * @return Response
     */
    public function store(CreateTingkatRequest $request)
    {
        $input = $request->all();

        $tingkat = $this->tingkatRepository->create($input);

        Flash::success('Tingkat saved successfully.');

        return redirect(route('tingkats.index'));
    }

    /**
     * Display the specified Tingkat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tingkat = $this->tingkatRepository->findWithoutFail($id);

        if (empty($tingkat)) {
            Flash::error('Tingkat not found');

            return redirect(route('tingkats.index'));
        }

        return view('tingkats.show')->with('tingkat', $tingkat);
    }

    /**
     * Show the form for editing the specified Tingkat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tingkat = $this->tingkatRepository->findWithoutFail($id);

        if (empty($tingkat)) {
            Flash::error('Tingkat not found');

            return redirect(route('tingkats.index'));
        }

        return view('tingkats.edit')->with('tingkat', $tingkat);
    }

    /**
     * Update the specified Tingkat in storage.
     *
     * @param  int              $id
     * @param UpdateTingkatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTingkatRequest $request)
    {
        $tingkat = $this->tingkatRepository->findWithoutFail($id);

        if (empty($tingkat)) {
            Flash::error('Tingkat not found');

            return redirect(route('tingkats.index'));
        }

        $tingkat = $this->tingkatRepository->update($request->all(), $id);

        Flash::success('Tingkat updated successfully.');

        return redirect(route('tingkats.index'));
    }

    /**
     * Remove the specified Tingkat from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tingkat = $this->tingkatRepository->findWithoutFail($id);

        if (empty($tingkat)) {
            Flash::error('Tingkat not found');

            return redirect(route('tingkats.index'));
        }

        $this->tingkatRepository->delete($id);

        Flash::success('Tingkat deleted successfully.');

        return redirect(route('tingkats.index'));
    }
}
