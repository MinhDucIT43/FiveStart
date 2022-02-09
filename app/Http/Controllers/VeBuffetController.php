<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\vebuffet;
use App\Models\donvitinh;

use Session;

class VeBuffetController extends Controller
{
    public function Admin(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = vebuffet::orderBy('MaVe','DESC')->paginate(5);
            return view('vebuffet.admin',['data' => $data]);
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function getThemVeBuffet(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $donvitinh = donvitinh::all();
            return view('vebuffet.themvebuffet.themvebuffet',['donvitinh' => $donvitinh]);
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function postThemVeBuffet(Request $request){
        $request->validate([
            'dongia'=>'numeric',
        ],[
            'dongia.numeric'=>'Vui lòng nhập số!',
        ]);
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $vebuffet = new vebuffet();
            $vebuffet->TenVe = $request->tenvebuffet;
            $vebuffet->MaDVT = $request->donvitinh;
            if($request->dongia<0){
                return redirect::back()->withInput()->with('error','Giá vé không được âm');
            }else{
                $vebuffet->GiaVe = $request->dongia;
            }
            $vebuffet->save();
            $data = vebuffet::orderBy('MaVe','DESC')->get();
            return redirect()->route('vebuffet.admin',compact('data'))->with('alert','Thêm vé buffet thành công.');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function getSuaVeBuffet($MaVe){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = vebuffet::where('MaVe',$MaVe)->get();
            $donvitinh = donvitinh::all();
            return view('vebuffet.suavebuffet.suavebuffet',['data' => $data,'donvitinh' => $donvitinh]);
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function postSuaVeBuffet(Request $request, $MaVe){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $vebuffet = vebuffet::where('MaVe',$MaVe)->update([
                'TenVe' => $request->tenvebuffet,
                'MaDVT' => $request->donvitinh,
                'GiaVe' => $request->dongia,
            ]);
            $data = vebuffet::orderBy('MaVe','DESC')->get();
            return redirect()->route('vebuffet.admin',compact('data'))->with('alert','Sửa vé Buffet thành công.');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function XoaVeBuffet($MaVe){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            vebuffet::where('MaVe',$MaVe)->delete();
            $data = vebuffet::orderBy('MaVe','DESC')->get();
            return redirect()->route('vebuffet.admin',compact('data'))->with('alert','Xóa vé Buffet thành công.');
        }else{
            return redirect()->route('showlogin');
        }
    }
}
