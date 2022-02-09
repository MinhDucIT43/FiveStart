@extends("./master")

@section('page_title')
    Admin - Loại sản phẩm
@endsection

@section('main')
    <div class="jumbotron text-center" id="tieude">
        <h1>THÔNG TIN LOẠI SẢN PHẨM</h1>
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
    <a class="btn btn-primary m-1" href="{{ route('loaisanpham.themloaisanpham.themloaisanpham') }}" role="button" id="btn-themnhanvien">Thêm loại sản phẩm</a>
    <div id="table-dsnv">
        @if(!empty($data))
            <table class="table table-bordered">
                    <tr>
                        <th class="thongtin-ngay">Loại sản phẩm</th>
                        <th>Thao tác</th>
                    </tr>
                <tbody>
                @foreach($data as $bien)
                    <tr>
                        <td>{{ $bien['TenLSP'] }}</td>
                        <td id="thaotac">
                            <a href="{{ route('loaisanpham.sualoaisanpham.sualoaisanpham',['MaLSP' => $bien['MaLSP']]) }}"><button id="sweet"><i class="fas fa-wrench" style="color: #3b95ef"></i></button></a>
                            <a href="{{ route('loaisanpham.xoaloaisanpham',['MaLSP' => $bien['MaLSP']]) }}"><i class="fas fa-user-minus" style="color: #ff0000"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        @endif
    </div>
@endsection