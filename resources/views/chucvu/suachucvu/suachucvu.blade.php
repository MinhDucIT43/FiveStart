@extends("./master")

@section('page_title')
    Admin - Sửa chức vụ
@endsection

@section('main')
<table id="dangnhap">
            <tr>
                <td id="tieude">SỬA CHỨC VỤ</td>
            </tr>
            <tr>
                <td>@foreach($data as $cv)
                    <form action="{{route('postSuaChucVu',['MaCV' => $cv['MaCV']]) }}" method="post" onsubmit="return kiemtrathemchucvu()"> @csrf
                        <table>
                            <tr>
                                <td><label for="tenchucvu">Tên chức vụ</label></td>
                                <td><input type="text" name="tenchucvu" id="tenchucvu" placeholder="Nhập chức vụ" value="{{$cv->TenCV}}"/></td>
                                <td><p id="tenchucvuError"></p></td>
                            </tr>
                            <tr>
                                <td><label for="tienluong">Tiền lương</label></td>
                                <td><input type="text" name="tienluong" id="tienluong" placeholder="Nhập tiền lương" value="{{$cv->TienLuong}}"/></td>
                                <td class="alert text-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </td>
                                <td>    
                                    @if (session('error'))
                                        <div>
                                            <p id="alert-xoa"><i class="fas fa-times"></i>{{ session('error') }}</p>
                                        </div>
                                    @endif
                                </td>
                                <td><p id="tienluongError"></p></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Sửa" id="submit-them"></td>
                            </tr>
                        </table>
                    </form>
                    @endforeach
                </td>
            </tr>
    </table>
@endsection