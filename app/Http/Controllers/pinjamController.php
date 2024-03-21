<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;
use App\Models\Kendaraan;
use App\Models\customer;
use Illuminate\support\Facades\DB;
class pinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjams = DB::table('pinjam')
                        -> join('tbl_kendaraan', 'tbl_kendaraan.kode_kendaraan', '=', 'pinjam.kode_kendaraan')
                        ->get();
        $sums = DB::table('pinjam')
                    ->sum('total');
        return view('pinjam.index', compact('pinjams', 'sums'))->with('i');
    }

    public function __invoke(Request $request)
    {
       $dari = $request->input('dari');
       $sampai = $request->input('sampai');
       $query = "tgl_pinjam BETWEEN '".$dari."' and '".$sampai."'";
       $pinjams = DB::table('pinjam')
                        -> join('tbl_kendaraan', 'tbl_kendaraan.kode_kendaraan', '=', 'pinjam.kode_kendaraan')
                        ->whereRaw($query)
                        ->get();
        $sums = DB::table('pinjam')
                ->whereRaw($query)
                ->sum('total');
        return view('pinjam.index', compact('pinjams', 'sums'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kendaraans = Kendaraan::all();
        $customers = Customer::all();
        $pinjam = Pinjam::all(); // Pastikan penulisan model "Customer" sesuai dengan model yang sebenarnya
        return view('pinjam.create', compact('kendaraans', 'customers', 'pinjam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_ref' => 'required',
            'nm_customer' => 'required',
            'kode_kendaraan' => 'required',
            'jumlah_pinjam' => 'required',
            'lama_pinjam' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'total' => 'required',
        ]);
        Pinjam::create($request->all());
        return redirect()->route('pinjam.index')->with('success', 'Data Pinjam Kendaraan Berhasil Disimpan');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pinjam $pinjam)
    {
        $kendaraans = Kendaraan::all();
        $customers = Customer::all();
        return view('pinjam.edit', compact('pinjam', 'kendaraans', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pinjam $pinjam)
    {
        $request->validate([
            'no_ref' => 'required',
            'no_cus' => 'required',
            'nm_customer' => 'required',
            'kode_kendaraan' => 'required',
            'jumlah_pinjam' => 'required',
            'sisa_stok' => 'required',
            'lama_pinjam' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'diskon' => 'required',
            'total' => 'required',
        ]);
        $pinjam->update($request->all());
        return redirect()->route('pinjam.index')->with('success', 'Data Pinjam Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pinjam $pinjam)
    {
        $pinjam->delete();
        return redirect()->route('pinjam.index')->with('success', 'Data Pinjam Berhasil Dihapus');

    }
}
