<?php

namespace App\Http\Controllers\Dashboard;

use App\sysMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OpenFunction\login;
use Illuminate\Support\Facades\DB;

class SysMenuController extends Controller
{
    public function index() {
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
                return view('dashboard.system-utility.menu');
                break;
        }
    }

    public function list() {
        $menu = DB::table('sys_menu')
            ->select('sys_menu.id','id_group','sys_menu_group.name as group','sys_menu.name','sys_menu.url','sys_menu.segment_name','sys_menu.ord')
            ->join('sys_menu_group','sys_menu.id_group','=','sys_menu_group.id')
            ->get();
        $result['data'] = $menu;

        return json_encode($result);
    }

    public function group() {
        $group = DB::table('sys_menu_group')
            ->select('id','name')
            ->get();

        return json_encode($group);
    }

    public function add(Request $request) {
        $group = $request->group;
        $system = $request->system_type;
        $nama = $request->nama;
        $url = $request->url;
        $segment_name = $request->segment_name;
        $ord = $request->ord;

        try {
            sysMenu::create([
                'id_group' => $group,
                'system' => $system,
                'segment_name' => $segment_name,
                'name' => $nama,
                'url' => $url,
                'ord' => $ord
            ]);
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }

        return 'success';
    }

    public function edit(Request $request) {
        $id = $request->id;
        $group = $request->group;
        $nama = $request->nama;
        $url = $request->url;
        $segment_name = $request->segment_name;
        $ord = $request->ord;

        try {
            DB::table('sys_menu')
                ->where('id','=',$id)
                ->update([
                    'id_group' => $group,
                    'segment_name' => $segment_name,
                    'name' => $nama,
                    'url' => $url,
                    'ord' => $ord
                ]);
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
        return 'success';
    }

    public function delete(Request $request) {
        $id = $request->id;

        try {
            DB::table('sys_menu')
                ->where('id','=',$id)
                ->delete();
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
        return 'success';
    }
}
