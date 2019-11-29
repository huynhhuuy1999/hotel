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
					<li><a href="{{URL::route('view_home')}}">Trang chủ</a></li>
					<li><a href="{{URL::route('view_phong')}}">Phòng</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="backg-loaiphong">
		<img src="{{asset('image/backg_form_dki1.jpg')}}" alt="">
		<div class="text-loai"><p>ĐĂNG KÍ</p></div>
	</div>
	<div class="container">
		@if(count($errors) > 0)
			<div class="alert alert-danger">
				@foreach($errors->all() as $err)
					{{$err}} <br>
				@endforeach
			</div>
		@endif

		@if(session('thongbao'))
			<div class="alert alert-success">
				{{session('thongbao')}}
			</div>
		@endif
		<form action="{{route('client_datphong')}}" method="POST">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="a">
				<div class="col-md-6">
					<label for="ngayden">Ngày đến*</label><br>
					<input type="date" name="ngayden" id="ngayden"><br>
				</div>
				<div class="col-md-6">
					<label for="ngaydi">Ngày đi*</label><br>
					<input type="date" name="ngaydi" id="ngaydi"><br>
				</div>
			</div>
			<div class="chon-phong">

				<table border="1px">
					<thead>
						<tr>
							<th>Loại phòng</th>
							<th>Giá</th>
							<th>Phòng còn</th>
							<th>Chọn</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Phòng đơn</td>
							<td>180000/ngày</td>
							<td>{{count($phongDon)}}</td>
							<td><input type="radio" name="chon_phong" value="1"></td>
						</tr>
						<tr>
							<td>Phòng đôi</td>
							<td>250000/ngày</td>
							<td>{{count($phongDoi)}}</td>
							<td><input type="radio" name="chon_phong" value="2"></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="b">
				<div class="col-md-6">
					<label for="hoten">Họ tên*</label><br>
					<input type="text" name="hoten" id="hoten"><br>
					<label for="gioitinh">Giới tính*</label><br>
					<select name="gioitinh" id="gioitinh">
						<option value="Nam">Nam</option>
						<option value="Nữ">Nữ</option>
					</select>	
					<label for="cmnd">CMND*</label><br>
					<input type="text" name="cmnd" id="cmnd">
				</div>
				<div class="col-md-6">
					<label for="quocgia">Quốc gia*</label><br>
					<input type="text" name="quocgia" id="quocgia"><br>
					<label for="sodienthoai">Số điện thoại*</label><br>
					<input type="text" name="sodienthoai" id="sodienthoai"><br>
					<label for="diachi">Địa chỉ*</label><br>
					<input type="text" name="diachi" id="diachi">
				</div>
			</div>
			<div class="gui">
				<button type="submit" id="gui">Gửi</button> 
			</div>
		</form>
	</div>
	<div class="final">
		<h3>KHÁCH SẠN TAM NGƯ</h3>
		<p>Địa chỉ: 12 Nguyễn Thị Minh Khai, quận 1, Thành phố Hồ Chí Minh</p>
		<p><i class="fas fa-phone-alt"></i>Số điện thoại: 0345 790 193</p>
	</div>
</body>
</html>