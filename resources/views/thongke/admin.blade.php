@extends("./master")

@section('page_title')
    Admin - Thống kê
@endsection

@section('main')
	<div class="hien">
	<h2 style="color:Orange">Doanh thu bán hàng theo tháng</h2><br>
		<div id="curve_chart" style="width: 950px; height: 600px"></div>
	</div>
@endsection