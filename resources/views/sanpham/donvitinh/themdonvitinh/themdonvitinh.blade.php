@extends("./master")

@section('page_title')
    Admin - Thêm đơn vị tính
@endsection

@section('main')
    <table id="dangnhap">
            <tr>
                <td id="tieude">THÊM ĐƠN VỊ TÍNH</td>
            </tr>
            <tr>
                <td>
                    <form action="{{route('postThemDonViTinh')}}" method="post" onsubmit="return kiemtrathemdonvitinh()" oninput="return kiemtrathemdonvitinh()"> @csrf
                        <table>
                            <tr>
                                <td><label for="tendonvitinh">Tên đơn vị tính</label></td>
                                <td><input type="text" name="tendonvitinh" id="tendonvitinh" placeholder="Nhập tên đơn vị tính"/></td>
                                <td><p id="tendonvitinhError"></p></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Thêm" id="submit-them"></td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
    </table>
@endsection