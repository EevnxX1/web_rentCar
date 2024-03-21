<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Customer;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = customer::latest()->paginate(20);
        return view('customer.index', compact('customers'))->with('i', (request()->input('page', 1) -1) *20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
            'nik_customer' => 'required',
            'nama_customer' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
        ]);
        Customer::create($request->all());
        return redirect()->route('customer.index')->with('success', 'Data Customer Berhasil Di Simpan');
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
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'nik_customer' => 'required',
            'nama_customer' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
        ]);
        $customer->update($request->all());
        return redirect()->route('customer.index')->with('success', 'Data Customer Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Data Berhasil Dihapus');
    }
}
