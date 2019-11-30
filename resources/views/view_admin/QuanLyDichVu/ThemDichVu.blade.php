<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="{{asset('bootstrap-3.3.7-dist/js/bootstrap.min.js')}}"></script>
	<link rel="stylesheet" href="{{asset('bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/css_admin/css_DichVu/css_Them.css')}}">
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
				<legend>DỊCH VỤ</legend>
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
					<form action="{{route('them_dichvu1')}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<label for="TenDichVu" id="lab_tenDichVu">Tên dịch vụ:</label>
							<input type="text" id="TenDichVu" name="TenDichVu" value="" placeholder="Nhập tên dịch vụ" class="form-control">
						<label for="GiaTien" id="lab_giaTien">Giá tiền:</label>
							<input type="number" id="GiaTien" name="GiaTien" value="" placeholder="Nhập giá tiền" class="form-control">
						<label for="TrangThai" id="lab_trangThai">Trạng thái</label>
						<select name="TrangThai" id="TrangThai" class="form-control">
							<option value="Có">Có</option>
							<option value="Không">Không</option>
						</select>
						<button type="submit" class="btn btn-primary luu" name="Lưu"><i class="fas fa-save"></i>Lưu</button>
						<button type="Reset" class="btn btn-danger huy" name="Hủy" value="Hủy"><i class="fas fa-trash"></i>Hủy</button>
					</form>
				</div>
			</div>
</body>
</html>