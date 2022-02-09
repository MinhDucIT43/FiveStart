@extends("./master")

@section('page_title')
    Admin - Đơn vị tính
@endsection

@section('main')
    <div class="jumbotron text-center" id="tieude">
        <h1>THÔNG TIN ĐƠN VỊ TÍNH</h1>
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
    <a class="btn btn-primary m-1" href="{{ route('sanpham.donvitinh.themdonvitinh.themdonvitinh') }}" role="button" id="btn-themnhanvien">Thêm đơn vị tính</a>
    <div id="table-dsnv">
        @if(!empty($data))
            <table class="table table-bordered">
                    <tr>
                        <th class="thongtin-ngay">Đơn vị tính</th>
                        <th>Thao tác</th>
                    </tr>
                <tbody>
                @foreach($data as $bien)
                    <tr>
                        <td>{{ $bien['DVT'] }}</td>
                        <td id="thaotac">
                            <a href="{{ route('sanpham.donvitinh.suadonvitinh.suadonvitinh',['MaDVT' => $bien['MaDVT']]) }}"><i class="fas fa-wrench" style="color: #3b95ef"></i></a>
                            <a href="{{ route('sanpham.donvitinh.xoadonvitinh',['MaDVT' => $bien['MaDVT']]) }}"><i class="fas fa-user-minus" style="color: #ff0000"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        @endif
    </div>
@endsection