@extends("./master")

@section('page_title')
    Admin - Thêm chức vụ
@endsection

@section('main')
    <table id="dangnhap">
            <tr>
                <td id="tieude">THÊM CHỨC VỤ</td>
            </tr>
            <tr>
                <td>
                    <form action="{{route('postThemChucVu')}}" method="post" onsubmit="return kiemtrathemchucvu()"> @csrf
                        <table>
                            <tr>
                                <td><label for="tenchucvu">Tên chức vụ</label></td>
                                <td><input type="text" name="tenchucvu" value="{{ old('tenchucvu') }}" id="tenchucvu" placeholder="Nhập tên chức vụ"/></td>
                                <td><p id="tenchucvuError"></p></td>
                            </tr>
                            <tr>
                                <td><label for="tienluong">Tiền lương</label></td>
                                <td><input type="text" name="tienluong" value="{{ old('tienluong') }}" id="tienluong" placeholder="Nhập tiền lương"/></td>
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
                                <td><input type="submit" value="Thêm" id="submit-them"></td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
    </table>
@endsection