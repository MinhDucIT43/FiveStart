<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\nhommon;
use App\Models\mon;

use Session;

class NhomMonController extends Controller
{
    public function Admin(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = nhommon::orderBy('MaNM','DESC')->paginate(5);
            return view('nhommon.admin',['data' => $data]);
        }else {
            return redirect()->route('showlogin');
        }
    }

    public function getThemNhomMon(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            return view('nhommon.themnhommon.themnhommon');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function postThemNhomMon(Request $request){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $nhommon = new nhommon();
            $nhommon->TenNM = $request->tennhommon;
            $nhommon->save();
            $data = nhommon::orderBy('MaNM','DESC')->get();
            return redirect()->route('nhommon.admin',compact('data'))->with('alert','Thêm nhóm thành công.');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function getSuaNhomMon($MaNM){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = nhommon::where('MaNM',$MaNM)->get();
            return view('nhommon.suanhommon.suanhommon',['data' => $data]);
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function postSuaNhomMon(Request $request, $MaNM){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $nhommon = nhommon::where('MaNM',$MaNM)->update([
                'TenNM' => $request->tennhommon,
            ]);
            $data = nhommon::orderBy('MaNM','DESC')->get();
            return redirect()->route('nhommon.admin',compact('data'))->with('alert','Sửa nhóm món thành công.');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function XoaNhomMon($MaNM){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = mon::orderBy('MaNM','DESC')->get();
            $mnm = mon::where('MaNM',$MaNM)->first();
            if($mnm){
                return redirect()->route('nhommon.admin',compact('data'))->with('alert-xoa','Tồn tại món thuộc nhóm món bạn muốn xóa.');
            }else{
                nhommon::where('MaNM',$MaNM)->delete();
                $data = nhommon::orderBy('MaNM','DESC')->get();
                return redirect()->route('nhommon.admin',compact('data'))->with('alert','Xóa nhóm món thành công.');
            }
        }else{
            return redirect()->route('showlogin');
        }
    }
}
