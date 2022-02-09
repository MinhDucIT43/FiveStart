@extends("./master")

@section('page_title')
    Admin - Sửa nhân viên
@endsection

@section('main')
<table id="dangnhap">
            <tr>
                <td id="tieude">SỬA NHÂN VIÊN</td>
            </tr>
            <tr>
                <td>@foreach($data as $nv)
                    <form action="{{route('postSuaNhanVien',['TenDangNhap' => $nv['TenDangNhap']]) }}" method="post" onsubmit="return kiemtrathemnhanvien()"> @csrf
                        <table>
                            <tr>
                                <td><label for="tennhanvien">Tên nhân viên</label></td>
                                <td><input type="text" name="tennhanvien" id="tennhanvien" placeholder="Nhập tên nhân viên" value="{{$nv->TenNV}}"/></td>
                                <td><p id="tennhanvienError"></p></td>
                            </tr>
                            <tr>
                                <td><label for="namsinh">Năm sinh</label></td>
                                <td><input type="date" id="namsinh" name="namsinh" value="{{$nv->NamSinh}}" max="<?php $datenow = Carbon\Carbon::now('Asia/Ho_Chi_Minh'); echo $datenow->toDateString(); ?>"></td>
                                <td><p id="namsinhError"></p></td>
                            </tr>
                            <tr>
                                <td><label for="gioitinh">Giới tính</label></td>
                                @if($nv->GioiTinh == 'Nam')
                                    <td>
                                        <input type="radio" name="gioitinh" id="gioitinh" value="Nam" checked="checked"/>Nam
                                        <input type="radio" name="gioitinh" id="gioitinh" value="Nữ"/>Nữ
                                    </td>
                                @elseif($nv->GioiTinh == 'Nữ')
                                    <td>
                                        <input type="radio" name="gioitinh" id="gioitinh" value="Nam"/>Nam
                                        <input type="radio" name="gioitinh" id="gioitinh" value="Nữ" checked="checked"/>Nữ
                                    </td>
                                @endif
                            </tr>
                            <tr>
                                <td><label for="matkhau">Mật khẩu</label></td>
                                <td><input type="password" name="matkhau" id="matkhau" placeholder="Nhập mật khẩu nhân viên" value="{{$nv->MatKhau}}"/><br/></td>
                                <td><p id="matkhauError"></p></td>
                            </tr>
                            <tr>
                                <td><label for="diachi">Địa chỉ</label></td>
                                <td><textarea name="diachi" id="diachi" cols="21" rows="6" placeholder="Nhập địa chỉ nhân viên">{{$nv->DiaChi}}</textarea></td>
                                <td><p id="diachiError"></p></td>
                            </tr>
                            <tr>
                                <td><label for="sodienthoai">Số điện thoại</label></td>
                                <td><input type="text" name="sodienthoai" id="sodienthoai" placeholder="Nhập số điện thoại" value="{{$nv->SoDT}}"/></td>
                                <td>    
                                    @if (session('error'))
                                        <div>
                                            <p id="alert-xoa"><i class="fas fa-times"></i>{{ session('error') }}</p>
                                        </div>
                                    @endif
                                </td>
                                <td><p id="sodienthoaiError"></p></td>
                            </tr>
                            <tr>
                                <td><label for="chucvu">Chức vụ</label></td>
                                <td>
                                    <select name="chucvu">
                                        @foreach($bien as $cv)
                                            @if($nv->MaCV == $cv->MaCV)
                                            <option value="{{$cv->MaCV}}" selected="selected" style="display:none">{{$cv->TenCV}}</option>
                                            @endif
                                            <option value="{{$cv->MaCV}}">{{$cv->TenCV}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="ngayvaolam">Ngày vào làm</label></td>
                                <td><input type="date" id="ngayvaolam" name="ngayvaolam" value="{{$nv->NgayVaoLam}}"></td>
                                <td><p id="ngayvaolamError"></p></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Sửa" id="submit-them"></td>
                            </tr>
                        </table>
                    </form>
                    <ul class="alert text-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endforeach
                </td>
            </tr>
    </table>
@endsection