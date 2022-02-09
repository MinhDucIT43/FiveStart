@extends("./master")

@section('page_title')
    Admin - Thêm sản phẩm
@endsection

@section('main')
    <table id="dangnhap">
            <tr>
                <td id="tieude">
                    <div class="jumbotron text-center">
                        <h1>THÊM SẢN PHẨM</h1> 
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <form action="{{ route('postThemSanPham') }}" method="post" onsubmit="return kiemtrathemsanpham()"> @csrf
                        <table>
                            <tr>
                                <td><label for="tensanpham">Tên sản phẩm</label></td>
                                <td><input type="text" name="tensanpham" value="{{ old('tensanpham') }}" id="tensanpham" placeholder="Nhập tên sản phẩm"/></td>
                                <td><p id="tensanphamError"></p></td>
                            </tr>
                            <tr>
                                <td><label for="loaisanpham">Loại sản phẩm</label></td>
                                <td>
                                    <select name="loaisanpham">
                                        @foreach($loaisanpham as $lsp)
                                            <option value="{{$lsp->MaLSP}}">{{$lsp->TenLSP}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="slton">Số lượng</label></td>
                                <td><input type="text" name="slton" value="{{ old('slton') }}" id="slton" placeholder="Nhập số lượng tồn kho"/><br/></td>
                                <td>    
                                    @if (session('error-sl'))
                                        <div>
                                            <p id="alert-xoa"><i class="fas fa-times"></i>{{ session('error-sl') }}</p>
                                        </div>
                                    @endif
                                </td>
                                <td><p id="sltonError"></p></td>
                            </tr>
                            <tr>
                                <td><label for="donvitinh">Đơn vị tính</label></td>
                                <td>
                                    <select name="donvitinh">
                                        @foreach($donvitinh as $dvt)
                                            <option value="{{$dvt->MaDVT}}">{{$dvt->DVT}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                            <td><label for="gianhap">Đơn giá</label></td>
                                <td><input type="text" name="gianhap" value="{{ old('gianhap') }}" id="gianhap" placeholder="Nhập giá nhập"/></td>
                                <td>    
                                    @if (session('error-dg'))
                                        <div>
                                            <p id="alert-xoa"><i class="fas fa-times"></i>{{ session('error-dg') }}</p>
                                        </div>
                                    @endif
                                </td>
                                <td><p id="gianhapError"></p></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Thêm" id="submit-them"></td>
                            </tr>
                        </table>
                    </form>
                    <ul class="alert text-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
    </table>
@endsection