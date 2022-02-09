@extends("./master")

@section('page_title')
    Admin - Sửa bàn ăn
@endsection

@section('main')
    <table id="dangnhap">
            <tr>
                <td id="tieude">SỬA BÀN ĂN</td>
            </tr>
            <tr>
                <td>@foreach($data as $ban)
                    <form action="{{route('postSuaBan',['MaBan' => $ban['MaBan']]) }}" method="post" onsubmit="return kiemtrathembanan()"> @csrf
                        <table>
                            <tr>
                                <td><label for="soban">Số bàn</label></td>
                                <td><input type="text" name="soban" value="{{ $ban->SoBan }}" id="soban" placeholder="Nhập số bàn"/></td>
                                <td><p id="sobanError"></p></td>
                            </tr>
                            <tr>
                                <td><label for="trangthai">Trạng thái</label></td>
                                    @if($ban->TrangThai == 'Có người')
                                        <td>
                                            <input type="radio" name="trangthai" id="trangthai" value="Có người" checked="checked"/>Có người
                                            <input type="radio" name="trangthai" id="trangthai" value="Trống"/>Trống
                                        </td>
                                    @elseif($ban->TrangThai == 'Trống')
                                        <td>
                                            <input type="radio" name="trangthai" id="trangthai" value="Có người"/>Có người
                                            <input type="radio" name="trangthai" id="trangthai" value="Trống" checked="checked"/>Trống
                                        </td>
                                    @endif
                                </td>
                                <td><p id="trangthaiError"></p></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Thêm" id="submit-them"></td>
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