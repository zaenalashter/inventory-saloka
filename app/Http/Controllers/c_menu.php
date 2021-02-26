<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mod_usermenu;

class c_menu extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data_menu = \App\mod_usermenu::all();
        return view('user-config.menu', compact ('data_menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('menu.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \App\mod_usermenu::create($request->all());
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
        $data_menu = \App\mod_usermenu::all();
        $data_edit = \App\mod_usermenu::find($id);
        return \view('user-config.menu',compact('data_menu','data_edit'));
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
        $data_edit = \App\mod_usermenu::find($id);
        $data_edit->update($request->all());
        return \redirect('/menu')->with('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_menu = \App\mod_usermenu::find($id);
        $data_menu->delete();
        return redirect('/menu')->with('success', ' deleted!');
    }
}
