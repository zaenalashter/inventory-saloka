<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MsJenisProperti extends Controller
{
    public function index() {
        $segment = \request()->segment(3);
        $permit = \App\Http\Controllers\OpenFunction\login::permission($segment);

        switch ($permit) {
            case 'login':
                return redirect('admin/login');
                break;

            case 'not available':
                return redirect('admin');
                break;

            default:
                $jenis = \App\msJenisProperti::all();
                return view('dashboard.master-data.jenis-properti')->with('info',$jenis);
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

            case 'not available':
                return redirect('admin');
                break;

            default:
                $jenis = \App\msJenisProperti::all();
                return view('dashboard.master-data.jenis-properti_add')->with('info',$jenis);
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

            case 'not available':
                return redirect('admin');
                break;

            default:
                $jenis = \App\msJenisProperti::find($id);
                return view('dashboard.master-data.jenis-properti_edit')->with('info',$jenis);
                break;
        }
    }

    public function addSubmit(Request $request) {
        $jenis = $request->jenis_properti;
        try {
            $jP = new \App\msJenisProperti();
            $jP->nama = $jenis;
            $jP->save();
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
        return 'success';
    }

    public function editSubmit(Request $request) {
        $id = $request->id;
        $jenis = $request->jenis_properti;
        try {
            DB::table('ms_tipe_properti')
                ->where('id','=',$id)
                ->update([
                    'nama' => $jenis
                ]);
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
        return 'success';
    }

    public function delete(Request $request) {
        try {
            DB::table('ms_tipe_properti')
                ->where('id','=',$request->id)
                ->delete();
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
        return 'success';
    }
}
