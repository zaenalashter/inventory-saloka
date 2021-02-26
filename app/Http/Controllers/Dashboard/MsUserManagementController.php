<?php

namespace App\Http\Controllers\Dashboard;

use App\sysMenuGroup;
use App\sysPermission;
use App\sysUser;
use App\sysUserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class MsUserManagementController extends Controller
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
                return view('dashboard.master-data.user-management');
                break;
        }
    }

    public static function menu() {
        $group = sysMenuGroup::all();
        $result = [];

        foreach ($group as $g) {
            $menu = DB::table('sys_menu')
                ->where('id_group','=',$g->id);
            if ($menu->exists()) {
                $dataMenu = $menu->get();
                $listMenu = [];
                foreach ($dataMenu as $m) {
                    $listMenu[] = [
                        'id' => $m->id,
                        'name' => $m->name,
                    ];
                }
                $result[] = [
                    'group' => $g->name,
                    'menu' => $listMenu,
                ];
            }
        }
        return $result;
    }

    public function list() {
        $user = DB::table('sys_user')
            ->select('username','isDel')
            ->get();
        $result['data'] = $user;

        return json_encode($result);
    }

    public function add(Request $request) {
        $username = $request->username;
        $password = Crypt::encryptString($username);
        $permission = $request->menu_permission;
        
        try {
            if (DB::table('sys_user')->where('username','=',$username)->doesntExist()) {
                sysUser::create([
                    'username' => $username,
                    'password' => $password,
                    'tipe'=>$request->iTipeAkun
                ]);
                foreach ($permission as $p) {
                    sysPermission::create([
                        'username' => $username,
                        'id_menu' => $p
                    ]);
                }

                sysUserProfile::create([
                    'username' => $username,
                    'full_name' => $request->namaLengkap,
                    'email' => $request->email,
                    'phone' => $request->telephone
                ]);

                $result = 'success';
            } else {
                $result = 'terdaftar';
            }

        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }

        return $result;
    }

    public function userPermission(Request $request) {
        $username = $request->username;
        $permission = DB::table('sys_permission')
            ->select('id_menu')
            ->where('username','=',$username)
            ->get();

        return json_encode($permission);
    }

    public function edit(Request $request) {
        $username = $request->username;
        $permission = $request->menu_permission;

        try {
            DB::table('sys_permission')->where('username','=',$username)->delete();
            foreach ($permission as $p) {
                sysPermission::create([
                    'username' => $username,
                    'id_menu' => $p
                ]);
            }
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
        return 'success';
    }

    public function delete(Request $request) {
        $username = $request->username;

        try {
            DB::table('sys_user')
                ->where('username','=',$username)
                ->update([
                    'isDel' => 1
                ]);
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
        return 'success';
    }

    public function reset(Request $request) {
        $username = $request->username;
        $password = Crypt::encryptString($username);

        try {
            DB::table('sys_user')
                ->where('username','=',$username)
                ->update([
                    'password' => $password
                ]);
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
        return 'success';
    }
}
