<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mod_storehouse;

class c_storehouse extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data_store = \App\mod_storehouse::all();
        return view('inventory-config.storehouse', compact ('data_store'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('storehouse.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \App\mod_storehouse::create($request->all());
        return redirect('/storehouse')->with('success', 'Data Disimpan!');
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
        $data_store=\App\mod_storehouse::all();
        $data_edit=\App\mod_storehouse::find($id);
        return view('inventory-config.storehouse',compact('data_store','data_edit'));
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
        $data_edit = \App\mod_storehouse::find($id);
        $data_edit->update($request->all());
        return \redirect('/storehouse')->with(''); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $storehouse = \App\mod_storehouse::find($id);
        $storehouse->delete();
        return redirect('/storehouse')->with('success', ' deleted!');
    }
}
