<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Murid;
use App\Models\Guru;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $murid = Murid::where('STATUS_AKTIF', 1)->get()->count();
        $guru = Guru::all()->count();
        if ($request->ajax()) {
            $tahun = Murid::select('ANGKATAN')->groupBy('ANGKATAN')->get();
            $baru = collect();
            foreach ($tahun as $value) {
                $baru->push(['murid' => Murid::where('ANGKATAN', $value->ANGKATAN)->count()]);
            }
            return response()->json(['murid' => $baru, 'tahun' => $tahun]);
        }
        return view('home')->with(compact(['murid', 'guru']));
    }
}
