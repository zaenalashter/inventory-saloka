<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\mod_visi_misi;

class c_visimisi extends Controller
{
    public function get(){
        $vm = mod_visi_misi::orderBy('created_at', 'asc')->get();
        return $vm;
    }
}
