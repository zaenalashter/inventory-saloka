<?php

namespace App\Http\Controllers\Dashboard;

use App\webGeneralInfo;
use App\webImages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WebAboutUsController extends Controller
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
                return view('dashboard.web-component.about-us');
                break;
        }
    }

    public function list() {
        try {
            $image = DB::table('web_image')->where('section','=','about-us')->first();
            $info = DB::table('web_general_info')->where('section','=','about-us')->first();

            $result = [
                'image' => $image->filename,
                'text' => $info->data,
            ];
        } catch (\Exception $ex) {
            return response()->json($ex);
        }
        return json_encode($result);
    }

    public function editorData() {
        try {
            $info = DB::table('web_general_info')->where('section','=','about-us')->first();
            return $info->data;
        } catch (\Exception $ex) {
            return response()->json($ex);
        }
    }

    public function upload(Request $request) {
        $file = $request->file('filepond');
        $extension = $request->file('filepond')->getClientOriginalExtension();

        try {
            $fileName = 'about-us.'.$extension;
            Storage::disk('public')->delete(['about-us.jpg','about-us.png']);
            DB::table('web_image')->where('section','=','about-us')->delete();

            Storage::putFileAs('public', $file, $fileName);

            $image = new webImages();
            $image->section = 'about-us';
            $image->area = '';
            $image->filename = Storage::url($fileName);
            $image->info = '';
            $image->save();
        } catch (\Exception $ex) {
            return response()->json($ex);
        }

        return 'success';
    }

    public function save(Request $request) {
        $editor = $request->editor;

        try {
            DB::table('web_general_info')->where('section','=','about-us')->delete();
            $info = new webGeneralInfo();
            $info->section = 'about-us';
            $info->area = '';
            $info->type = '';
            $info->data = $editor;
            $info->save();
        } catch (\Exception $ex) {
            return response()->json($ex);
        }

        return 'success';
    }
}
