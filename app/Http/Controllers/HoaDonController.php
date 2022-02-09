<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\hoadon;
use App\Models\chitiet_hd_thu;
use App\Models\nhanvien;
use App\Models\ban;

use Session;

class HoaDonController extends Controller
{
    public function Admin(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = hoadon::orderBy('MaHD_Thu','DESC')->paginate(2);
            return view('hoadon.admin',['data' => $data]);
        }else {
            return redirect()->route('showlogin');
        }
    }
}
