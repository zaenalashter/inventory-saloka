<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\mod_tipe;

class c_tipe extends Controller
{
    public function get(){
        $tipe = mod_tipe::orderBy('nama', 'asc')->get();
        return $tipe;
    }
}
