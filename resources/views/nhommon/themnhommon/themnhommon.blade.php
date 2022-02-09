@extends("./master")

@section('page_title')
    Admin - Thêm nhóm món
@endsection

@section('main')
    <table id="dangnhap">
            <tr>
                <td id="tieude">THÊM NHÓM MÓN</td>
            </tr>
            <tr>
                <td>
                    <form action="{{route('postThemNhomMon')}}" method="post" onsubmit="return kiemtrathemnhommon()" oninput="return kiemtrathemnhommon()"> @csrf
                        <table>
                            <tr>
                                <td><label for="tennhommon">Tên nhóm món</label></td>
                                <td><input type="text" name="tennhommon" id="tennhommon" placeholder="Nhập tên nhóm món"/></td>
                                <td><p id="tennhommonError"></p></td>
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