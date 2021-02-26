<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\OpenFunction\login;
use App\webGeneralInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VisiMisi extends Controller
{
    public function index() {
        $segment = \request()->segment(3);
        $permit = login::permission($segment);

        switch ($permit) {
            case 'login':
                return redirect('admin/login');
                break;

            // case 'not available':
            //     return redirect('admin');
            //     break;

            default:
                return view('dashboard.web-component.visi-misi.visi-misi');
                break;
        }
    }

    public function list() {
        try {
            $result['visi'] = DB::table('web_general_info')
                ->where('section','=','visi')
                ->first();
                $result['misi'] = DB::table('web_general_info')
                ->where('section','=','misi')
                ->first();
            return $result;
        } catch (\Exception $ex) {
            return response()->json($ex);
        }
    }

    public function save(Request $request) {
        try {
            DB::table('web_general_info')
            ->where('section','=','visi')->delete();
            DB::table('web_general_info')
            ->where('section','=','misi')->delete();

            $data = new webGeneralInfo();
            $data->section = 'visi';
            $data->type = '';
            $data->data = $request->visi;
            $data->save();
            
            $misi = new webGeneralInfo();
            $misi->section = 'misi';
            $misi->type = '';
            $misi->data = $request->misi;
            $misi->save();

            return 'success';
        } catch (\Exception $ex) {
            return response()->json($ex);
        }
    }
}
