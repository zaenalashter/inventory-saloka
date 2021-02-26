<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DataCustomer extends Controller
{
    public function index(Request $request) {
        $segment = \request()->segment(3);
        $permit = \App\Http\Controllers\OpenFunction\login::permission($segment);

        switch ($permit) {
            case 'login':
                return redirect('admin/login');
                break;

            // case 'not available':
            //     return redirect('admin');
            //     break;

            default:
                $customer = DB::table('ms_customer')
                ->select('ms_customer.id as id','ms_customer.nama as nama','ms_customer.alamat as alamat','ms_customer.noTelpone as telephone','ms_customer.status as status')
               ->where('ms_customer.pic','=', $request->session()->get('username'))
                ->get();
                return view('dashboard.prospek.data-customer.list')->with('info',$customer);
                break;
        }
    }

    public function add() {
        $segment = \request()->segment(3);
        $permit = \App\Http\Controllers\OpenFunction\login::permission($segment);

        switch ($permit) {
            case 'login':
                return redirect('admin/login');
                break;

            // case 'not available':
            //     return redirect('admin');
            //     break;

            default:
             
                // $kota['kota'] = \App\msKota::all();
                return view('dashboard.prospek.data-customer.baru');
                break;
        }
    }

    public function edit($id) {
        $segment = \request()->segment(3);
        $permit = \App\Http\Controllers\OpenFunction\login::permission($segment);

        switch ($permit) {
            case 'login':
                return redirect('admin/login');
                break;

            // case 'not available':
            //     return redirect('admin');
            //     break;

            default:
                // $area = \App\msarea::find($id);
                $customer = DB::table('ms_customer')
                ->select('ms_customer.id as id','ms_customer.nama as nama','ms_customer.alamat as alamat','ms_customer.noTelpone as telephone','ms_customer.status as status')
               ->where('ms_customer.id','=', $id)
                ->first();
                return view('dashboard.prospek.data-customer.edit')->with('info',$customer);
                break;
        }
    }

    public function addSubmit(Request $request) {

        try {
            $jP = new \App\msCustomer();
            $jP->nama =  $request->namaCustomer;
            $jP->alamat =  $request->alamat;
            $jP->noTelpone = $request->noTelephone;
            $jP->status =  $request->status;
            $jP->pic = $request->session()->get('username');

            $jP->save();
        } catch (\Exception $ex) {
            dd($ex);
        }
        return 'success';
    }

    public function editSubmit(Request $request) {
        $id = $request->id;
        $nama = $request->customer;
        $alamat = $request->alamat;
        $telephone = $request->telephone;
        $status = $request->status;
        try {
            DB::table('ms_customer')
                ->where('id','=',$id)
                ->update([
                    'nama' => $nama,
                    'alamat'=>$alamat,
                    'noTelpone'=>$telephone,
                    'status'=>$status
                ]);
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
        return 'success';
    }

    public function delete(Request $request) {
        try {
            DB::table('ms_customer')
                ->where('id','=',$request->id)
                ->delete();
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
        return 'success';
    }
}
