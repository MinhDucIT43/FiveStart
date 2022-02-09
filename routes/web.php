<?php

use Illuminate\Support\Facades\Route;

use App\Models\nhanvien;
use App\Models\chucvu;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Login:
Route::get('/','App\Http\Controllers\DangNhapController@ShowLogin')->name('showlogin');
Route::post('DangNhap',[
    'as'=>'postLogin',
    'uses'=>'App\Http\Controllers\DangNhapController@Login',
]);
//Đăng xuất:
Route::get('DangXuat','App\Http\Controllers\DangNhapController@DangXuatAdmin')->name('dangxuat');

//Gọi Admin:
Route::get('Admin','App\Http\Controllers\AdminController@Admin')->name('admin');

//Nhân viên
Route::get('Admin/NhanVien','App\Http\Controllers\NhanVienController@Admin')->name('nhanvien.admin');
Route::get('Admin/NhanVien/ThemNhanVien','App\Http\Controllers\NhanVienController@getThemNhanVien')->name('nhanvien.themnhanvien.themnhanvien');
Route::post('Admin/NhanVien/ThemNhanVien',[
    'as'=>'postThemNhanVien',
    'uses'=>'App\Http\Controllers\NhanVienController@postThemNhanVien',
]);
Route::get('Admin/NhanVien/SuaNhanVien/{TenDangNhap}','App\Http\Controllers\NhanVienController@getSuaNhanVien')->name('nhanvien.suanhanvien.suanhanvien');
Route::post('Admin/NhanVien/SuaNhanVien/{TenDangNhap}',[
    'as'=>'postSuaNhanVien',
    'uses'=>'App\Http\Controllers\NhanVienController@postSuaNhanVien',
]);
Route::get('Admin/NhanVien/XoaNhanVien/{TenDangNhap}','App\Http\Controllers\NhanVienController@XoaNhanVien')->name('nhanvien.xoanhanvien');

//Chức vụ
Route::get('Admin/ChucVu','App\Http\Controllers\ChucVuController@Admin')->name('chucvu.admin');
Route::get('Admin/ChucVu/ThemChucVu','App\Http\Controllers\ChucVuController@getThemChucVu')->name('chucvu.themchucvu.themchucvu');
Route::post('Admin/ChucVu/ThemChucVu',[
    'as'=>'postThemChucVu',
    'uses'=>'App\Http\Controllers\ChucVuController@postThemChucVu',
]);
Route::get('Admin/ChucVu/SuaChucVu/{MaCV}','App\Http\Controllers\ChucVuController@getSuaChucVu')->name('chucvu.suachucvu.suachucvu');
Route::post('Admin/ChucVu/SuaChucVu/{MaCV}',[
    'as'=>'postSuaChucVu',
    'uses'=>'App\Http\Controllers\ChucVuController@postSuaChucVu',
]);
Route::get('Admin/ChucVu/XoaChucVu/{MaCV}','App\Http\Controllers\ChucVuController@XoaChucVu')->name('chucvu.xoachucvu');

//Loại sản phẩm:
Route::get('Admin/LoaiSanPham','App\Http\Controllers\LoaiSPController@Admin')->name('loaisanpham.admin');
Route::get('Admin/LoaiSanPham/ThemLoaiSanPham','App\Http\Controllers\LoaiSPController@getThemLoaiSanPham')->name('loaisanpham.themloaisanpham.themloaisanpham');
Route::post('Admin/LoaiSanPham/ThemLoaiSanPham',[
    'as'=>'postThemLoaiSanPham',
    'uses'=>'App\Http\Controllers\LoaiSPController@postThemLoaiSanPham',
]);
Route::get('Admin/LoaiSanPham/SuaLoaiSanPham/{MaLSP}','App\Http\Controllers\LoaiSPController@getSuaLoaiSanPham')->name('loaisanpham.sualoaisanpham.sualoaisanpham');
Route::post('Admin/LoaiSanPham/SuaLoaiSanPham/{MaLSP}',[
    'as'=>'postSuaLoaiSanPham',
    'uses'=>'App\Http\Controllers\LoaiSPController@postSuaLoaiSanPham',
]);
Route::get('Admin/LoaiSanPham/XoaLoaiSanPham/{MaLSP}','App\Http\Controllers\LoaiSPController@XoaLoaiSanPham')->name('loaisanpham.xoaloaisanpham');

//Đơn vị tính:
Route::get('Admin/SanPham/DonViTinh','App\Http\Controllers\SanPhamController@AdminDonViTinh')->name('sanpham.donvitinh.admin');
Route::get('Admin/SanPham/DonViTinh/ThemDonViTinh','App\Http\Controllers\SanPhamController@getThemDonViTinh')->name('sanpham.donvitinh.themdonvitinh.themdonvitinh');
Route::post('Admin/SanPham/DonViTinh/ThemDonViTinh',[
    'as'=>'postThemDonViTinh',
    'uses'=>'App\Http\Controllers\SanPhamController@postThemDonViTinh',
]);
Route::get('Admin/SanPham/DonViTinh/SuaDonViTinh/{MaDVT}','App\Http\Controllers\SanPhamController@getSuaDonViTinh')->name('sanpham.donvitinh.suadonvitinh.suadonvitinh');
Route::post('Admin/SanPham/DonViTinh/SuaDonViTinh/{MaDVT}',[
    'as'=>'postSuaDonViTinh',
    'uses'=>'App\Http\Controllers\SanPhamController@postSuaDonViTinh',
]);
Route::get('Admin/SanPham/DonViTinh/XoaDonViTinh/{MaDVT}','App\Http\Controllers\SanPhamController@XoaDonViTinh')->name('sanpham.donvitinh.xoadonvitinh');

//Sản phẩm:
Route::get('Admin/SanPham','App\Http\Controllers\SanPhamController@Admin')->name('sanpham.admin');
Route::get('Admin/SanPham/ThemSanPham','App\Http\Controllers\SanPhamController@getThemSanPham')->name('sanpham.themsanpham.themsanpham');
Route::post('Admin/SanPham/ThemSanPham',[
    'as'=>'postThemSanPham',
    'uses'=>'App\Http\Controllers\SanPhamController@postThemSanPham',
]);
Route::get('Admin/SanPham/SuaSanPham/{MaSP}','App\Http\Controllers\SanPhamController@getSuaSanPham')->name('sanpham.suasanpham.suasanpham');
Route::post('Admin/SanPham/SuaSanPham/{MaSP}',[
    'as'=>'postSuaSanPham',
    'uses'=>'App\Http\Controllers\SanPhamController@postSuaSanPham',
]);
Route::get('Admin/SanPham/XoaSanPham/{MaSP}','App\Http\Controllers\SanPhamController@XoaSanPham')->name('sanpham.xoasanpham');

//Vé Buffet:
// Route::get('Admin/VeBuffet','App\Http\Controllers\VeBuffetController@Admin')->name('vebuffet.admin');
// Route::get('Admin/VeBuffet/ThemVeBuffet','App\Http\Controllers\VeBuffetController@getThemVeBuffet')->name('vebuffet.themvebuffet.themvebuffet');
// Route::post('Admin/VeBuffet/ThemVeBuffet',[
//     'as'=>'postThemVeBuffet',
//     'uses'=>'App\Http\Controllers\VeBuffetController@postThemVeBuffet',
// ]);
// Route::get('Admin/VeBuffet/SuaVeBuffet/{MaVe}','App\Http\Controllers\VeBuffetController@getSuaVeBuffet')->name('vebuffet.suavebuffet.suavebuffet');
// Route::post('Admin/VeBuffet/SuaVeBuffet/{MaVe}',[
//     'as'=>'postSuaVeBuffet',
//     'uses'=>'App\Http\Controllers\VeBuffetController@postSuaVeBuffet',
// ]);
// Route::get('Admin/VeBuffet/XoaVeBuffet/{MaVe}','App\Http\Controllers\VeBuffetController@XoaVeBuffet')->name('vebuffet.xoavebuffet');

//Bàn ăn:
Route::get('Admin/Ban','App\Http\Controllers\BanController@Admin')->name('ban.admin');
Route::get('Admin/Ban/ThemBan','App\Http\Controllers\BanController@getThemBan')->name('ban.themban.themban');
Route::post('Admin/Ban/ThemBan',[
    'as'=>'postThemBan',
    'uses'=>'App\Http\Controllers\BanController@postThemBan',
]);
Route::get('Admin/Ban/SuaBan/{MaBan}','App\Http\Controllers\BanController@getSuaBan')->name('ban.suaban.suaban');
Route::post('Admin/Ban/SuaBan/{MaBan}',[
    'as'=>'postSuaBan',
    'uses'=>'App\Http\Controllers\BanController@postSuaBan',
]);
Route::get('Admin/Ban/XoaBan/{MaBan}','App\Http\Controllers\BanController@XoaBan')->name('ban.xoaban');

//Nhóm món:
Route::get('Admin/NhomMon','App\Http\Controllers\NhomMonController@Admin')->name('nhommon.admin');
Route::get('Admin/NhomMon/ThemNhomMon','App\Http\Controllers\NhomMonController@getThemNhomMon')->name('nhommon.themnhommon.themnhommon');
Route::post('Admin/NhomMon/ThemNhomMon',[
    'as'=>'postThemNhomMon',
    'uses'=>'App\Http\Controllers\NhomMonController@postThemNhomMon',
]);
Route::get('Admin/NhomMon/SuaNhomMon/{MaNM}','App\Http\Controllers\NhomMonController@getSuaNhomMon')->name('nhommon.suanhommon.suanhommon');
Route::post('Admin/NhomMon/SuaNhomMon/{MaNM}',[
    'as'=>'postSuaNhomMon',
    'uses'=>'App\Http\Controllers\NhomMonController@postSuaNhomMon',
]);
Route::get('Admin/NhomMon/XoaNhomMon/{MaNM}','App\Http\Controllers\NhomMonController@XoaNhomMon')->name('nhommon.xoanhommon');

//Món:
Route::get('Admin/Mon','App\Http\Controllers\MonController@Admin')->name('mon.admin');
Route::get('Admin/Mon/ThemMon','App\Http\Controllers\MonController@getThemMon')->name('mon.themmon.themmon');
Route::post('Admin/Mon/ThemMon',[
    'as'=>'postThemMon',
    'uses'=>'App\Http\Controllers\MonController@postThemMon',
]);
Route::get('Admin/Mon/SuaMon/{MaMon}','App\Http\Controllers\MonController@getSuaMon')->name('mon.suamon.suamon');
Route::post('Admin/Mon/SuaMon/{MaMon}',[
    'as'=>'postSuaMon',
    'uses'=>'App\Http\Controllers\MonController@postSuaMon',
]);
Route::get('Admin/Mon/XoaMon/{MaMon}','App\Http\Controllers\MonController@XoaMon')->name('mon.xoamon');

//Bán hàng:
Route::get('BanHang','App\Http\Controllers\BanHangController@Admin')->name('banhang.admin');
Route::get('BanHang/ChiTietBan/{MaBan}','App\Http\Controllers\BanHangController@SoBan')->name('banhang.chitietban');
Route::post('BanHang/ChiTietBan/Order',[
    'as'=>'postThemMonChon',
    'uses'=>'App\Http\Controllers\BanHangController@postThemMonChon',
]);
Route::get('BanHang/ChiTietBan/XoaOrder/{MaBan}/{MaMon}','App\Http\Controllers\BanHangController@XoaOrder')->name('banhang.xoaorder');
Route::post('BanHang/ChiTietBan/ThanhToan',[
    'as'=>'postThanhToan',
    'uses'=>'App\Http\Controllers\BanHangController@postThanhToan',
]);

//Hóa đơn:
Route::get('Admin/HoaDon','App\Http\Controllers\HoaDonController@Admin')->name('hoadon.admin');

//Thống kê:
Route::get('Admin/ThongKe','App\Http\Controllers\ThongKeController@Admin')->name('thongke.admin');