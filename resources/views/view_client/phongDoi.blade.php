<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{asset('bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/css_client/css_phongDoi.css')}}">
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
	<div class="container">
		<div class="col-md-6">
			<img src="{{asset('image/phong_doi.jpg')}}" alt="">
		</div>
		<div class="col-md-6">
			<h3 class="text-phongbd">PHÒNG ĐÔI</h3>
			<p>Phòng Đôi có diện tích khoảng 55-60m<sup>2</sup> được thiết kế hài hòa với nội thất sang trọng và đầy đủ tiện nghi hiện đại và đến sự thoải mái, tiện lợi nhất cho quý khách.</p>
			<p>Phòng Đôi gồm 2 giường nhỏ hoặc 1 giường lớn phù hợp với các cặp đôi đi du lịch nghỉ dưỡng. Phòng có thể có 1 cửa sổ nhỏ với hướng nhìn ra phía thành phố giúp quý khách có thể ngắm nhìn khung cảnh xinh đẹp xung quanh.</p>
			<b>Các tiện ích</b><br>
			<div class="col-md-6">
				<ul>
					<li>Diện tích 55-60m<sup>2</sup></li>
					<li>1 giường đôi hoặc 2 giường đơn</li>
					<li>Phòng tắm với vách kính và vòi hoa sen</li>
					<li>Điện thoại gọi trực tiếp trong nước và quốc tế</li>
					<li>Kết nối wifi và internet</li>
					<li>Ti vi kết nối truyền hình cáp</li>
				</ul>
			</div>
			<div class="col-md-6">
				<ul>
					<li>Điều hòa nhiệt độ</li>
					<li>Phòng tắm với bồn tắm đứng và vòi hoa sen</li>
					<li>Wifi và internet miễn phí</li>
					<li>Bàn trà với trà và cà phê miễn phí</li>
					<li>Miễn phí chỗ gửi xe tại khách sạn</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="phong-lienquan">
		<div class="container">
			<h3><u>PHÒNG LIÊN QUAN</u></h3>
			<div class="col-md-3">
				<a href="{{URL::route('view_PhongDon')}}"><img src="{{asset('image/phong_don.jpg')}}" alt=""></a>
				<a href="{{URL::route('view_PhongDon')}}"><p>Phòng Đơn</p></a>
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