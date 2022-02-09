<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


use App\Models\chucvu;
use App\Models\nhanvien;

use Session;

class ChucVuController extends Controller
{
    public function Admin(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = chucvu::orderBy('MaCV','DESC')->paginate(9);
            return view('chucvu.admin',['data' => $data]);
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function getThemChucVu(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            return view('chucvu.themchucvu.themchucvu');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function postThemChucVu(Request $request){
        $request->validate([
            'tienluong' => 'numeric',
        ],[
            'tienluong.numeric'=>'Vui lòng nhập số!'
        ]);
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $chucvu = new chucvu();
            $chucvu->TenCV = $request->tenchucvu;
            if($request->tienluong<0){
                return redirect::back()->withInput()->with('error','Lương không được âm!');
            }else{
                $chucvu->TienLuong = $request->tienluong;
            }
            $chucvu->save();
            $data = chucvu::orderBy('MaCV','DESC')->get();
            return redirect()->route('chucvu.admin',compact('data'))->with('alert','Thêm chức vụ thành công!');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function getSuaChucVu($MaCV){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = chucvu::where('MaCV',$MaCV)->get();
            return view('chucvu.suachucvu.suachucvu',['data' => $data]);
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function postSuaChucVu(Request $request, $MaCV){
        $request->validate([
            'tienluong' => 'numeric',
        ],[
            'tienluong.numeric'=>'Vui lòng nhập số!'
        ]);
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            if($request->tienluong<0){
                return redirect::back()->withInput()->with('error','Lương không được âm!');
            }else{
                $chucvu = chucvu::where('MaCV',$MaCV)->update([
                    'TenCV' => $request->tenchucvu,
                    'TienLuong' => $request->tienluong
                ]);
            }
            $data = chucvu::orderBy('MaCV','DESC')->get();
            return redirect()->route('chucvu.admin',compact('data'))->with('alert','Sửa chức vụ thành công!');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function XoaChucVu($MaCV){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = nhanvien::orderBy('MaCV','DESC')->get();
            $nvcv = nhanvien::where('MaCV',$MaCV)->first();
            if($nvcv){
                return redirect()->route('chucvu.admin',compact('data'))->with('alert-xoa','Tồn tại nhân viên có chức vụ bạn muốn xóa.');
            }else{
                $xoa = chucvu::where('MaCV',$MaCV)->delete();
                $data = chucvu::orderBy('MaCV','DESC')->get();
                return redirect()->route('chucvu.admin',compact('data'))->with('alert','Xóa chức vụ thành công!');
            }
        }else{
            return redirect()->route('showlogin');
        }
    }
}