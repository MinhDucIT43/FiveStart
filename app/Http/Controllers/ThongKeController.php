<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

class ThongKeController extends Controller
{
    public function Admin(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            return view('thongke.admin');
        }else {
            return redirect()->route('showlogin');
        }
    }
}
