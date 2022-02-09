@extends("./master")

@section('page_title')
    Admin - Nhân viên
@endsection

@section('main')
    <div class="jumbotron text-center" id="tieude">
        <h1>THÔNG TIN NHÂN VIÊN</h1> 
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
    <a class="btn btn-primary m-1" href="{{ route('nhanvien.themnhanvien.themnhanvien') }}" role="button" id="btn-themnhanvien">Thêm nhân viên</a>
    <div id="table-dsnv">
        @if(!empty($data))
            <table class="table table-bordered">
                    <tr>
                        <th id="thongtin-ten">Tên nhân viên</th>
                        <th class="thongtin-ngay">Năm sinh</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th class="thongtin-ngay">Ngày vào làm</th>
                        <th id="thongtin-cv">Chức vụ</th>
                        <th>Tên đăng nhập</th>
                        <th>Thao tác</th>
                    </tr>
                <tbody>
                @foreach($data as $bien)
                    <tr>
                        <td>{{ $bien['TenNV'] }}</td>
                        <td>
                            <?php
                                $namsinh = date_create($bien['NamSinh']);
                                echo date_format($namsinh,"d-m-Y");
                            ?>
                        </td>
                        <td>{{ $bien['GioiTinh'] }}</td>
                        <td>{{ $bien['DiaChi'] }}</td>
                        <td>{{ $bien['SoDT'] }}</td>
                        <td>
                            <?php
                                $ngayvaolam = date_create($bien['NgayVaoLam']);
                                echo date_format($ngayvaolam,"d-m-Y");
                            ?>
                        </td>
                        <td><?php echo App\Models\chucvu::where('MaCV',$bien['MaCV'])->value('TenCV') ?></td>
                        <td>{{ $bien['TenDangNhap'] }}</td>
                        <td id="thaotac">
                            <a href="{{ route('nhanvien.suanhanvien.suanhanvien',['TenDangNhap' => $bien['TenDangNhap']]) }}"><i class="fas fa-wrench" style="color: #3b95ef"></i></a>
                            <a href="{{ route('nhanvien.xoanhanvien',['TenDangNhap' => $bien['TenDangNhap']]) }}"><i class="fas fa-user-minus" style="color: #ff0000"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        @endif
    </div>
@endsection