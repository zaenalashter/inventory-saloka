<?php

namespace App\Http\Controllers\Dashboard;

use App\sysUserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserprofileEditController extends Controller
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
                return view('dashboard.user-profile.edit-profile');
                break;
        }
    }

    public function list() {
        $username = Session::get('username');

        try {
            $profile = sysUserProfile::where('username','=',$username)->first();
        } catch (\Exception $ex) {
            dd('Exception Block', $ex);
        }

        return json_encode($profile);
    }

    public function edit(Request $request) {
        $username = Session::get('username');
        $namaLengkap = $request->nama_lengkap;
        $email = $request->email;
        $noTelp = $request->no_telp;
        $result = [];

        if ($request->password_lama !== null) {
            $passlama = DB::table('sys_user')->where('username','=',$username)->first();
            if (Crypt::decryptString($passlama->password) == $request->password_lama) {
                DB::table('sys_user')
                    ->where('username','=',$username)
                    ->update([
                        'password' => Crypt::encryptString($request->password)
                    ]);
            } else {
                $result[] = 'password lama salah';
            }
        }

        try {
            $check = DB::table('sys_user_profile')
                ->where('username','=',$username);
            if ($check->exists()) {
                DB::table('sys_user_profile')->update([
                    'full_name' => $namaLengkap,
                    'email' => $email,
                    'phone' => $noTelp,
                ]);
            } else {
                $profile = new sysUserProfile();

                $profile->username = $username;
                $profile->nama_lengkap = $namaLengkap;
                $profile->email = $email;
                $profile->no_telp = $noTelp;

                $profile->save();
            }
            $result[] = 'success';
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
        return json_encode($result);
    }
}
