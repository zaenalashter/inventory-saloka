<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\mod_upload_polreg;
use Illuminate\Support\Facades\DB;

 
use App\mod_polreg;
 
use Session;
 
use App\Exports\SiswaExport;
use App\Imports\polregImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class c_upload_polreg extends Controller
{

    public function home()
	{
        return view('dashboard.upload.polreg.baru');
	}

    public function index()
	{
		$siswa = Siswa::all();
		return view('siswa',['siswa'=>$siswa]);
	}

	public function data(Request $request) {
        $filters = $request->filters;
        $data = [
            'where' => []
        ];
        if ($filters !== null) {
            foreach ($filters as $f) {
                $data['where'][] = [
                    $f['field'],$f['type'],'%'.$f['value'].'%'
                ];
            }
        }
        return DB::table('polreg')
            ->where($data['where'])
            ->paginate(8);
    }

 
	public function export_excel()
	{
		return Excel::download(new SiswaExport, 'siswa.xlsx');
	}
 
	public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_siswa',$nama_file);
 
		// import data
		Excel::import(new polregImport, public_path('/file_siswa/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/upload-polreg');
	}
}