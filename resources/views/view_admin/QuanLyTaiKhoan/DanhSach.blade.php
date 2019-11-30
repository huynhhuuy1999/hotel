<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="{{asset('bootstrap-3.3.7-dist/js/bootstrap.min.js')}}"></script>
	<link rel="stylesheet" href="{{asset('bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/css_admin/css_TaiKhoan/css_DanhSach.css')}}">
	<link rel="stylesheet" href="{{asset('fontawesome-free-5.11.2-web/css/all.css')}}">
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
							<li><a href="{{URL::route('dangnhap_login')}}"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>
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
				<h3>DANH SÁCH TÀI KHOẢN</h3>
				@if(session('thongbao'))
					<div class="alert alert-success">
						{{session('thongbao')}}
					</div>
				@endif
				<button id="themTaiKhoan"><a href="{{URL::route('them_taikhoan')}}"><i class="fas fa-plus"></i>Thêm mới</a></button>
				<div class="table-responsive">
					<table class="table table-sm table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Tên</th>
								<th scope="col">Email</th>
								<th scope="col">Sửa</th>
								<th scope="col">Xóa</th>
							</tr>
						</thead>
						<tbody>
							@foreach($taikhoan as $tk)
							<tr>
								<th scope="row">{{$tk->id}}</th>
								<td>{{$tk->name}}</td>
								<td>{{$tk->email}}</td>
								<td style="text-align: center;"><a href="{{route('sua_taikhoan',['id'=>$tk->id])}}">Sửa</a></td>
								<td style="text-align: center;"><a href="{{route('xoa_taikhoan',['id'=>$tk->id])}}">Xóa</a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
	</div>
		
</body>
</html>