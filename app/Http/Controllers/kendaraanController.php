<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\kendaraan;

class kendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kendaraans = Kendaraan::latest()->paginate(20);
        return view('kendaraan.index', compact('kendaraans'))->with('i', (request()->input('page', 1) -1) *20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kendaraan.create');
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
            'kode_kendaraan' => 'required',
            'nama_kendaraan' => 'required',
            'merek_kendaraan' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'ket' => 'required',
            'gambar' => 'required',
        ]);

        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();

        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);

        Kendaraan::create([
            'kode_kendaraan' => $request->kode_kendaraan,
            'nama_kendaraan' => $request->nama_kendaraan,
            'merek_kendaraan' => $request->merek_kendaraan,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'ket' => $request->ket,
            'gambar' => $nama_file,
        ]);
        return redirect() -> route('kendaraan.index')
                            -> with('success', 'Data Kendaraan Berhasil Disimpan');
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
    public function edit(Kendaraan $kendaraan)
    {
        return view('kendaraan.edit', compact('kendaraan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kendaraan $kendaraan)
    {
        $request->validate([
            'kode_kendaraan' => 'required',
            'nama_kendaraan' => 'required',
            'merek_kendaraan' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'ket' => 'required',
        ]);
    
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dan tambahkan gambar baru jika diinput
                $image = $kendaraan->gambar;
                // Jika file gambar terdapat pada folder data_file maka hapus gambar yang lama
                if(file_exists(public_path('data_file/'.$image))) {
                    unlink(public_path('data_file/' . $kendaraan->gambar));                      
                }
            $file = $request->file('gambar');
            $nama_file = time() . '_' . $file->getClientOriginalName();
    
            $tujuan_upload = 'data_file';
    
            $file->move($tujuan_upload, $nama_file);
    
        } else {
            // Gunakan Gambar yang sudah ada
            $nama_file = $kendaraan->gambar;
        }
        
        $kendaraan->update([
                'kode_kendaraan' => $request->kode_kendaraan,
                'nama_kendaraan' => $request->nama_kendaraan,
                'merek_kendaraan' => $request->merek_kendaraan,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'ket' => $request->ket,
                'gambar' => $nama_file,
            ]);

        return redirect()->route('kendaraan.index')->with('success', 'Data Kendaraan Berhasil di Edit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(kendaraan $kendaraan)
    {
        $gambar = $kendaraan->gambar;
        if(file_exists(!public_path('data_file/'.$gambar))) {
            $kendaraan->delete();
        } else {
            unlink(public_path('data_file/'.$gambar));
            $kendaraan->delete();
        }
        return redirect()->route('kendaraan.index')
                        ->with('success', 'Data Berhasil Dihapus');
    }
}
