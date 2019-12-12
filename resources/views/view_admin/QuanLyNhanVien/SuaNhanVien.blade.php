<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="{{asset('bootstrap-3.3.7-dist/js/bootstrap.min.js')}}"></script>
	<link rel="stylesheet" href="{{asset('bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/css_admin/css_NhanVien/css_Sua.css')}}">
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
							<li><a href="{{URL::route('dangxuat_login')}}"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>
						</ul>
					</div>
         		</div>
		</div>
	</div>
	<div class="content">
			<div class="col-md-2">
				<ul>
					<li style="border: 1px solid white"><a href="{{URL::route('danhsach_phong')}}"><i class="fas fa-home"></i> Quản lý phòng</a></li>
					<li><a href="{{URL::route('danhsach_khachhang')}}"><i class="fas fa-user-friends"></i> Quản lý khách hàng</a></li>
					<li><a href="{{URL::route('danhsach_nhanvien')}}"><i class="fa fa-users"></i> Quản lý nhân viên</a></li>
					<li><a href="{{URL::route('danhsach_dichvu')}}"><i class="fas fa-concierge-bell"></i> Quản lý dịch vụ</a></li>
					<li><a href="{{URL::route('danhsach_hoadon')}}"><i class="fas fa-money-bill"></i> Hóa đơn</a></li>
					<li><a href="{{URL::route('danhsach_taikhoan')}}"><i class="fas fa-user-cog"></i> Quản lý tài khoản</a></li>
					<li><a href="{{URL::route('thongke_hoadon')}}"><i class="fas fa-calculator"></i> Thống kê hóa đơn</a></li>
				</ul>
			</div>
			<div class="col-md-10">
				<legend>NHÂN VIÊN</legend>
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
				
				
					<form class="form-horizontal" action="{{route('sua_nhanvien1',['MANHANVIEN'=>$nhanvien->MANHANVIEN])}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
							<label for="Ten" id="lab_ten" class="control-label col-xs-2">Họ tên:</label>
							<div class="col-xs-10">
								<input type="text" id="Ten" name="Ten" value="{{$nhanvien->HOTEN}}" placeholder="Nhập họ tên" class="form-control" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label for="Email" id="lab_email" class="control-label col-xs-2">Email:</label>
							<div class="col-xs-10">
								<input type="email" id="Email" name="Email" value="{{$nhanvien->EMAIL}}" placeholder="Nhập email" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="GioiTinh" id="lab_gioitinh" class="control-label col-xs-2">Giới tính:</label>
							<div class="col-xs-10">
								<select name="GioiTinh" id="GioiTinh" class="form-control">
									<option value="Nam"
										@if($nhanvien->GIOITINH=='Nam')
											{{"selected"}}
										@endif
									>Nam</option>
									<option value="Nữ"
										@if($nhanvien->GIOITINH=='Nữ')
											{{"selected"}}
										@endif
									>Nữ</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="NgaySinh" id="lab_ngaysinh" class="control-label col-xs-2">Ngày sinh:</label>
							<div class="col-xs-10">
								<input type="date" id="NgaySinh" name="NgaySinh" value="{{$nhanvien->NGAYSINH}}" placeholder="Nhập ngày sinh" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="NgayVaoLam" id="lab_ngayvl" class="control-label col-xs-2">Ngày vào làm:</label>
							<div class="col-xs-10">
								<input type="date" id="NgayVaoLam" name="NgayVaoLam" value="{{$nhanvien->NGAYVAOLAM}}" placeholder="Nhập ngày vào làm" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="CMND" id="lab_cmnd" class="control-label col-xs-2">CMND:</label>
							<div class="col-xs-10">
								<input type="text" id="CMND" name="CMND" value="{{$nhanvien->CMND}}" placeholder="Nhập CMND" class="form-control">
							</div>
						</div>
						<div class="form-group">
						<label for="SoDienThoai" id="lab_sdt" class="control-label col-xs-2">Số điện thoại:</label>
							<div class="col-xs-10">
								<input type="text" id="SoDienThoai" name="SoDienThoai" value="{{$nhanvien->SDT}}" placeholder="Nhập số điện thoại" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="DiaChi" id="lab_diachi" class="control-label col-xs-2">Địa chỉ:</label>
							<div class="col-xs-10">
								<input type="text" id="DiaChi" name="DiaChi" value="{{$nhanvien->DIACHI}}" placeholder="Nhập địa chỉ" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="TrangThai" id="lab_trangthai" class="control-label col-xs-2">Trạng thái:</label>
							<div class="col-xs-10">
								<select name="TrangThai" id="TrangThai" class="form-control">
									<option value="Đang làm"
										@if($nhanvien->TRANGTHAI=='Đang làm')
											{{"selected"}}
										@endif
									>Đang làm</option>
									<option value="Nghỉ"
										@if($nhanvien->TRANGTHAI=='Nghỉ')
											{{"selected"}}
										@endif
									>Nghỉ</option>
								</select>
							</div>
						</div>
						<button type="submit" class="btn btn-primary luu" name="Lưu"><i class="fas fa-save"></i>Lưu</button>
						<button type="Reset" class="btn btn-danger huy" name="Hủy" value="Hủy"><i class="fas fa-trash"></i>Hủy</button>
					</form>
			</div>
	</div>
</body>
</html>