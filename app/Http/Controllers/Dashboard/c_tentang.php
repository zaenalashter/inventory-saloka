<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\mod_tentang_kami;

class c_tentang extends Controller
{
    public function get(){
        $tentang = mod_tentang_kami::orderBy('nama', 'asc')->get();
        return $tentang;
    }
    public function detail($id){
        $tentangdetail = mod_tentang_kami::where('id','=',$id)->orderBy('created_at', 'asc')->first();
        return $tentangdetail;
    }
}
