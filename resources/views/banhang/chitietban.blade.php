<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="60"> -->
    <title>Bán hàng</title>
    <link rel="stylesheet" href="{{asset('css/order.css')}}">
    <link rel="shortcut icon" href="{{asset('hinhanh/icon.png')}}">
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
                @foreach($banso as $ban)
                    <input type="hidden" {{date_default_timezone_set("Asia/Ho_Chi_Minh")}}>
                    <p style="display: inline; color:white;">Bàn số: {{$ban['SoBan']}}</p>
                    <p style="float: right; color:white;">Ngày giờ gọi: {{ date('m/d/Y h:i a') }}</p>
                
            </div>
            <div id="banso" class="ban">
                <table class="table table-bordered">
                    <tr>
                        <th>Tên món</th>
                        <th>Số lượng</th>
                        <th>Đơn vị</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                        <th></th>
                    </tr>
                    <tbody>
                    <?php $data = DB::table('temp')->where('MaBan',$ban->MaBan)->first(); ?>
                    @if($data)
                        <?php $datane = DB::table('temp')->where('MaBan',$ban->MaBan)->get(); 
                        $tongtien = 0;
                        ?>
                        <form action="{{route('postThanhToan')}}" method="POST"> @csrf
                        <input type="hidden" name="maban" value="{{$ban['MaBan']}}">
                        @foreach($datane as $dt)
                            <tr>
                                <td>{{ App\Models\mon::where('MaMon',$dt->MaMon)->value('TenMon') }}</td>
                                <td>{{$dt->soluong}}</td>
                                <?php $madvt = App\Models\mon::where('MaMon',$dt->MaMon)->value('MaDVT');?>
                                <td>{{ App\Models\donvitinh::where('MaDVT',$madvt)->value('DVT') }}</td>
                                <td>{{ App\Models\mon::where('MaMon',$dt->MaMon)->value('Gia') }}</td>
                                <td>{{($dt->soluong)*(App\Models\mon::where('MaMon',$dt->MaMon)->value('Gia'))}}</td>
                                <?php
                                    $tongtien += ($dt->soluong)*(App\Models\mon::where('MaMon',$dt->MaMon)->value('Gia'));
                                ?>
                                <td><a href="{{ url('')}}/BanHang/ChiTietBan/XoaOrder/{{$dt->MaBan}}/{{$dt->MaMon}}"><i class="fas fa-user-minus" style="color: #ff0000"></i></a></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Tổng tiền:</td>
                            <td>
                                {{$tongtien}}
                                <input type="hidden" name="thanhtien" value="{{$tongtien}}">
                            </td>
                        </tr>
                        <tr>
                            <td><button type="submit">Thanh toán</button></td>
                        </tr>
                        </form>
                    @else
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div id="thongtin-ban">
            <h3 style="text-align: center;">Danh sách món ăn</h3>
            <table class="table table-bordered">
                <tr>
                    <th>Tên món</th>
                    <th>Loại món</th>
                    <th>Giá</th>
                    <th>Số lượng còn</th>
                    <th>Số lượng</th>
                    <th></th>
                </tr>
                <tbody>
                @foreach($mon as $monan)
                <tr>
                    <form action="{{route('postThemMonChon')}}" method="POST"> @csrf
                        <input type="hidden" name="mamon" value="{{$monan['MaMon']}}">
                        @foreach($banso as $ban)
                            <input type="hidden" name="maban" value="{{$ban['MaBan']}}">
                        @endforeach
                        <td>{{ $monan['TenMon'] }}</td>
                        <td>{{ App\Models\nhommon::where('MaNM',$monan['MaNM'])->value('TenNM') }}</td>
                        <td>{{$monan['Gia']}}</td>
                        @if($monan['soluong']==0)
                            <td style="color:red;">Hết hàng</td>
                            <td style="color:red;">
                                Hết hàng
                            </td>
                        @else
                        <td>{{$monan['soluong']}}</td>
                        <td>
                            <div class="buttons_added">
                                <input aria-label="quantity" class="input-qty" max="{{$monan['soluong']}}" min="0" name="soluong" type="number" value="0">
                            </div>
                        </td>
                        @endif
                        <td>
                            <button type="submit"><img src="{{asset('hinhanhmonan/'.$monan['hinhanh'])}}" style="width:70px; height:70px;" alt="Món ăn"></button>
                        </td>
                    </form>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{ $mon->links() }}
        </div>
                @endforeach
    </div>
    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>