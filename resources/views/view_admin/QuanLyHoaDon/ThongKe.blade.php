<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

	<script src="{{asset('bootstrap-3.3.7-dist/js/bootstrap.min.js')}}"></script>
	<link rel="stylesheet" href="{{asset('bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('fontawesome-free-5.11.2-web/css/all.css')}}">
	<link rel="stylesheet" href="{{asset('css/css_admin/css_HoaDon/css_ThongKe.css')}}">
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
					<li><a href=""><i class="fas fa-calculator"></i> Thống kê hóa đơn</a></li>
				</ul>
			</div>
			<div class="col-md-10">
				<div class="ngay">
					<form action="{{route('pdf_hoadon')}}" class="form-horizontal">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="error"></div>
						@if(count($errors) > 0)
							<div class="alert alert-danger">
								@foreach($errors->all() as $err)
									{{$err}} <br>
								@endforeach
							</div>
						@endif
						<div class="form-group">
							<label for="tungay" id="" class="control-label col-xs-1">Từ ngày:</label>
							<div class="col-xs-3">
								<input type="date" id="tungay" name="tungay" class="form-control">
							</div>
							<label for="denngay" id="" class="control-label col-xs-1">Đến ngày:</label>
							<div class="col-xs-3">
								<input type="date" id="denngay" name="denngay" class="form-control">
							</div>
							<div class="col-xs-2"></div>
							<div class="col-xs-1">
								<button type="submit" class="btn btn-success thongke" onclick="thongke()">Xuất PDF</button>
							</div>
						</div>
					</form>
					<button class="btn btn-info" onclick="xemThongKe()" id="nut-xemThongKe">Xem thống kê</button>
				</div>
				<div class="hienthi">
					
				</div>
				{{-- <div id="chart" style="height: 450px;margin-top: 10px;">
					
				</div> --}}
			</div>
	</div>
	</body>

	<script>
		function xemThongKe(){
			$('.bang-thongke').remove();
			var tungay=$('#tungay').val();
			var denngay=$('#denngay').val();
			var url1="{{ url('view_admin/QuanLyHoaDon/xemThongKe/')}}";
			$.ajax({
				type:'GET',
				url:url1+"/"+tungay+"/"+denngay,
				data:'_token = <?php echo csrf_token() ?>',
				success: function( data ) {
                	$('.hienthi').append(data);
                },
                error: function(error){
                	alert("Bạn chưa nhập đầy đủ thông tin");
                }
			});	
		}
	</script>
</html>