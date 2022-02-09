<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\nhanvien;
use App\Models\chucvu;

use Session;
use Carbon\Carbon;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Foundation\Http\FormRequest;

class NhanVienController extends Controller
{
    public function Admin(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = nhanvien::orderBy('TenDangNhap','DESC')->paginate(5);
            return view('nhanvien.admin',['data' => $data]);
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function getThemNhanVien(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $bien = chucvu::all();
            return view('nhanvien.themnhanvien.themnhanvien',['bien' => $bien]);
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function postThemNhanVien(Request $request){
        $nhanvien = new nhanvien();
        $request->validate([
            'gioitinh'=>'required',
            'sodienthoai'=>'numeric',
        ],[
            'gioitinh.required'=>'Vui lòng chọn giới tính',
            'sodienthoai.numeric'=>'Số điện thoại: Vui lòng nhập số!',
        ]);
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $nhanvien->TenNV = $request->tennhanvien;
            $nhanvien->NamSinh = $request->namsinh;
            $nhanvien->GioiTinh = $request->gioitinh;
            $nhanvien->MatKhau = $request->matkhau;
            $nhanvien->DiaChi = $request->diachi;
            $sdt = nhanvien::where('SoDT',$request->sodienthoai)->first();
            if($sdt){
                return redirect()->route('nhanvien.themnhanvien.themnhanvien')->with('alert-xoa','Số điện thoại đã tồn tại!');
            }else{
                $nhanvien->SoDT = $request->sodienthoai;
            }
            $nhanvien->NgayVaoLam = $request->ngayvaolam;
            $nhanvien->MaCV = $request->chucvu;
            $nhanvien->save();
            $data = nhanvien::orderBy('TenDangNhap','DESC')->get();
            return redirect()->route('nhanvien.admin',compact('data'))->with('alert','Thêm nhân viên thành công!');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function getSuaNhanVien($TenDangNhap){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $bien = chucvu::all();
            $data = nhanvien::where('TenDangNhap',$TenDangNhap)->get();
            return view('nhanvien.suanhanvien.suanhanvien',['bien' => $bien,'data' => $data]);
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function postSuaNhanVien(Request $request, $TenDangNhap){
        $request->validate([
            'sodienthoai' => 'numeric',
        ],[
            'sodienthoai.numeric'=>'Số điện thoại: Vui lòng nhập số!',
        ]);
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $nhanvien = nhanvien::where('TenDangNhap',$TenDangNhap)->update([
                'TenNV' => $request->tennhanvien,
                'NamSinh' => $request->namsinh,
                'GioiTinh' => $request->gioitinh,
                'MatKhau' => $request->matkhau,
                'DiaChi' => $request->diachi,
                'SoDT' => $request->sodienthoai,
                'NgayVaoLam' => $request->ngayvaolam,
                'MaCV' => $request->chucvu
            ]);
            $data = nhanvien::orderBy('TenDangNhap','DESC')->get();
            return redirect()->route('nhanvien.admin',compact('data'))->with('alert','Sửa nhân viên thành công!');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function XoaNhanVien($TenDangNhap){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            nhanvien::where('TenDangNhap',$TenDangNhap)->delete();
            $data = nhanvien::orderBy('TenDangNhap','DESC')->get();
            return redirect()->route('nhanvien.admin',compact('data'))->with('alert','Xóa nhân viên thành công!');
        }else{
            return redirect()->route('showlogin');
        }
    }
}
