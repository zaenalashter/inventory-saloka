<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_supplier extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data_supplier = \App\mod_supplier::all();
        return view('inventory-config.supplier', compact ('data_supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('supplier.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \App\mod_supplier::create($request->all());
        return redirect('/menu')->with('success', 'Data Disimpan!');
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
    public function edit($id)
    {
        $data_supplier = \App\mod_supplier::all();
        $data_edit = \App\mod_supplier::find($id);
        return \view('inventory-config.supplier',compact('data_supllier','data_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_edit = \App\mod_supplier::find($id);
        $data_edit->update($request->all());
        return \redirect('/supplier')->with('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_supplier = \App\mod_supplier::find($id);
        $data_supplier->delete();
        return redirect('/supplier')->with('success', ' deleted!');
    }
}
