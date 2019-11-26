<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{asset('bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/css_client/css_formDatPhong.css')}}">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
	<div class="tieude">
		<div class="row">
			<div class="col-md-2">
				<h4>KHÁCH SẠN</h4>
				<h4>TAM NGƯ</h4>
			</div>
			<div class="col-md-10">
				<ul>
					<li><a href="{{URL::route('routeHome')}}">Home</a></li>
					<li><a href="{{URL::route('routeRoom')}}">Room</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="backg-loaiphong">
		<img src="{{asset('image/backg_form_dki1.jpg')}}" alt="">
		<div class="text-loai"><p>ĐĂNG KÍ</p></div>
	</div>
	<div class="container">
		<form action="{{URL::route('test')}}" method="GET">
			<div class="col-md-6">
			<b>Ngày đến*</b><br>
			<input type="date"><br>
			<b>Người lớn</b><br>
			<select name="" id="">
				<option value="1" selected="" disabled="">Người lớn</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</div>
		<div class="col-md-6">
			<b>Ngày đi*</b><br>
			<input type="date"><br>
			<b>Trẻ em</b><br>
			<select name="" id="">
				<option value="1" selected="" disabled="">Trẻ em</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</div>
		<div class="chon-phong">

			<table border="1px">

				<th>Loại phòng</th>
				<th>Giá</th>
				<th>Chọn</th>
				<tr>
					<td>Phòng đơn</td>
					<td>180000/ngày</td>
					<td><input type="radio" name="chon_phong"></td>
				</tr>
				<tr>
					<td>Phòng đôi</td>
					<td>250000/ngày</td>
					<td><input type="radio" name="chon_phong"></td>
				</tr>
			</table>
		</div>
		<div class="col-md-6">
			<b>Họ tên*</b><br>
			<input type="text"><br>
			<b>Giới tính*</b><br>
			<select name="" id="">
				<option value="Nam">Nam</option>
				<option value="Nữ">Nữ</option>
			</select>	
			<b>CMND*</b><br>
			<input type="mail">
		</div>
		<div class="col-md-6">
			<b>Quốc gia*</b><br>
			<input type="text" NAME="QG" id="quocgia"><br>
			<b>Số điện thoại*</b><br>
			<input type="text"><br>
			<b>Địa chỉ*</b><br>
			<input type="text">
		</div>
		<div class="gui">
			<input type="submit" value="GỬI" id="gui">
		</div>
	</div>
		</form>
		
		
		
		
		
	<div class="final">
		<h3>KHÁCH SẠN TAM NGƯ</h3>
		<p>Địa chỉ: 12 Nguyễn Thị Minh Khai, quận 1, Thành phố Hồ Chí Minh</p>
		<p><i class="fas fa-phone-alt"></i>Số điện thoại: 0345 790 193</p>
	</div>

	<script src="{{asset('js/test.js')}}"></script>
</body>
</html>