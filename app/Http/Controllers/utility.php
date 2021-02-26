<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class utility extends Controller
{
    public function getPeriodeActive(Request $request)
    {
        $data = [];
        if (isset($_GET['search'])) {
            $data['results'] = DB::table('periode_bulan')
                ->select('id', 'periode as text')
                ->where('periode', 'like', '%' . $_GET['search'] . '%')
                ->where('pic_absen','=','-')
                ->where('pic_gaji','=','-')
                ->orderBy('id', 'asc')
                ->get();
        } else {
            $data['results'] = DB::table('periode_bulan')
                ->select('id', 'periode as text')
                ->orderBy('id', 'asc')
                ->where('pic_absen','=','-')
                ->where('pic_gaji','=','-')
                ->limit(10)
                ->get();
        }
        return $data;
    }

    public function getPeriodePenggajian(Request $request)
    {
        $data = [];
        if (isset($_GET['search'])) {
            $data['results'] = DB::table('periode_bulan')
                ->select('id', 'periode as text')
                ->where('periode', 'like', '%' . $_GET['search'] . '%')
                ->where('pic_absen','!=','-')
                ->where('pic_gaji','!=','-')
                ->orderBy('id', 'asc')
                ->get();
        } else {
            $data['results'] = DB::table('periode_bulan')
                ->select('id', 'periode as text')
                ->orderBy('id', 'asc')
                ->where('pic_absen','!=','-')
                ->where('pic_gaji','!=','-')
                ->limit(10)
                ->get();
        }
        return $data;
    }


    public function getTahun(Request $request)
    {
        $data = [];
        if (isset($_GET['search'])) {
            $data['results'] = DB::table('periode_tahun')
                ->select('id', 'tahun as text')
                ->where('tahun', 'like', '%' . $_GET['search'] . '%')
                ->orderBy('tahun', 'asc')
                ->get();
        } else {
            $data['results'] = DB::table('periode_tahun')
                ->select('id', 'tahun as text')
                ->orderBy('tahun', 'asc')
                ->limit(10)
                ->get();
        }
        return $data;
    }

    public function getDepartemen(Request $request)
    {
        $data = [];
        if (isset($_GET['search'])) {
            $data['results'] = DB::table('departemen')
                ->select('id_dept as id', 'departemen as text')
                ->where('departemen', 'like', '%' . $_GET['search'] . '%')
                ->orderBy('id_dept', 'asc')
                ->get();
        } else {
            $data['results'] = DB::table('departemen')
                ->select('id_dept as id', 'departemen as text')
                ->orderBy('id_dept', 'asc')
                ->limit(10)
                ->get();
        }
        return $data;
    }
}