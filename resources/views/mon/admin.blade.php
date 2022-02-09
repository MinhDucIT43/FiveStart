@extends("./master")

@section('page_title')
    Admin - Món ăn
@endsection

@section('main')
    <div class="jumbotron text-center" id="tieude">
        <h1>THÔNG TIN MÓN ĂN</h1>
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
    <a class="btn btn-primary m-1" href="{{ route('mon.themmon.themmon') }}" role="button" id="btn-themnhanvien">Thêm món ăn</a>
    <div id="table-dsnv">
        @if(!empty($data))
            <table class="table table-bordered">
                    <tr>
                        <th>Tên món ăn</th>
                        <th>Thuộc loại</th>
                        <th>Số lượng</th>
                        <th>Đơn vị tính</th>
                        <th>Giá</th>
                        <th>Hình ảnh</th>
                        <th>Thao tác</th>
                    </tr>
                <tbody>
                @foreach($data as $bien)
                    <tr>
                        <td>{{$bien['TenMon']}}</td>
                        <td>{{ App\Models\nhommon::where('MaNM',$bien['MaNM'])->value('TenNM') }}</td>
                        <td>{{$bien['soluong']}}</td>
                        <td>{{ App\Models\donvitinh::where('MaDVT',$bien['MaDVT'])->value('DVT') }}</td>
                        <td>{{ number_format($bien['Gia']) }} VNĐ</td>
                        <td><img src="{{ asset('hinhanhmonan/'.$bien['hinhanh']) }}" alt="Món ăn" style="width:100px; height:100px;"></td>
                        <td id="thaotac">
                            <a href="{{ route('mon.suamon.suamon',['MaMon' => $bien['MaMon']]) }}"><i class="fas fa-wrench" style="color: #3b95ef"></i></a>
                            <a href="{{ route('mon.xoamon',['MaMon' => $bien['MaMon']]) }}"><i class="fas fa-user-minus" style="color: #ff0000"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        @endif
    </div>
@endsection