<?php

namespace App\Http\Controllers\OpenFunction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class login extends Controller
{
    public static function permission($segment) {
        if (Session::exists('username')) {
            $permission = DB::table('sys_permission')
                ->select('username','id_menu')
                ->join('sys_menu','sys_menu.id','=','sys_permission.id_menu')
                ->where('sys_menu.segment_name','=',$segment);
            if ($permission->exists()) {
                return 'true';
            } else {
                return 'not available';
            }
        } else {
            return 'page login';
        }
    }
}
