<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class login extends Controller
{
    public function index(Request $request) {
        if (Session::has('username')) {
            return redirect('/');
        } else {
            return view('dashboard.login');
        }
    }

    public function submit(Request $request) {
        $username = $request->username;
        $password = $request->password;

        $result = '';

        try {
            $user = DB::table('sys_user')->where('username','=',$username);
            if ($user->exists()) {
                $data = $user->first();
                if (Crypt::decryptString($data->password) == $password) {
                    $result = 'true';
                    Session::put('id',$data->id);
                    Session::put('username',$username);
                    Session::put('status','login');
                } else {
                    $result = 'username atau password salah';
                }
            }
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
        return $result;
    }

    public function sessionFlush(Request $request) {
        try {
            Session::flush();
            return 'success';
        } catch (\Exception $ex) {
            return response()->json($ex);
        }
    }
}
