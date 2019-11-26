<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{asset('css/css_admin/css_login.css')}}">
	<link rel="stylesheet" href="{{asset('fontawesome-free-5.11.2-web/css/all.css')}}">
</head>
<body>
	<div class="login_box">
		<img src="{{asset('image/man-user 2.png')}}" alt="" >
		<h1>KHÁCH SẠN TAM NGƯ</h1>
		<form action="{{route('dangnhap_login1')}}" method="POST">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<p>Tên đăng nhập</p>
			<i class="fas fa-user"></i><input type="text" placeholder="Tên đăng nhập" name="TenDangNhap" autocomplete="off"><br>
			<p>Mật khẩu</p>
			<i class="fas fa-lock"></i><input type="password" placeholder="Mật khẩu" name="MatKhau"><br>
			@if(count($errors) > 0)
				<div class="loi">
					@foreach($errors->all() as $err)
						{{$err}} <br>
					@endforeach
				</div>
				
			@endif

			@if(session('thongbao'))
				<div class="loi">
					{{session('thongbao')}}	
				</div>
			@endif
			<input type="Submit" value="Đăng nhập">
		</form>
	</div>
	
</body>
</html>