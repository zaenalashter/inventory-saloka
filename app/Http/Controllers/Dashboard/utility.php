<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class utility extends Controller
{
    public function kota(Request $request)
    {
        $data = [];
        if (isset($_GET['search'])) {
            $data['results'] = DB::table('ms_kota')
                ->select('id', 'nama as text')
                ->where('ms_kota', 'like', '%' . $_GET['search'] . '%')
                ->orderBy('jabtan', 'asc')
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


}