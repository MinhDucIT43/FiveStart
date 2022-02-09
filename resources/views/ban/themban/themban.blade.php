@extends("./master")

@section('page_title')
    Admin - Thêm bàn ăn
@endsection

@section('main')
    <table id="dangnhap">
            <tr>
                <td id="tieude">THÊM BÀN ĂN</td>
            </tr>
            <tr>
                <td>
                    <form action="{{ route('postThemBan') }}" method="post" onsubmit="return kiemtrathembanan()"> @csrf
                        <table>
                            <tr>
                                <td><label for="soban">Số bàn</label></td>
                                <td><input type="text" name="soban" value="{{ old('soban') }}" id="soban" placeholder="Nhập số bàn"/></td>
                                <td><p id="sobanError"></p></td>
                            </tr>
                            <tr>
                                <td><label for="trangthai">Trạng thái</label></td>
                                <td style="padding-left: 10px;">
                                    <?php
                                        if(old('trangthai')=='Có người'){ ?>
                                            <input type="radio" name="trangthai" id="trangthai" value="Có người" checked="checked"/>Có người
                                            <input type="radio" name="trangthai" id="trangthai" value="Trống"/>Trống
                                        <?php }
                                        else if (old('trangthai')=='Trống'){
                                        ?>
                                            <input type="radio" name="trangthai" id="trangthai" value="Có người"/>Có người
                                            <input type="radio" name="trangthai" id="trangthai" value="Trống" checked="checked"/>Trống
                                        <?php }
                                        else{ ?>
                                            <input type="radio" name="trangthai" id="trangthai" value="Có người"/>Có người
                                            <input type="radio" name="trangthai" id="trangthai" value="Trống"/>Trống
                                        <?php }
                                    ?>
                                </td>
                                <td><p id="trangthaiError"></p></td>
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