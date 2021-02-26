<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Structure extends Controller
{
    public static function sidebarMenu() {
        $username = Session::get('username');
        $group = \App\sysMenuGroup::all();
        $menu = DB::table('sys_permission')
            ->select('sys_menu.id_group','sys_menu.segment_name','sys_menu.name','sys_menu.url')
            ->join('sys_menu','sys_menu.id','=','sys_permission.id_menu')
            ->where([
                ['sys_permission.username','=',$username],
            ])
            ->orderBy('sys_menu.ord','asc')
            ->get();

        $groupSelected = [];
        foreach ($menu as $m) {
            if (!in_array($m->id_group,$groupSelected)) {
                $groupSelected[] = $m->id_group;
            }
        }

        $counter = 0;
        $sidebar = [];
        foreach ($group as $g) {
            $dtMenu = [];
            if (in_array($g->id, $groupSelected)) {
                $group = [
                    'segment_name' => $g->segment_name,
                    'name' => $g->name,
                    'icon' => $g->icon
                ];
                foreach ($menu as $m) {
                    if ($m->id_group == $g->id) {
                        $dtMenu[] = [
                            'segment_name' => $m->segment_name,
                            'name' => $m->name,
                            'url' => $m->url,
                        ];
                    }
                }
                $sidebar[$counter] = [
                    'group' => $group,
                    'menu' => $dtMenu,
                ];
                $counter++;
            }
        }
        return $sidebar;
    }
}
