@extends("./master")

@section('page_title')
    Admin - Chức vụ
@endsection

@section('main')
    <div class="jumbotron text-center" id="tieude">
        <h1>THÔNG TIN CHỨC VỤ</h1> 
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
    <a class="btn btn-primary m-1" href="{{ route('chucvu.themchucvu.themchucvu') }}" role="button" id="btn-themnhanvien">Thêm chức vụ</a>
    <div id="table-dsnv">
        @if(!empty($data))
            <table class="table table-bordered">
                    <tr>
                        <th id="thongtin-ten">Tên chức vụ</th>
                        <th class="thongtin-ngay">Tiền lương</th>
                        <th>Thao tác</th>
                    </tr>
                <tbody>
                @foreach($data as $bien)
                    <tr>
                        <td>{{ $bien['TenCV'] }}</td>
                        <td><?php echo number_format($bien['TienLuong']) ?></td>
                        <td id="thaotac">
                            <a href="{{ route('chucvu.suachucvu.suachucvu',['MaCV' => $bien['MaCV']]) }}"><i class="fas fa-wrench" style="color: #3b95ef"></i></a>
                            <a href="{{ route('chucvu.xoachucvu',['MaCV' => $bien['MaCV']]) }}"><i class="fas fa-user-minus" style="color: #ff0000"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection