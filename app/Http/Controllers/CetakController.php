<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryKelas;
use Yajra\DataTables\DataTables;
use PDF;

class CetakController extends Controller
{
    public function lihatRapot(Request $request)
    {
        if ($request->ajax()) {
            $murid = HistoryKelas::whereHas('nilaiAkademik')
                ->with([
                    'murid:NIS,NAMA',
                    'kelas.tingkat:ID_TINGKAT,TINGKAT',
                    'semester:ID_SEMESTER,SEMESTER'
                ])
                ->get();
            return DataTables::of($murid)
                ->addIndexColumn()
                ->addColumn('action', 'rapot.datatables_actions')
                ->make();
        }

        return view('rapot.index');
    }

    public function downloadRapot($id)
    {
        $murid = HistoryKelas::where('ID_HISTORY_KELAS', $id)
            ->with([
                'murid',
                'kelas.tingkat',
                'semester',
                'nilaiAkademik.pengampu.mataPelajaran',
                'nilaiKarakter'
            ])->first();

        if (empty($murid)) {
            Flash::error('Catatan Spp not found');

            return redirect(route('cetakRapotIndex'));
        }

        $pdf = PDF::loadView('rapot.templateRapot', compact('murid'))->setPaper('legal', 'portrait');
        return $pdf->stream();
    }
}
