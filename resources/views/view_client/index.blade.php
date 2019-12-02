<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{asset('css/css_client/css_index.css')}}">
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
	<div class="backg">
		<img src="{{asset('image/backg.jpg')}}" alt="" class="img-responsive">
	</div>
	<div class="dat-phong" style="background: #755727;height: 93px;">
		<h4><a href="{{URL::route('view_FormDatPhong')}}"><b>ĐẶT PHÒNG NGAY</b></a></h4>
	</div>
	<div class="container">
		<div class="about">
			<div class="col-md-6">
				<div class="text-about">
					<h2 id="about">Về chúng tôi</h2>
					<p>Đến với Khách sạn Tam Ngư, bạn sẽ được hòa mình vào với thiên nhiên trong lành, được tham gia các hoạt động vui chơi giải trí, thư giãn nghỉ ngơi để trút bỏ hết những ưu phiền và bộn bề của cuộc sống.</p>
					<p>Khu khách sạn sang trọng với đầy đủ các hạng mục tiện nghi gồm nhiều loại phòng và nhà gỗ hiện đại kết hợp phong cách truyền thống, hệ thống bể bơi bể sục đa năng cùng hệ thống nhà hàng, phòng hội nghị, khu vui chơi,…</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="anh-about">
					<img src="{{asset('/image/about.jpg')}}" alt="">
				</div>
			</div>
		</div>
	</div>
	
	<div class="phong">
		<div class="text-phong"><h2>Phòng khách sạn</h2></div>
		<div class="col-md-6" >
			<div class="phong-don">
				<a href="{{URL::route('view_PhongDon')}}"><img src="{{asset('image/phong_don.jpg')}}" alt=""></a>
				<div class="text-phongdon">
					<a href="{{URL::route('view_PhongDon')}}"><h3>PHÒNG ĐƠN</h3></a>
					<p>Phòng Đơn với thiết kế hài hòa, nội thất sang trọng với đầy đủ tiện nghi hiện đại. Phòng có diện tích khoảng 35-40m<sup>2</sup>
				 	đều có cửa sổ, ban công.</p>
				</div>
			</div>
		</div>
		<div class="col-md-6" >
			<div class="phong-doi">
				<a href="{{URL::route('view_PhongDoi')}}"><img src="{{asset('image/phong_doi.jpg')}}" alt=""></a>
				<div class="text-phongdoi">
					<a href="{{URL::route('view_PhongDoi')}}"><h3>PHÒNG ĐÔI</h3></a>
					<p>Phòng Đôi có diện tích khoảng 55-60m<sup>2</sup>  được thiết kế hài hòa với nội thất sang trọng và đầy đủ tiện nghi hiện đại và đến sự thoải mái, tiện lợi nhất.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="dichvu">
		<h2>DỊCH VỤ</h2>
		<p>Hãy đến với chúng tôi bạn sẽ nhận được những dịch vụ và ưu đãi tốt nhất</p>
		<div class="container">
			<div class="col-md-3">
				<ul>
					<li>Truyền hình cáp</li>
					<li>Giường</li>
					<li>Phòng tắm vòi sen</li>
					<li>Mini bar</li>
				</ul>
			</div>
			<div class="col-md-3">
				<ul>
					<li>Máy sấy tóc</li>
					<li>Hệ thống tự động</li>
					<li>Nước nóng</li>
					<li>Wifi</li>
				</ul>
			</div>
			<div class="col-md-3">
				<ul>
					<li>Làm phòng 2 lần mỗi ngày</li>
					<li>Mỗi ngày miễn phí 2 chai nước suối</li>
					<li>Đặt phòng vip theo yêu cầu</li>
					<li>Đánh giầy miễn phí</li>
				</ul>
			</div>
			<div class="col-md-3">
				<ul>
					<li>Trà,cà phê miễn phí trong phòng</li>
					<li>Dịch vụ giặc ủi</li>
					<li>Tạp chí tiếng Anh</li>
					<li>Phục vụ ăn tại phòng</li>
				</ul>
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