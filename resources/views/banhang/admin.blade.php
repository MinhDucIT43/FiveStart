<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bán hàng</title>
    <link rel="stylesheet" href="{{asset('css/banhang.css')}}">
    <link rel="shortcut icon" href="./hinhanh/icon.png">
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Link Fontawesome-icon -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Script doi mau ban -->
</head>
<body>
    <div id="wrapper">
        <div class="ban">
            <div id="header">
                <p id="home">Nhân viên: {{ App\Models\nhanvien::where('TenDangNhap',Session::get('tendangnhap'))->value('TenNV') }}</p>
                <a href="{{ route('dangxuat') }}" id="logout"><i class="fas fa-sign-out-alt">Đăng xuất</i></a>
            </div>
            <div id="cacban" class="ban">
                @foreach($data as $ban)
                    <a href="{{ route('banhang.chitietban',['MaBan' => $ban['MaBan']]) }}" style="text-decoration: none">
                        <button id="display-ban" type="submit">
                            <i id="khachhang" class="fas fa-users"></i>
                            <p>{{$ban['SoBan']}}</p>
                        </button>
                    </a>
                @endforeach
            </div>
        </div>
        <div id="thongtin-ban">
            <h3 style="text-align:center;">DANH SÁCH MÓN ĂN</h3>
            <div id="danhsachmonan">
                    <table class="table table-bordered">
                        <tr>
                            <th>Tên món</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                        </tr>
                        <tbody>
                        @foreach($mon as $monan)
                        <tr>
                            <td>{{ $monan['TenMon'] }}</td>
                            <td>{{ number_format($monan['Gia']) }} VNĐ</td>
                            @if($monan['soluong']==0)
                                <td style="color:red;">Hết hàng</td>
                            @else
                                <td>{{ $monan['soluong'] }}</td>
                            @endif
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                {{ $mon->links() }}
            </div>
        </div>
    </div>
    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>