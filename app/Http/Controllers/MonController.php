<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\mon;
use App\Models\donvitinh;
use App\Models\nhommon;

use Session;

class MonController extends Controller
{
    public function Admin(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = mon::orderBy('MaMon','DESC')->paginate(3);
            return view('mon.admin',['data' => $data]);
        }else {
            return redirect()->route('showlogin');
        }
    }

    public function getThemMon(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $donvitinh = donvitinh::all();
            $nhommon = nhommon::all();
            return view('mon.themmon.themmon',['donvitinh' => $donvitinh, 'nhommon' => $nhommon]);
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function postThemMon(Request $request){
        $request->validate([
            'gianhap'=>'numeric',
            'slton'=>'numeric',
            'hinhanh'=>'required',
        ],[
            'gianhap.numeric'=>'Đơn giá: Vui lòng nhập số!',
            'slton.numeric'=>'Số lượng: Vui lòng nhập số!',
            'hinhanh.required'=>'Hình ảnh: Vui lòng chọn ảnh món ăn!'
        ]);

        if($request->has('hinhanh')){
            $file = $request->hinhanh;
            $tenfile = $file->getClientoriginalName();
            $file->move(public_path('hinhanhmonan'),$tenfile);
        }

        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $mon = new mon();
            $mon->TenMon = $request->tenmon;
            $mon->MaNM = $request->nhommon;
            if($request->slton<0){
                return redirect::back()->withInput()->with('error-sl','Số lượng không được âm');
                $check=false;
            }else{
                $mon->soluong = $request->slton;
            }
            $mon->MaDVT = $request->donvitinh;
            if($request->gianhap<0){
                return redirect::back()->withInput()->with('error-dg','Giá không được âm');
                $check=false;
            }else{
                $mon->Gia = $request->gianhap;
            }
            $mon->hinhanh = $tenfile;
            $mon->save();
            $data = mon::orderBy('MaMon','DESC')->get();
            return redirect()->route('mon.admin',compact('data'))->with('alert','Thêm món ăn thành công.');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function getSuaMon($MaMon){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $data = mon::where('MaMon',$MaMon)->get();
            $nhommon = nhommon::all();
            $donvitinh = donvitinh::all();
            return view('mon.suamon.suamon',['data' => $data, 'nhommon' => $nhommon, 'donvitinh' => $donvitinh]);
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function postSuaMon(Request $request, $MaMon){
        $request->validate([
            'gianhap'=>'numeric',
            'slton'=>'numeric',
        ],[
            'gianhap.numeric'=>'Đơn giá: Vui lòng nhập số!',
            'slton.numeric'=>'Số lượng: Vui lòng nhập số!'
        ]);
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            if($request->gianhap<0){
                return redirect::back()->withInput()->with('error-dg','Giá không được âm');
            }else if($request->slton<0){
                return redirect::back()->withInput()->with('error-sl','Số lượng không được âm');
            }else{
                $mon = mon::where('MaMon',$MaMon)->update([
                    'TenMon' => $request->tenmon,
                    'MaNM' => $request->nhommon,
                    'MaDVT' => $request->donvitinh,
                    'Gia' => $request->gianhap,
                    'soluong' => $request->slton
                ]);
            }
            $data = mon::orderBy('MaMon','DESC')->get();
            return redirect()->route('mon.admin',compact('data'))->with('alert','Sửa món ăn thành công.');
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function XoaMon($MaMon){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            mon::where('MaMon',$MaMon)->delete();
            $data = mon::orderBy('MaMon','DESC')->get();
            return redirect()->route('mon.admin',compact('data'))->with('alert','Xóa món ăn thành công.');
        }else{
            return redirect()->route('showlogin');
        }
    }
}
