<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="{{asset('bootstrap-3.3.7-dist/js/bootstrap.min.js')}}"></script>
	<link rel="stylesheet" href="{{asset('bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/css_admin/css_TaiKhoan/css_Sua.css')}}">
	<link rel="stylesheet" href="{{asset('fontawesome-free-5.11.2-web/css/all.css')}}">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
	
	<div class="title">
		<div class="col-md-2">
			<h3>KHÁCH SẠN <br> TAM NGƯ</h3>
		</div>
		<div class="col-md-10">
			<div class="dangnhap">
					<div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><i class="fas fa-user-tie"></i><span class="caret"></span></button>
						<ul class="dropdown-menu dropdown-user">
							<li><a href=""><i class="fas fa-user"></i>{{Auth::user()->name}}</a></li>
							<li><a href="{{URL::route('dangxuat_login')}}"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>
						</ul>
					</div>
         		</div>
		</div>
	</div>
	<div class="content">
			<div class="col-md-2">
				<ul>
					<li style="border-top: 1px solid white"><a href="{{URL::route('danhsach_phong')}}"><i class="fas fa-home"></i> Quản lý phòng</a></li>
					<li><a href="{{URL::route('danhsach_khachhang')}}"><i class="fas fa-user-friends"></i> Quản lý khách hàng</a></li>
					<li><a href="{{URL::route('danhsach_nhanvien')}}"><i class="fa fa-users"></i> Quản lý nhân viên</a></li>
					<li><a href="{{URL::route('danhsach_dichvu')}}"><i class="fas fa-concierge-bell"></i> Quản lý dịch vụ</a></li>
					<li><a href="{{URL::route('danhsach_hoadon')}}"><i class="fas fa-money-bill"></i> Hóa đơn</a></li>
					<li><a href="{{URL::route('danhsach_taikhoan')}}"><i class="fas fa-user-cog"></i> Quản lý tài khoản</a></li>
					<li><a href="{{URL::route('thongke_hoadon')}}"><i class="fas fa-calculator"></i> Thống kê hóa đơn</a></li>
				</ul>
			</div>
			<div class="col-md-10">
				<legend>TÀI KHOẢN</legend>
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
				<div class="form-group">
					<form action="{{route('sua_taikhoan',['id'=>$user->id])}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<label for="TenTaiKhoan" id="lab_tentaikhoan">Họ tên:</label>
							<input type="text" id="TenTaiKhoan" name="TenTaiKhoan" value="{{$user->name}}" placeholder="Nhập tên tài khoản" class="form-control">
						<label for="Email" id="lab_email">Email:</label>
							<input type="email" id="Email" name="Email" value="{{$user->email}}" placeholder="Nhập email" readonly="" class="form-control"><br>
						<input type="checkbox" id="doiMatKhau" name="doiMatKhau"><b>Đổi mật khẩu</b> <br>
							<input type="password" id="MatKhau" name="MatKhau"  placeholder="Nhập mật khẩu" disabled="" class="form-control">
						<label for="MatKhau2" id="lab_matkhau2">Nhập lại mật khẩu</label>
							<input type="password" id="MatKhau2" name="MatKhau2" placeholder="Nhập lại mật khẩu" disabled="" class="form-control">
						<button type="submit" class="btn btn-primary luu" name="Lưu"><i class="fas fa-save"></i>Lưu</button>
						<button type="Reset" class="btn btn-danger huy" name="Hủy" value="Hủy"><i class="fas fa-trash"></i>Hủy</button>
					</form>
				</div>
			</div>
	</div>
	<script>
		$(document).ready(function(){
			$('input[type=checkbox]').change(function(){
				if ($(this).is(":checked")) {
					$('#MatKhau').removeAttr('disabled');
					$('#MatKhau2').removeAttr('disabled');
				}
				else{
					$('#MatKhau').attr('disabled','');
					$('#MatKhau2').attr('disabled','');
				}
			});
		});
	</script>
</body>
</html>
	
		
	