<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\Models\nhanvien;
use App\Models\chucvu;
use App\Models\ban;

use Session;

class DangNhapController extends Controller
{
    public function ShowLogin(){
        return view('auth.login');
    }

    public function Login(Request $request){
        $request->validate([
            'tendangnhap'=>'required',
            'matkhau'=>'required',
        ],[
            'tendangnhap.required'=>'Tên đăng nhập rỗng!',
            'matkhau.required'=>'Mật khẩu rỗng!',
        ]);
        $tendangnhap = $request->tendangnhap;
        $matkhau =  $request->matkhau;
        
        $cvadmin=1;
        $cvthungan=2;

        $admin = nhanvien::where('TenDangNhap',$tendangnhap)->where('MatKhau',$matkhau)->where('MaCV',$cvadmin)->first();
        $thungan = nhanvien::where('TenDangNhap',$tendangnhap)->where('MatKhau',$matkhau)->where('MaCV',$cvthungan)->first();

        if($admin){
            Session::put('tendangnhap',$tendangnhap);
            Session::put('vaitro',$cvadmin);
            return redirect()->route('admin');
        }else if($thungan){
            Session::put('tendangnhap',$tendangnhap);
            Session::put('vaitro',$cvthungan);
            $data = ban::orderBy('MaBan','ASC')->get();
            return redirect()->route('banhang.admin',compact('data'));
        }else{
            return redirect()->back()->with('alert-xoa','Sai tên đăng nhập hoặc mật khẩu!');
        }
    }

    public function DangXuatAdmin(){
        Session::put('tendangnhap',null);
        Session::put('vaitro',null);
        //Session::flush();
        Auth::logout();
        return redirect()->route('showlogin');
    }
}
