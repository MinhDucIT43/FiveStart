<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page_title')</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="shortcut icon" href="./hinhanh/icon.png">
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Link Fontawesome-icon -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Thống kê -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Tháng', 'Doanh thu'],
            <?php 
                for($i = 1;$i <=12;$i++) 
                {
                    $tongtienmoi=0;
                    $tongtien = DB::table('hoadon')->get();
                    foreach($tongtien as $tt){
                        $thang = substr($tt->NgayLap,5,2);
                        if($thang == $i)
                        {
                            $tongtienmoi += $tt->TongTien;
                            echo "['".$i."',".$tongtienmoi."],";
                        }
                        else
                        {
                            echo "['".$i."',0],";
                        }
                    }
                    
                }
            ?>
        ]);

        var options = {
            title: 'Doanh thu năm 2021',
            legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
        }
    </script>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <a href="{{ route('admin') }}" id="home"><i class="fas fa-home">HOME</i></a>
            <a href="{{ route('dangxuat') }}" id="logout"><i class="fas fa-sign-out-alt">Đăng xuất</i></a>
        </div>
        <div id="menu">
            <div id="menu-showadmin">
                <h4 id="h4-QLNH">QUẢN LÝ NHÀ HÀNG</h4>
                <i class="fas fa-user-cog" id="iconadmin-menu"></i>
                <h4 id="h4-admin">Admin</h4>
                <i class="fas fa-circle" id="online-menu">online</i>
            </div>
            <div id="caption">Menu</div>
            <div id="menu-option">
                <div class="list-group">
                    <a href="{{ route('nhanvien.admin') }}" class="list-group-item list-group-item-action"><i class="fas fa-address-book" id="icon-QLNV"></i>Quản lý nhân viên</a>
                    <a href="{{ route('chucvu.admin') }}" class="list-group-item list-group-item-action"><i class="fas fa-user-tag" id="icon-QLCV"></i>Quản lý chức vụ</a>
                    <a href="{{ route('loaisanpham.admin') }}" class="list-group-item list-group-item-action"><i class="fas fa-calendar-minus" id="icon-QLLSP"></i>Quản lý loại sản phẩm</a>
                    <a href="{{ route('sanpham.admin') }}" class="list-group-item list-group-item-action"><i class="fas fa-business-time" id="icon-QLSP"></i>Quản lý sản phẩm</a>
                    <a href="{{ route('hoadon.admin') }}" class="list-group-item list-group-item-action"><i class="fas fa-file-invoice-dollar" id="icon-QLHD"></i>Quản lý hóa đơn</a>
                    <a href="{{ route('ban.admin') }}" class="list-group-item list-group-item-action"><i class="fas fa-table" id="icon-QLB"></i>Quản lý bàn</a>
                    <a href="{{ route('nhommon.admin') }}" class="list-group-item list-group-item-action"><i class="fas fa-dolly" id="icon-QLNK"></i>Quản lý nhóm món</a>
                    <a href="{{ route('mon.admin') }}" class="list-group-item list-group-item-action"><i class="fas fa-cookie" id="icon-QLNK"></i>Quản lý món</a>
                    <!-- <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-dolly" id="icon-QLNK"></i>Quản lý nhập kho</a>
                    <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-people-carry" id="icon-QLXK"></i>Quản lý xuất kho</a> -->
                    <div class="btn-group dropend">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="btn-QLDT">
                        <i class="fas fa-chart-bar" id="icon-QLDT">Quản lý doanh thu</i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Doanh thu theo ngày</a></li>
                            <li><a class="dropdown-item" href="{{ route('thongke.admin') }}">Doanh thu theo tháng</a></li>
                            <li><a class="dropdown-item" href="#">Doanh thu theo năm</a></li>
                            <li><a class="dropdown-item" href="#">Doanh thu theo quý</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="content">
            @yield('main')
        </div>
    </div>
    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="{{asset('js/them.js')}}"></script>
</body>
</html>