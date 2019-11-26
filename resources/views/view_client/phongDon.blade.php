<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{asset('bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/css_client/css_phongDon.css')}}">
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
		<img src="{{asset('image/backg_loaiphong1.jpg')}}" alt="">
		<div class="text-loai"><p>LOẠI PHÒNG</p></div>
	</div>
	<div class="container">
		<div class="col-md-6">
			<img src="{{asset('image/phong_don.jpg')}}" alt="">
		</div>
		<div class="col-md-6">
			<h3 class="text-phongbd">PHÒNG BÌNH DÂN</h3>
			<p>Phòng Deluxe với thiết kế hài hòa, nội thất sang trọng với đầy đủ tiện nghi hiện đại. Diện tích khoảng 60-65m2 mỗi phòng đều được trang bị cửa sổ và ban công mang lại không gian thoáng mát, thoải mái nhất cho quý khách.</p>
			<p>Phòng có nội thất sang trọng, sàn gỗ cao cấp, không gian rộng rãi, có cửa sổ và ban công hướng nhìn ra biển, quý khách có thể dễ dàng ngắm cảnh hoàng hôn hay bình minh ngay trong phòng mình.</p>
			<b>Các tiện ích</b><br>
			<div class="col-md-6">
				<ul>
					<li>Diện tích 60-65m<sub>2</sub></li>
					<li>Điều hòa 2 chiều</li>
					<li>Điện thoại</li>
					<li>Mini Bar và đồ uống</li>
					<li>Kết nối wifi và internet</li>
					<li>Dịch vụ phục vụ tại phòng</li>
				</ul>
			</div>
			<div class="col-md-6">
				<ul>
					<li>Một giường Kingsize</li>
					<li>Phòng tắm với bồn tắm đứng và vòi hoa sen</li>
					<li>TV ECL SONY 32inch</li>
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
				<a href="{{URL::route('routePhongDoi')}}"><img src="{{asset('image/phong_doi.jpg')}}" alt=""></a>
				<a href="{{URL::route('routePhongDoi')}}"><p>Phòng hạng sang</p></a>
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