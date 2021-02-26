<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class overview extends Controller
{
    public function index(Request $request) {
        if (Session::get('status') == 'login') {
            return view('dashboard.overview');
        } else {
            return redirect('admin/login');
        }
    }
}
