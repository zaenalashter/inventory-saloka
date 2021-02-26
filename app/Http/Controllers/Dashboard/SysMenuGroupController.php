<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SysMenuGroupController extends Controller
{
    public function index(Request $request) {
        $segment = $request->segment(3);
        $permit = \App\Http\Controllers\OpenFunction\login::permission($segment);

        switch ($permit) {
            case 'login':
                return redirect('admin/login');
                break;

            case 'not available':
                return redirect('admin');
                break;

            default:
                return view('dashboard.system-utility.menu-group');
                break;
        }
    }

    public function list() {
        $result['data'] = \App\sysMenuGroup::all();
        return json_encode($result);
    }

    public function add(Request $request) {
        $name = $request->nama;
        $segment_name = $request->segment_name;
        $icon = $request->icon;
        $ord = $request->ord;

        try {
            $group = new \App\sysMenuGroup();
            $group->name = $name;
            $group->segment_name = $segment_name;
            $group->icon = $icon;
            $group->ord = $ord;
            $group->save();
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }

        return 'success';
    }

    public function edit(Request $request) {
        $id = $request->id;
        $name = $request->nama;
        $segment_name = $request->segment_name;
        $icon = $request->icon;
        $ord = $request->ord;

        try {
            DB::table('sys_menu_group')->where('id','=',$id)->update([
                'name' => $name,
                'segment_name' => $segment_name,
                'icon' => $icon,
                'ord' => $ord
            ]);
        } catch (\Exception $ex) {
            return response()->json($ex);
        }
        return 'success';
    }

    public function delete(Request $request) {
        $id = $request->id;

        try {
            DB::table('sys_menu_group')->where('id','=',$id)->delete();
        } catch (\Exception $ex) {
            return response()->json($ex);
        }
        return 'success';
    }
}
