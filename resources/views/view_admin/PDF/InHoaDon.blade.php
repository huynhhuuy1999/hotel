<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{asset('css/css_admin/css_PDF/css_InHoaDon.css')}}">
</head>
<body>
	<h4>KHÁCH SẠN<br>
	TAM NGƯ</h4>
	<h3>HÓA ĐƠN</h3>
	<p class="diachi">Địa chỉ: 12 Nguyễn Thị Minh Khai, quận 1, Thành phố Hồ Chí Minh<br>
	Số điện thoại: 0345 790 193</p><br>
	<hr>
	<p id='ngay'>Ngày {{$ngay->day}}, tháng {{$ngay->month}}, năm {{$ngay->year}}</p>
	<div class="ttkh">
		<span>Họ tên khách hàng: {{$hoadon->khachhang->HOTEN}}</span><br>
		<span>CMND: {{$hoadon->khachhang->CMND}}</span><br>
		<span>Ngày đến: {{$hoadon->NGAYDEN}}</span><br>
		<span>Ngày đi: {{$hoadon->NGAYDI}}</span><br>
		<span>Phòng: {{$hoadon->MAPHONG}}</span><br>
		<span>Nhân viên lập hóa đơn: {{$hoadon->nhanvien->HOTEN}}</span><br>
	</div>
	<hr>
	<div class="bang">
		<table border="1" cellspacing="0">
			<thead>
				<tr>
					<th>Tên dịch vụ</th>
					<th>Số lượng</th>
					<th>Thành tiền</th>
				</tr>
			</thead>
			<tbody>
				@foreach($cthd as $ct)
					<tr>
						<td>{{$ct->dichvu->TENDICHVU}}</td>
						<td>{{$ct->dichvu->SOLUONG}}</td>
						<td>{{$ct->THANHTIEN}}</td>
					</tr>
				@endforeach
				<tr>
					<td colspan="2">Tổng tiền dịch vụ</td>
					<td>{{$hoadon->TIENDICHVU}}</td>
				</tr>
				<tr>
					<td colspan="2">Tiền phòng</td>
					<td>{{$hoadon->TIENPHONG}}</td>
				</tr>
				<tr>
					<td colspan="2">Tổng tiền</td>
					<td>{{$hoadon->TONGTIEN}}</td>
				</tr>
				<tr>
					<td colspan="2">Tiền khuyến mãi</td>
					<td>{{$hoadon->TIENGIAM}}</td>
				</tr>
				<tr>
					<td colspan="2">Tổng tiền thanh toán</td>
					<td>{{$hoadon->TONGTIENTHANHTOAN}}</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="chuki">
		<p>Chữ kí người lập hóa đơn</p>
	</div>
	
</body>
</html>