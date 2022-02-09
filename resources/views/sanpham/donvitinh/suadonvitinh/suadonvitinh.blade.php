@extends("./master")

@section('page_title')
    Admin - Sửa đơn vị tính
@endsection

@section('main')
<table id="dangnhap">
            <tr>
                <td id="tieude">SỬA ĐƠN VỊ TÍNH</td>
            </tr>
            <tr>
                <td>@foreach($data as $dvt)
                    <form action="{{route('postSuaDonViTinh',['MaDVT' => $dvt['MaDVT']]) }}" method="post" onsubmit="return kiemtrathemdonvitinh()"> @csrf
                        <table>
                            <tr>
                                <td><label for="tendonvitinh">Tên đơn vị tính</label></td>
                                <td><input type="text" name="tendonvitinh" id="tendonvitinh" placeholder="Nhập đơn vị tính" value="{{$dvt->DVT}}"/></td>
                                <td><p id="tendonvitinhError"></p></td>
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