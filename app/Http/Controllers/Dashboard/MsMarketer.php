<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class MsMarketer extends Controller
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
                return view('dashboard.master-data.marketer');
                break;
        }
    }

    public function list() {
        try {
            $lister['data'] = \App\msMarketer::all();
            return json_encode($lister);
        } catch (\Exception $ex) {
            return response()->json($ex);
        }
    }

    public function submit(Request $request) {
        $fullname = $request->fullname;
        $photo = $request->file('filepond');
        $extension = $request->file('filepond')->getClientOriginalExtension();

        try {
            $id = Uuid::uuid1()->toString();

            $filename = $id.'.'.$extension;
            Storage::putFileAs('public', $photo, $filename);

            $lister = new \App\msMarketer();
            $lister->fullname = $fullname;
            $lister->photo = $filename;
            $lister->save();
            return 'success';
        } catch (\Exception $ex) {
            return response()->json($ex);
        }
    }

    public function edit(Request $request) {
        $id = $request->id;
        $fullname = $request->fullname;
        try {
            DB::table('ms_marketer')
                ->where('id','=',$id)
                ->update([
                    'fullname' => $fullname
                ]);
            return 'success';
        } catch (\Exception $ex) {
            return response()->json($ex);
        }
    }

    public function delete(Request $request) {
        $id = $request->id;
        try {
            $lister = DB::table('ms_marketer')
                ->where('id','=',$id)
                ->first();

            Storage::disk('public')->delete($lister->photo);
            DB::table('ms_marketer')
                ->where('id','=',$id)
                ->delete();

            return 'success';
        } catch (\Exception $ex) {
            return response()->json($ex);
        }
    }
}
