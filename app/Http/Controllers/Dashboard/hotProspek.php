<?php

namespace App\Http\Controllers\Dashboard;

use App\webRumahDijual;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class hotProspek extends Controller
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
                $info['marketer'] = DB::table('ms_marketer')->get()->toArray();
                $info['lister'] = DB::table('ms_lister')->get()->toArray();
                $info['jenis-properti'] = \App\msJenisProperti::all();
                $info['kota'] = \App\msKota::all();
                $info['area'] = \App\msArea::all();
                return view('dashboard.web-component.input-hot-sale')->with('info',$info);
                break;
        }
    }

    public function list() {
        try {
            
            // $rumah = \App\webRumahDijual::all();
            $rumah = DB::table('ms_store')
            ->select('ms_store.id as id','sys_user_profile.full_name as pic','ms_store.judul as judul','ms_kota.nama as kota','ms_area.nama as area','ms_store.desc_property as detail','ms_store.harga as harga','ms_store.status as tipeBeli','ms_store.hotSale as hotSale')
            ->join('ms_area','ms_area.id','=','ms_store.id_area')
            ->join('ms_kota','ms_kota.id','=','ms_store.id_kota')
           ->join('sys_user','sys_user.id','=','ms_store.id_pic')
           ->join('sys_user_profile','sys_user_profile.username','=','sys_user.username')
              
                ->where('is_del','=',0)
                ->orderBy('ms_store.hotSale','desc')
                ->get();
            return json_encode($rumah);
        } catch (\Exception $ex) {
            return response()->json($ex);
        }
    }

    public function lister() {
        try {
            $rumah = DB::table('ms_lister')
                ->select('id','fullname')
                ->get();

            $result = [];
            foreach ($rumah as $r) {
                $result[] = [
                    'text' => $r->fullname,
                    'value' => $r->id,
                ];
            }
            return json_encode($result);
        } catch (\Exception $ex) {
            return response()->json($ex);
        }
    }

   

    public function updateStatusHotProspek(Request $request) {
        try {
            DB::table('ms_store')
                ->where('id','=',$request->id)
                ->update([
                    'hotSale' => '1'
                ]);
            return 'success';
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
    }
    public function updateStatusNormal(Request $request) {
        try {
            DB::table('ms_store')
                ->where('id','=',$request->id)
                ->update([
                    'hotSale' => '0'
                ]);
            return 'success';
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
    }
}
