@extends("./master")

@section('page_title')
    Admin - Sửa nhóm món
@endsection

@section('main')
<table id="dangnhap">
            <tr>
                <td id="tieude">SỬA NHÓM MÓN</td>
            </tr>
            <tr>
                <td>@foreach($data as $nm)
                    <form action="{{route('postSuaNhomMon',['MaNM' => $nm['MaNM']]) }}" method="post" onsubmit="return kiemtrathemnhommon()" oninput="return kiemtrathemnhommon()"> @csrf
                        <table>
                            <tr>
                                <td><label for="tennhommon">Tên nhóm món</label></td>
                                <td><input type="text" name="tennhommon" id="tennhommon" placeholder="Nhập tên nhóm món" value="{{$nm->TenNM}}"/></td>
                                <td><p id="tennhommonError"></p></td>
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