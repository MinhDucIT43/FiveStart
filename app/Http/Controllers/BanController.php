<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ban;
use Session;

class BanController extends Controller
{
    public function Admin(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = ban::orderBy('MaBan','DESC')->paginate(5);
            return view('ban.admin',['data' => $data]);
        }else {
            return redirect()->route('auth.showlogin');
        }
    }

    public function getThemBan(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            return view('ban.themban.themban');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function postThemBan(Request $request){
        $request->validate([
            'soban'=>'required|unique:ban',
            'trangthai'=>'required',
        ],[
            'soban.required'=>'Số bàn: Vui lòng nhập bàn!',
            'soban.unique'=>'Số bàn: Bàn đã tồn tại!',
            'trangthai.required'=>'Vui lòng chọn trạng thái',
        ]);
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $ban = new ban();
            $ban->SoBan = $request->soban;
            $ban->TrangThai = $request->trangthai;
            $ban->save();
            $data = ban::orderBy('MaBan','DESC')->get();
            return redirect()->route('ban.admin',compact('data'))->with('alert','Thêm bàn thành công!');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function getSuaBan($MaBan){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = ban::where('MaBan',$MaBan)->get();
            return view('ban.suaban.suaban',['data' => $data]);
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function postSuaBan(Request $request, $MaBan){
        $request->validate([
            'soban'=>'required',
            'trangthai'=>'required',
        ],[
            'soban.required'=>'Số bàn: Vui lòng nhập bàn!',
            'trangthai.required'=>'Vui lòng chọn trạng thái',
        ]);
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $ban = ban::where('MaBan',$MaBan)->update([
                'SoBan' => $request->soban,
                'TrangThai' => $request->trangthai,
            ]);
            $data = ban::orderBy('MaBan','DESC')->get();
            return redirect()->route('ban.admin',compact('data'))->with('alert','Sửa bàn thành công!');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function XoaBan($MaBan){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            ban::where('MaBan',$MaBan)->delete();
            $data = ban::orderBy('MaBan','DESC')->get();
            return redirect()->route('ban.admin',compact('data'))->with('alert','Xóa bàn thành công!');
        }else{
            return redirect()->route('showlogin');
        }
    }
}
