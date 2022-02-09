<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\chucvu;
use App\Models\nhanvien;

use Session;

class AdminController extends Controller
{
    public function Admin(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            return view('admin');
        }else{
            return redirect()->route('showlogin');
        }
    }
}
