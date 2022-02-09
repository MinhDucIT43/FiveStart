@extends("./master")

@section('page_title')
    Admin - Sửa sản phẩm
@endsection

@section('main')
    <table id="dangnhap">
            <tr>
                <td id="tieude">
                    <div class="jumbotron text-center">
                        <h1>SỬA SẢN PHẨM</h1> 
                    </div>
                </td>
            </tr>
            <tr>
                <td>@foreach($data as $sp)
                    <form action="{{route('postSuaSanPham',['MaSP' => $sp['MaSP']]) }}" method="post" onsubmit="return kiemtrathemsanpham()"> @csrf
                        <table>
                            <tr>
                                <td><label for="tensanpham">Tên sản phẩm</label></td>
                                <td><input type="text" name="tensanpham" id="tensanpham" placeholder="Nhập tên sản phẩm" value="{{$sp->TenSP}}"/></td>
                                <td><p id="tensanphamError"></p></td>
                            </tr>
                            <tr>
                                <td><label for="loaisanpham">Loại sản phẩm</label></td>
                                <td>
                                    <select name="loaisanpham">
                                        @foreach($loaisanpham as $lsp)
                                            @if($sp->MaLSP == $lsp->MaLSP)
                                            <option value="{{$lsp->MaLSP}}" selected="selected" style="display:none">{{$lsp->TenLSP}}</option>
                                            @endif
                                            <option value="{{$lsp->MaLSP}}">{{$lsp->TenLSP}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="slton">Số lượng</label></td>
                                <td><input type="text" name="slton" id="slton" placeholder="Nhập số lượng tồn kho" value="{{$sp->SLTon}}"/><br/></td>
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
                                            @if($sp->MaDVT == $dvt->MaDVT)
                                            <option value="{{$dvt->MaDVT}}" selected="selected" style="display:none">{{$dvt->DVT}}</option>
                                            @endif
                                            <option value="{{$dvt->MaDVT}}">{{$dvt->DVT}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                            <td><label for="gianhap">Đơn giá</label></td>
                                <td><input type="text" name="gianhap" id="gianhap" placeholder="Nhập giá nhập" value="{{$sp->GiaNhap}}"/></td>
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
                                <td><input type="submit" value="Sửa" id="submit-them"></td>
                            </tr>
                        </table>
                    </form>@endforeach
                    <ul class="alert text-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
    </table>
@endsection