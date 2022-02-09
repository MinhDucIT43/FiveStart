@extends("./master")

@section('page_title')
    Admin - Sản phẩm
@endsection

@section('main')
    <div class="jumbotron text-center" id="tieude">
        <h1>THÔNG TIN SẢN PHẨM</h1>
    </div>
    @if (session('alert'))
        <div>
            <p id="alert-them-sua"><i class="fas fa-check"></i>{{ session('alert') }}</p>
        </div>
    @endif
    @if (session('alert-xoa'))
        <div>
            <p id="alert-xoa"><i class="fas fa-times"></i>{{ session('alert-xoa') }}</p>
        </div>
    @endif
    <a class="btn btn-primary m-1" href="{{ route('sanpham.themsanpham.themsanpham') }}" role="button" id="btn-themnhanvien">Thêm sản phẩm</a>
    <a class="btn btn-primary m-1" href="{{ route('sanpham.donvitinh.admin') }}" role="button" id="btn-themnhanvien">Đơn vị tính</a>
    <div id="table-dsnv">
        @if(!empty($data))
            <table class="table table-bordered">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Thuộc loại</th>
                        <th>Số lượng</th>
                        <th>Đơn vị tính</th>
                        <th>Đơn giá</th>
                        <th>Thao tác</th>
                    </tr>
                <tbody>
                @foreach($data as $bien)
                    <tr>
                        <td>{{ $bien['TenSP'] }}</td>
                        <td>{{ App\Models\loaisanpham::where('MaLSP',$bien['MaLSP'])->value('TenLSP') }}</td>
                        <td>{{ $bien['SLTon'] }}</td>
                        <td>{{ App\Models\donvitinh::where('MaDVT',$bien['MaDVT'])->value('DVT') }}</td>
                        <td>{{ number_format($bien['GiaNhap']) }} VNĐ</td>
                        <td id="thaotac">
                            <a href="{{ route('sanpham.suasanpham.suasanpham',['MaSP' => $bien['MaSP']]) }}"><i class="fas fa-wrench" style="color: #3b95ef"></i></a>
                            <a href="{{ route('sanpham.xoasanpham',['MaSP' => $bien['MaSP']]) }}"><i class="fas fa-user-minus" style="color: #ff0000"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection