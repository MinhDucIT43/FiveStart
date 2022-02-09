@extends("./master")

@section('page_title')
    Admin - Sửa món ăn
@endsection

@section('main')
    <table id="dangnhap">
            <tr>
                <td id="tieude">
                    <div class="jumbotron text-center">
                        <h1>SỬA MÓN ĂN</h1> 
                    </div>
                </td>
            </tr>
            <tr>
                <td>@foreach($data as $ma)
                    <form action="{{route('postSuaMon',['MaMon' => $ma['MaMon']]) }}" method="post" onsubmit="return kiemtrathemmon()"> @csrf
                        <table>
                            <tr>
                                <td><label for="tenmon">Tên sản phẩm</label></td>
                                <td><input type="text" name="tenmon" id="tenmon" placeholder="Nhập tên món ăn" value="{{$ma->TenMon}}"/></td>
                                <td><p id="tenmonError"></p></td>
                            </tr>
                            <tr>
                                <td><label for="nhommon">Thuộc nhóm món</label></td>
                                <td>
                                    <select name="nhommon">
                                        @foreach($nhommon as $nm)
                                            @if($ma->MaNM == $nm->MaNM)
                                            <option value="{{$nm->MaNM}}" selected="selected" style="display:none">{{$nm->TenNM}}</option>
                                            @endif
                                            <option value="{{$nm->MaNM}}">{{$nm->TenNM}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="donvitinh">Đơn vị tính</label></td>
                                <td>
                                    <select name="donvitinh">
                                        @foreach($donvitinh as $dvt)
                                            @if($ma->MaDVT == $dvt->MaDVT)
                                            <option value="{{$dvt->MaDVT}}" selected="selected" style="display:none">{{$dvt->DVT}}</option>
                                            @endif
                                            <option value="{{$dvt->MaDVT}}">{{$dvt->DVT}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                            <td><label for="gianhap">Đơn giá</label></td>
                                <td><input type="text" name="gianhap" id="gianhap" placeholder="Nhập giá nhập" value="{{$ma->Gia}}"/></td>
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
                                <td><label for="slton">Số lượng</label></td>
                                <td><input type="text" name="slton" id="slton" placeholder="Nhập số lượng tồn kho" value="{{$ma->soluong}}"/><br/></td>
                                <td style="font-size:15px;">    
                                    @if (session('error-sl'))
                                        <div>
                                            <p id="alert-xoa"><i class="fas fa-times"></i>{{ session('error-sl') }}</p>
                                        </div>
                                    @endif
                                </td>
                                <td><p id="sltonError"></p></td>
                            </tr>
                            <tr>
                                <td><label for="hinhanh">Hình ảnh</label></td>
                                <td><input type="file" id="hinhanh" name="hinhanh" value="{{ asset('hinhanhmonan/'.$ma['hinhanh'])}} "></td>
                                <td><p id="hinhanhError"></p></td>
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