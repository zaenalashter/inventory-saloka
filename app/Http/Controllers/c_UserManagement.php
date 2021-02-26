<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_UserManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data_user = \App\mod_user::all();
        return view('user-config.user', compact ('data_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \App\mod_user::create($request->all());
        return redirect('/user')->with('success', 'Data Disimpan!');
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
        $data_user = \App\mod_user::all();
        $data_edit = \App\mod_user::find($id);
        return \view('user-config.user',compact('data_user','data_edit'));
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
        $data_edit = \App\mod_user::find($id);
        $data_edit->update($request->all());
        return \redirect('/user')->with('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_user = \App\mod_user::find($id);
        $data_user->delete();
        return redirect('/user')->with('success', ' deleted!');
    }
}
