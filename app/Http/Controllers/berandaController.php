<?php

namespace App\Http\Controllers;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class berandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $kendaraans = Kendaraan::select(DB::raw('stok'), 
        DB::raw('nama_kendaraan'))->pluck('stok', 'nama_kendaraan');

        $lbl = $kendaraans->keys();
        $dt = $kendaraans->values();

        return view('welcome', compact('lbl', 'dt'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
