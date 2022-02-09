<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\Models\nhanvien;
use App\Models\ban;
use App\Models\chucvu;
use App\Models\sanpham;
use App\Models\mon;
use App\Models\nhommon;
use App\Models\temp;
use App\Models\hoadon;
use App\Models\chitiet_hd_thu;

use Carbon\Carbon;

use Session;

class BanHangController extends Controller
{
    public function Admin(){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $mon = mon::orderBy('MaMon','ASC')->paginate(10);
            $data = ban::orderBy('MaBan','ASC')->get();
            return view('banhang.admin',['mon'=>$mon,'data'=>$data]);
        }else {
            return redirect()->route('showlogin');
        }
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            return view('banhang.admin',compact('data'));
        }else {
            return redirect()->route('showlogin');
        }
    }

    public function SoBan($MaBan){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $mon = mon::orderBy('MaMon','ASC')->paginate(4);
            $banso = ban::where('MaBan',$MaBan)->get();
            return view('banhang.chitietban',['mon'=>$mon,'banso' => $banso]);
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function postThemMonChon(Request $request){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $mon = mon::orderBy('MaMon','ASC')->paginate(4);
            $banso = ban::where('MaBan',$request->maban)->get();
            $temp = temp::where('MaBan',$request->maban)->where('MaMon',$request->mamon)->first();
            if($temp){
                $temp = temp::where('MaBan',$request->maban)->where('MaMon',$request->mamon)->get();
                foreach($temp as $tem){}
                $soluongmoi = $tem->soluong + $request->soluong;
                $sl = temp::where('MaBan',$request->maban)->where('MaMon',$request->mamon)->update([
                    'soluong' => $soluongmoi
                ]);
            }else{
                $temp = new temp();
                $temp->MaBan =$request->maban;
                $temp->MaMon = $request->mamon;
                $temp->soluong = $request->soluong;
                $temp->save();
            }
            return view('banhang.chitietban',compact('mon','banso'));
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function XoaOrder($MaBan,$MaMon){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            temp::where('MaBan',$MaBan)->where('MaMon',$MaMon)->delete();
            $mon = mon::orderBy('MaMon','ASC')->paginate(4);
            $banso = ban::where('MaBan',$MaBan)->get();
            return view('banhang.chitietban',compact('banso','mon'));
        }else{
            return redirect()->route('showlogin');
        }
    }

    public function postThanhToan(Request $request){
        if(Session::get('tendangnhap') && Session::get('vaitro')){
            $datenow = Carbon::now('Asia/Ho_Chi_Minh');
            $mahd = random_int(0,9999);
            $kiemtrahd = hoadon::where('MaHD_Thu',$mahd)->first();
            if($kiemtrahd){
                while(!$kiemtrahd){
                    $mahd = random_int(0,9999);
                }
            }
            $hoadon = new hoadon();
            $hoadon->MaHD_Thu = $mahd;
            $hoadon->TongTien = $request->thanhtien;
            $hoadon->TenDangNhap = Session::get('tendangnhap');
            $hoadon->MaBan = $request->maban;
            $hoadon->NgayLap = $datenow->toDateString();
            $hoadon->save();
            $temp = temp::where('MaBan',$request->maban)->get();
            foreach($temp as $t){
                $chitiethd = new chitiet_hd_thu();
                $chitiethd->MaHD_Thu = $mahd;
                $chitiethd->MaMon = $t->MaMon;
                $chitiethd->soluong = $t->soluong;
                $mon = mon::where('MaMon',$t->MaMon)->get();
                foreach($mon as $m){}
                $chitiethd->DonGia = $m->Gia;
                $chitiethd->ThanhTien = ($t->soluong)*($m->Gia);
                $chitiethd->save();
            }
            temp::where('MaBan',$request->maban)->delete();
            $trusl = chitiet_hd_thu::where('MaHD_Thu',$mahd)->get();
            foreach($trusl as $tru){
                $truslmon = mon::where('MaMon',$tru->MaMon)->get();
                foreach($truslmon as $slmon){
                    $soluong = $slmon->soluong;
                }
                $soluongmoi = $soluong - $tru->soluong;
                mon::where('MaMon',$tru->MaMon)->update([
                    'soluong' => $soluongmoi
                ]);
            }
            $mon = mon::orderBy('MaMon','ASC')->paginate(10);
            $data = ban::orderBy('MaBan','ASC')->get();
            return view('banhang.admin',compact('mon','data'));
        }else{
            return redirect()->route('showlogin');
        }
    }
}