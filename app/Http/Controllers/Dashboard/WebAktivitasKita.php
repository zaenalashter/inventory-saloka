<?php

namespace App\Http\Controllers\Dashboard;

use App\webImages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class WebAktivitasKita extends Controller
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
                return view('dashboard.web-component.aktivitas-kita');
                break;
        }
    }

    public function list() {
        return \App\webAktivitasKita::all()->toJson();
    }

    public function add(Request $request) {
        $file = $request->file('filepond');
        $extension = $request->file('filepond')->getClientOriginalExtension();
        $username = Session::get('username');
        $judul = $request->judul;
        $shortDesc = $request->short_desc;
        $konten = $request->konten;

        try {
            $id = Uuid::uuid1()->toString();
            $fileName = $id.'.'.$extension;

            Storage::putFileAs('public', $file, $fileName);

            $aktivitas = new \App\webAktivitasKita();
            $aktivitas->judul = $judul;
            $aktivitas->short_desc = $shortDesc;
            $aktivitas->content = $konten;
            $aktivitas->image = $fileName;
            $aktivitas->username = $username;
            $aktivitas->save();
        } catch (\Exception $ex) {
            return response()->json($ex);
        }

        return 'success';
    }
}
