<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MsArea extends Controller
{
    public function index() {
        $segment = \request()->segment(3);
        $permit = \App\Http\Controllers\OpenFunction\login::permission($segment);

        switch ($permit) {
            case 'login':
                return redirect('admin/login');
                break;

            // case 'not available':
            //     return redirect('admin');
            //     break;

            default:
                // $area = \App\msArea::all();
                $area = DB::table('ms_area')
                ->select('ms_area.id as id', 'ms_kota.nama as id_kota','ms_area.nama as nama')
                ->join('ms_kota','ms_kota.id','=','ms_area.id_kota')
                ->get();
                return view('dashboard.master-data.area.list')->with('info',$area);
                break;
        }
    }

    public function add() {
        $segment = \request()->segment(3);
        $permit = \App\Http\Controllers\OpenFunction\login::permission($segment);

        switch ($permit) {
            case 'login':
                return redirect('admin/login');
                break;

            // case 'not available':
            //     return redirect('admin');
            //     break;

            default:
             
                $kota['kota'] = \App\msKota::all();
                return view('dashboard.master-data.area.baru')->with('info',$kota);
                break;
        }
    }

    public function edit($id) {
        $segment = \request()->segment(3);
        $permit = \App\Http\Controllers\OpenFunction\login::permission($segment);

        switch ($permit) {
            case 'login':
                return redirect('admin/login');
                break;

            // case 'not available':
            //     return redirect('admin');
            //     break;

            default:
                // $area = \App\msarea::find($id);
                $area = DB::table('ms_area')
                ->select('ms_area.id as id', 'ms_kota.nama as id_kota','ms_area.nama as nama')
                ->join('ms_kota','ms_kota.id','=','ms_area.id_kota')
                ->first();
                return view('dashboard.master-data.area.edit')->with('info',$area);
                break;
        }
    }

    public function addSubmit(Request $request) {
        $area = $request->namaArea;
        $kota = $request->kota;
        try {
            $jP = new \App\msArea();
            $jP->id_kota = $kota;
            $jP->nama = $area;
            $jP->save();
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
        return 'success';
    }

    public function editSubmit(Request $request) {
        $id = $request->id;
        $area = $request->namaArea;
        try {
            DB::table('ms_area')
                ->where('id','=',$id)
                ->update([
                    'nama' => $area
                ]);
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
        return 'success';
    }

    public function delete(Request $request) {
        try {
            DB::table('ms_area')
                ->where('id','=',$request->id)
                ->delete();
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
        return 'success';
    }
}
