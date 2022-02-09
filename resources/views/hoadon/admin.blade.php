@extends("./master")

@section('page_title')
    Admin - Hóa đơn
@endsection

@section('main')
    <div class="jumbotron text-center" id="tieude">
        <h1>THÔNG TIN HÓA ĐƠN</h1> 
    </div>
    <div id="table-dsnv">
        @if(!empty($data))
            <table class="table table-bordered">
                    <tr>
                        <th>Người lập</th>
                        <th>Bàn số</th>
                        <th>Ngày lập</th>
                        <th>Chi tiết</th>
                    </tr>
                <tbody>
                @foreach($data as $bien)
                    <tr>
                        <td>{{App\Models\nhanvien::where('TenDangNhap',$bien->TenDangNhap)->value('TenNV')}}</td>
                        <td>{{App\Models\ban::where('MaBan',$bien->MaBan)->value('SoBan')}}</td>
                        <td>
                            <?php
                                $ngaylap = date_create($bien['NgayLap']);
                                echo date_format($ngaylap,"d-m-Y");
                            ?>
                        </td>
                        <?php $chitiethd = DB::table('chitiet_hd_thu')->where('MaHD_Thu',$bien->MaHD_Thu)->get(); ?>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Tên món</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                    @foreach($chitiethd as $ct)
                                    <tr>
                                        <td>{{App\Models\mon::where('MaMon',$ct->MaMon)->value('TenMon')}}</td>
                                        <td>{{$ct->soluong}}</td>
                                        <td>{{number_format($ct->DonGia)}}</td>
                                        <td>{{number_format($ct->ThanhTien)}}</td>
                                    <tr>
                                    @endforeach
                                </table>
                            </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        @endif
    </div>
@endsection