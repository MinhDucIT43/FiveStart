<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\loaisanpham;
use App\Models\sanpham;
use App\Models\donvitinh;
use App\Models\vebuffet;

use Session;

class SanPhamController extends Controller
{
    public function Admin(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = sanpham::orderBy('MaSP','DESC')->paginate(5);
            return view('sanpham.admin',['data' => $data]);
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function getThemSanPham(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $donvitinh = donvitinh::all();
            $loaisanpham = loaisanpham::all();
            return view('sanpham.themsanpham.themsanpham',['donvitinh' => $donvitinh, 'loaisanpham' => $loaisanpham]);
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function postThemSanPham(Request $request){
        $request->validate([
            'slton' => 'numeric',
            'gianhap'=>'numeric',
        ],[
            'slton.numeric'=>'Số lượng: Vui lòng nhập số!',
            'gianhap.numeric'=>'Đơn giá: Vui lòng nhập số!'
        ]);
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $sanpham = new sanpham();
            $sanpham->TenSP = $request->tensanpham;
            $sanpham->MaLSP = $request->loaisanpham;
            if($request->slton<0){
                return redirect::back()->withInput()->with('error-sl','Số lượng không được âm');
                $check=false;
            }
            else{
                $sanpham->SLTon = $request->slton;
            }
            $sanpham->MaDVT = $request->donvitinh;
            if($request->gianhap<0){
                return redirect::back()->withInput()->with('error-dg','Đơn giá không được âm');
                $check=false;
            }else{
                $sanpham->GiaNhap = $request->gianhap;
            }
            $sanpham->save();
            $data = sanpham::orderBy('MaSP','DESC')->get();
            return redirect()->route('sanpham.admin',compact('data'))->with('alert','Thêm sản phẩm thành công.');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function getSuaSanPham($MaSP){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = sanpham::where('MaSP',$MaSP)->get();
            $loaisanpham = loaisanpham::all();
            $donvitinh = donvitinh::all();
            return view('sanpham.suasanpham.suasanpham',['data' => $data, 'loaisanpham' => $loaisanpham, 'donvitinh' => $donvitinh]);
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function postSuaSanPham(Request $request, $MaSP){
        $request->validate([
            'slton' => 'numeric',
            'gianhap'=>'numeric',
        ],[
            'slton.numeric'=>'Số lượng: Vui lòng nhập số!',
            'gianhap.numeric'=>'Đơn giá: Vui lòng nhập số!'
        ]);
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            if($request->slton<0){
                return redirect::back()->withInput()->with('error-sl','Số lượng không được âm');
                $check=false;
            }elseif($request->gianhap<0){
                return redirect::back()->withInput()->with('error-dg','Đơn giá không được âm');
            }
            else{
                $sanpham = sanpham::where('MaSP',$MaSP)->update([
                    'TenSP' => $request->tensanpham,
                    'MaLSP' => $request->loaisanpham,
                    'SLTon' => $request->slton,
                    'MaDVT' => $request->donvitinh,
                    'GiaNhap' => $request->gianhap
                ]);
            }
            $data = sanpham::orderBy('MaSP','DESC')->get();
            return redirect()->route('sanpham.admin',compact('data'))->with('alert','Sửa sản phẩm thành công.');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function XoaSanPham($MaSP){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            sanpham::where('MaSP',$MaSP)->delete();
            $data = sanpham::orderBy('MaSP','DESC')->get();
            return redirect()->route('sanpham.admin',compact('data'))->with('alert','Xóa sản phẩm thành công.');
        }else{
            return redirect()->route('auth.showlogin');
        }
    }

    public function AdminDonViTinh(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = donvitinh::orderBy('MaDVT','DESC')->paginate(5);
            return view('sanpham.donvitinh.admin',['data' => $data]);
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function getThemDonViTinh(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            return view('sanpham.donvitinh.themdonvitinh.themdonvitinh');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function postThemDonViTinh(Request $request){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $donvitinh = new donvitinh();
            $donvitinh->DVT = $request->tendonvitinh;
            $donvitinh->save();
            $data = donvitinh::orderBy('MaDVT','DESC')->get();
            return redirect()->route('sanpham.donvitinh.admin',compact('data'))->with('alert','Thêm đơn vị tính thành công.');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function getSuaDonViTinh($MaDVT){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = donvitinh::where('MaDVT',$MaDVT)->get();
            return view('sanpham.donvitinh.suadonvitinh.suadonvitinh',['data' => $data]);
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function postSuaDonViTinh(Request $request, $MaDVT){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $donvitinh = donvitinh::where('MaDVT',$MaDVT)->update([
                'DVT' => $request->tendonvitinh,
            ]);
            $data = donvitinh::orderBy('MaDVT','DESC')->get();
            return redirect()->route('sanpham.donvitinh.admin',compact('data'))->with('alert','Sửa đơn vị tính thành công.');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function XoaDonViTinh($MaDVT){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = sanpham::orderBy('MaDVT','DESC')->get();
            $data = vebuffet::orderBy('MaDVT','DESC')->get();
            $spdvt = sanpham::where('MaDVT',$MaDVT)->first();
            $vbdvt = vebuffet::where('MaDVT',$MaDVT)->first();
            if($spdvt or $vbdvt){
                return redirect()->route('sanpham.donvitinh.admin',compact('data'))->with('alert-xoa','Tồn tại sản phẩm thuộc đơn vị tính bạn muốn xóa.');
            }else{
                donvitinh::where('MaDVT',$MaDVT)->delete();
                $data = donvitinh::orderBy('MaDVT','DESC')->get();
                return redirect()->route('sanpham.donvitinh.admin',compact('data'))->with('alert','Xóa đơn vị tính thành công.');
            }
        }else{
            return redirect()->route('showlogin');
        }
    }
}
