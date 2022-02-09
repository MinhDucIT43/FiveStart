@extends("./master")

@section('page_title')
    Admin - Thêm loại sản phẩm
@endsection

@section('main')
    <table id="dangnhap">
            <tr>
                <td id="tieude">THÊM LOẠI SẢN PHẨM</td>
            </tr>
            <tr>
                <td>
                    <form action="{{route('postThemLoaiSanPham')}}" method="post" onsubmit="return kiemtrathemloaisanpham()" oninput="return kiemtrathemloaisanpham()"> @csrf
                        <table>
                            <tr>
                                <td><label for="tenloaisanpham">Tên loại sản phẩm</label></td>
                                <td><input type="text" name="tenloaisanpham" id="tenloaisanpham" placeholder="Nhập tên loại sản phẩm"/></td>
                                <td><p id="tenloaisanphamError"></p></td>
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