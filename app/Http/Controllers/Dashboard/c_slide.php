<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\mod_slide;

class c_slide extends Controller
{
    public function get(){
        $slide = mod_slide::orderBy('created_at', 'asc')->get();
        return $slide;
    }
}
