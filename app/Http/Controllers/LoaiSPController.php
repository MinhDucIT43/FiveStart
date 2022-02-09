<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\loaisanpham;
use App\Models\sanpham;

use Session;

class LoaiSPController extends Controller
{
    public function Admin(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = loaisanpham::orderBy('MaLSP','DESC')->paginate(8);
            return view('loaisanpham.admin',['data' => $data]);
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function getThemLoaiSanPham(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            return view('loaisanpham.themloaisanpham.themloaisanpham');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function postThemLoaiSanPham(Request $request){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $loaisanpham = new loaisanpham();
            $loaisanpham->TenLSP = $request->tenloaisanpham;
            $loaisanpham->save();
            $data = loaisanpham::orderBy('MaLSP','DESC')->get();
            return redirect()->route('loaisanpham.admin',compact('data'))->with('alert','Thêm loại sản phẩm thành công.');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function getSuaLoaiSanPham($MaLSP){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = loaisanpham::where('MaLSP',$MaLSP)->get();
            return view('loaisanpham.sualoaisanpham.sualoaisanpham',['data' => $data]);
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function postSuaLoaiSanPham(Request $request, $MaLSP){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $loaisanpham = loaisanpham::where('MaLSP',$MaLSP)->update([
                'TenLSP' => $request->tenloaisanpham,
            ]);
            $data = loaisanpham::orderBy('MaLSP','DESC')->get();
            return redirect()->route('loaisanpham.admin',compact('data'))->with('alert','Sửa loại sản phẩm thành công.');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function XoaLoaiSanPham($MaLSP){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = sanpham::orderBy('MaLSP','DESC')->get();
            $splsp = sanpham::where('MaLSP',$MaLSP)->first();
            if($splsp){
                return redirect()->route('loaisanpham.admin',compact('data'))->with('alert-xoa','Tồn tại sản phẩm thuộc loại sản phẩm bạn muốn xóa.');
            }else{
                loaisanpham::where('MaLSP',$MaLSP)->delete();
                $data = loaisanpham::orderBy('MaLSP','DESC')->get();
                return redirect()->route('loaisanpham.admin',compact('data'))->with('alert','Xóa loại sản phẩm thành công.');
            }
        }else{
            return redirect()->route('showlogin');
        }
    }
}
