@extends("./master")

@section('page_title')
    Admin - Thêm nhân viên
@endsection

@section('main')
    <table id="dangnhap">
            <tr>
                <td id="tieude">
                    <div class="jumbotron text-center">
                        <h1>THÊM NHÂN VIÊN</h1> 
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <form action="{{route('postThemNhanVien')}}" method="post" onsubmit="return kiemtrathemnhanvien()"> @csrf
                        <table>
                            <tr>
                                <td><label for="tennhanvien">Tên nhân viên</label></td>
                                <td><input type="text" name="tennhanvien" id="tennhanvien" value="{{ old('tennhanvien') }}" placeholder="Nhập tên nhân viên"/></td>
                                <td><p id="tennhanvienError"></p></td>
                            </tr>
                            <tr>
                                <td><label for="namsinh">Năm sinh</label></td>
                                <td><input type="date" id="namsinh" name="namsinh" value="{{ old('namsinh') }}" max="<?php $datenow = Carbon\Carbon::now('Asia/Ho_Chi_Minh'); echo $datenow->toDateString(); ?>"></td>
                                <td><p id="namsinhError"></p></td>
                            </tr>
                            <tr>
                                <td><label for="gioitinh">Giới tính</label></td>
                                <td>
                                    <?php
                                        if(old('gioitinh')=='Nam'){ ?>
                                            <input type="radio" name="gioitinh" id="gioitinh" value="Nam" checked="checked"/>Nam
                                            <input type="radio" name="gioitinh" id="gioitinh" value="Nữ"/>Nữ
                                        <?php }
                                        else if (old('gioitinh')=='Nữ'){
                                        ?>
                                            <input type="radio" name="gioitinh" id="gioitinh" value="Nam"/>Nam
                                            <input type="radio" name="gioitinh" id="gioitinh" value="Nữ" checked="checked"/>Nữ
                                        <?php }
                                        else{ ?>
                                            <input type="radio" name="gioitinh" id="gioitinh" value="Nam"/>Nam
                                            <input type="radio" name="gioitinh" id="gioitinh" value="Nữ"/>Nữ
                                        <?php }
                                    ?>
                                </td>
                                <td><p id="gioitinhError"></p></td>
                            </tr>
                            <tr>
                                <td><label for="matkhau">Mật khẩu</label></td>
                                <td><input type="password" name="matkhau" id="matkhau" value="{{ old('matkhau') }}" placeholder="Nhập mật khẩu nhân viên"/><br/></td>
                                <td><p id="matkhauError"></p></td>
                            </tr>
                            <tr>
                                <td><label for="diachi">Địa chỉ</label></td>
                                <td><textarea name="diachi" id="diachi" cols="21" rows="6" placeholder="Nhập địa chỉ nhân viên">{{ old('diachi') }}</textarea></td>
                                <td><p id="diachiError"></p></td>
                            </tr>
                            <tr>
                                <td><label for="sodienthoai">Số điện thoại</label></td>
                                <td><input type="text" name="sodienthoai" value="{{ old('sodienthoai') }}" id="sodienthoai" placeholder="Nhập số điện thoại"/></td>
                                <td>
                                    @if(session('alert-xoa'))
                                        <div>
                                            <p id="alert-xoa"><i class="fas fa-times"></i>{{ session('alert-xoa') }}</p>
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
                                            <option value="{{$cv->MaCV}}">{{$cv->TenCV}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="ngayvaolam">Ngày vào làm</label></td>
                                <td><input type="date" id="ngayvaolam" name="ngayvaolam" value="{{ old('ngayvaolam') }}"></td>
                                <td><p id="ngayvaolamError"></p></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Thêm" id="submit-them"></td>
                            </tr>
                        </table>
                    </form>
                    @if(count($errors) > 0)
                    <ul class="alert text-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                </td>
            </tr>
    </table>
@endsection