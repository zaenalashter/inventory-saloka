<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\OpenFunction\login;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WebAktivitasKita_editdata extends Controller
{
    public function index($id) {
        $segment = \request()->segment(3);
        $permit = login::permission($segment);

        switch ($permit) {
            case 'login':
                return redirect('admin/login');
                break;

            case 'not available':
                return redirect('admin');
                break;

            default:
                $data = DB::table('web_aktivitas_kita')->where('id','=',$id)->first();
                return view('dashboard.web-component.aktivitas-kita-edit-data')
                    ->with('data',$data);
                break;
        }
    }

    public function submit(Request $request) {
        $id = $request->id;
        $judul = $request->judul;
        $shortDesc = $request->short_desc;
        $konten = $request->konten;

        try {
            DB::table('web_aktivitas_kita')
                ->where('id','=',$id)
                ->update([
                    'judul' => $judul,
                    'short_desc' => $shortDesc,
                    'content' => $konten,
                ]);
            return 'success';
        } catch (\Exception $ex) {
            return response()->json($ex);
        }
    }
}
