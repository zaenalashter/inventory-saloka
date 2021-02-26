<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Utilitis extends Controller
{
    public function kota(Request $request)
    {
        $data = [];
        if (isset($_GET['search'])) {
            $data['results'] = DB::table('ms_kota')
                ->select('id', 'nama as text')
                ->where('nama', 'like', '%' . $_GET['search'] . '%')
                ->orderBy('nama', 'asc')
                ->get();
        } else {
            $data['results'] = DB::table('ms_kota')
                ->select('id', 'nama as text')
                ->orderBy('nama', 'asc')
                ->limit(10)
                ->get();
        }
        return $data;
    }

    public function area($id)
    {
        $data = [];
        if (isset($_GET['search'])) {
            $data['results'] = DB::table('ms_area')
                ->select('id', 'nama as text')
                ->where('id_kota','=',$id)
                ->where('nama', 'like', '%' . $_GET['search'] . '%')
                ->orderBy('nama', 'asc')
                ->get();
        } else {
            $data['results'] = DB::table('ms_area')
                ->select('id', 'nama as text')
                ->where('id_kota','=',$id)
                ->orderBy('nama', 'asc')
                ->limit(10)
                ->get();
        }
        return $data;
    }
}