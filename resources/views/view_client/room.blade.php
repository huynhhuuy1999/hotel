<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{asset('css/css_client/css_room.css')}}">
	<link rel="stylesheet" href="{{asset('bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('fontawesome-free-5.11.2-web/css/all.css')}}">
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
		<img src="{{asset('image/backg_loaiphong1.jpg')}}" alt="">
		<div class="text-loai"><p>LOẠI PHÒNG</p></div>
	</div>
	<div class="phong">
		<div class="col-md-6" >
			<div class="phong-don">
				<a href="{{URL::route('view_PhongDon')}}"><img src="{{asset('image/phong_don.jpg')}}" alt=""></a>
				<div class="text-phongdon">
					<a href="{{URL::route('view_PhongDon')}}"><h3>PHÒNG ĐƠN</h3></a>
					<p>Phòng Đơn với thiết kế hài hòa, nội thất sang trọng với đầy đủ tiện nghi hiện đại. Phòng có diện tích khoảng 35-40m<sup>2</sup>
				  đều có cửa sổ, ban công.</p>
				 	<p>Giá phòng: <strong class="gia">180000</strong>/ngày</p>
				</div>
			</div>
		</div>
		<div class="col-md-6" >
			<div class="phong-doi">
				<a href="{{URL::route('view_PhongDoi')}}"><img src="{{asset('image/phong_doi.jpg')}}" alt=""></a>
				<div class="text-phongdoi">
					<a href="{{URL::route('view_PhongDoi')}}"><h3>PHÒNG ĐÔI</h3></a>
					<p>Phòng Đôi có diện tích khoảng 55-60m<sup>2</sup>  được thiết kế hài hòa với nội thất sang trọng và đầy đủ tiện nghi hiện đại và đến sự thoải mái, tiện lợi nhất.</p>
					<p>Giá phòng: <strong class="gia">250000</strong>/ngày</p>
				</div>
			</div>
		</div>
	</div>
	<div class="final">
		<h3>KHÁCH SẠN TAM NGƯ</h3>
		<p>Địa chỉ: 12 Nguyễn Thị Minh Khai, quận 1, Thành phố Hồ Chí Minh</p>
		<p><i class="fas fa-phone-alt"></i>Số điện thoại: 0345 790 193</p>
	</div>
</body>
</html>