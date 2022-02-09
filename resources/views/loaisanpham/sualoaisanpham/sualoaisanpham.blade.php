@extends("./master")

@section('page_title')
    Admin - Sửa loại sản phẩm
@endsection

@section('main')
<table id="dangnhap">
            <tr>
                <td id="tieude">SỬA LOẠI SẢN PHẨM</td>
            </tr>
            <tr>
                <td>@foreach($data as $lsp)
                    <form action="{{route('postSuaLoaiSanPham',['MaLSP' => $lsp['MaLSP']]) }}" method="post" onsubmit="return kiemtrathemloaisanpham()" oninput="return kiemtrathemloaisanpham()"> @csrf
                        <table>
                            <tr>
                                <td><label for="tenloaisanpham">Tên loại sản phẩm</label></td>
                                <td><input type="text" name="tenloaisanpham" id="tenloaisanpham" placeholder="Nhập loại sản phẩm" value="{{$lsp->TenLSP}}"/></td>
                                <td><p id="tenloaisanphamError"></p></td>
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