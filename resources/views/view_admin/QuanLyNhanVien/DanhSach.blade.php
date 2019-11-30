<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

	<script src="{{asset('bootstrap-3.3.7-dist/js/bootstrap.min.js')}}"></script>
	<link rel="stylesheet" href="{{asset('bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('fontawesome-free-5.11.2-web/css/all.css')}}">
	<link rel="stylesheet" href="{{asset('css/css_admin/css_NhanVien/css_DanhSach.css')}}">
	{{-- <script src="{{asset('js/nguoidung.js')}}"></script> --}}

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
				<h3>DANH SÁCH NHÂN VIÊN</h3>
				@if(session('thongbao'))
					<div class="alert alert-success">
						{{session('thongbao')}}
					</div>
				@endif
				<button id="themNhanVien"><a href="{{URL::route('them_nhanvien')}}"><i class="fas fa-plus"></i>Thêm mới</a></button>
				{{-- <div class="table-responsive"> --}}
				<div class="x">
					<table id="verticalScroll" class="table table-sm table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Họ tên</th>
							<th scope="col">Ngày sinh</th>
							<th scope="col">Ngày vào làm</th>
							<th scope="col">CMND</th>
							<th scope="col">Số điện thoại</th>
							<th scope="col">Giới tính</th>
							<th scope="col">Email</th>
							<th scope="col">Địa chỉ</th>
							<th scope="col">Trạng thái</th>
							<th scope="col">Sửa</th>
							<th scope="col">Xóa</th>
						</tr>
					</thead>
					<tbody>
						@foreach($nhanvien as $nv)
						<tr>
							<th scope="row">{{$nv->MANHANVIEN}}</th>
							<td>{{$nv->HOTEN}}</td>
							<td>{{$nv->NGAYSINH}}</td>
							<td>{{$nv->NGAYVAOLAM}}</td>
							<td>{{$nv->CMND}}</td>
							<td>{{$nv->SDT}}</td>
							<td>{{$nv->GIOITINH}}</td>
							<td>{{$nv->EMAIL}}</td>
							<td>{{$nv->DIACHI}}</td>
							<td style="text-align: center;">{{$nv->TRANGTHAI}}</td>
							<td style="text-align: center;"><a href="{{route('sua_nhanvien',['MANHANVIEN'=>$nv->MANHANVIEN])}}">Sửa</a></td>
							<td style="text-align: center;"><a href="{{route('xoa_nhanvien',['MANHANVIEN'=>$nv->MANHANVIEN])}}">Xóa</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
				</div>
			</div>
	</div>
	<script>
		$(document).ready(function () {
			$('#verticalScroll').DataTable({
				"scrollY": "380px",
				"scrollCollapse": true
			});
			$('.dataTables_length').addClass('bs-select');
		});
	</script>
</body>
</html>