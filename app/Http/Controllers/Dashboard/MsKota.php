<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MsKota extends Controller
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
                $kota = \App\msKota::all();
                return view('dashboard.master-data.kota.list')->with('info',$kota);
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
                $kota = \App\msKota::all();
                return view('dashboard.master-data.kota.baru')->with('info',$kota);
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
                $kota = \App\mskota::find($id);
                return view('dashboard.master-data.kota.edit')->with('info',$kota);
                break;
        }
    }

    public function addSubmit(Request $request) {
        $kota = $request->namaKota;
        try {
            $jP = new \App\msKota();
            $jP->nama = $kota;
            $jP->save();
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
        return 'success';
    }

    public function editSubmit(Request $request) {
        $id = $request->id;
        $kota = $request->namaKota;
        try {
            DB::table('ms_kota')
                ->where('id','=',$id)
                ->update([
                    'nama' => $kota
                ]);
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
        return 'success';
    }

    public function delete(Request $request) {
        try {
            DB::table('ms_kota')
                ->where('id','=',$request->id)
                ->delete();
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
        return 'success';
    }
}
