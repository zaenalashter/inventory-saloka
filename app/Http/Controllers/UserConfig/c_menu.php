<?php

namespace App\Http\Controllers;
use App\mod_usermenu;

use Illuminate\Http\Request;

class c_menu extends Controller
{
    public function data(Request $request)
    {
        $data_menu = \App\mod_usermenu::all();
        return view('user-config.menu', compact ('data_menu'));
    }
    public function create(Request $request)
    {
        \App\mod_usermenu::create($request->all());
        return \redirect('/admin/user-config/menu')->with('');
    }
    public function edit($id)
    {
        $data_menu = \App\mod_usermenu::find($id);
        return \view('/admin/user-config/menu',['data_menu'=>$data_menu]);
    }
    public function update(Request $request,$id)
    {
        $data_menu = \App\mod_usermenu::find($id);
        $data_menu->update($request->all());
        return \redirect('/admin/user-config/menu')->with('');
    }
    
    public function delete($id)
    {
        $data_menu = \App\mod_usermenu::find($id);
        $data_menu->delete();
        return \redirect('/admin/user-config/menu')->with('');
    }
}

