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
	<link rel="stylesheet" href="{{asset('css/css_admin/css_PhieuDatPhong/css_DanhSach.css')}}">
	

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
				<h3>DANH SÁCH PHIẾU ĐẶT PHÒNG</h3>
				@if(session('thongbao'))
					<div class="alert alert-success">
						{{session('thongbao')}}
					</div>
				@endif
				{{-- <div class="table-responsive"> --}}
				<table id="verticalScroll" class="table table-sm table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Họ tên khách hàng</th>
							<th scope="col">Phòng</th>
							<th scope="col">Ngày đặt</th>
							<th scope="col">Ngày đến</th>
							<th scope="col">Ngày đi</th>
							<th scope="col">Nhân viên lập phiếu</th>
							<th scope="col">Nhận phòng</th>
							<th scope="col">Hủy phòng</th>
						</tr>
					</thead>
					<tbody>
						@foreach($phieudatphong as $phieu)
						<tr>
							<th scope="row">{{$phieu->MAPHIEU}}</th>
							<td>{{$phieu->khachhang->HOTEN}}</td>
							<td style="text-align: center;">{{$phieu->MAPHONG}}</td>
							<td style="text-align: center;">{{$phieu->NGAYDAT}}</td>
							<td style="text-align: center;">{{$phieu->NGAYDEN}}</td>
							<td style="text-align: center;">{{$phieu->NGAYDI}}</td>
							<td>{{$phieu->nhanvien->HOTEN}}</td>
							<td style="text-align: center;"><a href="{{route('nhan_phieu',['MAPHIEU'=>$phieu->MAPHIEU])}}">Nhận</a></td>
							<td style="text-align: center;"><a href="{{route('huy_phieu',['MAPHIEU'=>$phieu->MAPHIEU])}}">Hủy</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{{-- </div> --}}
			</div>
	</div>
	<script>
		$(document).ready(function(){
			$("#verticalScroll").DataTable({
				"scrollY": "380px",
				"scrollCollapse": true
			});
			$('.dataTables_length').addClass('bs-select');
		});
		
	</script>
</body>
</html>