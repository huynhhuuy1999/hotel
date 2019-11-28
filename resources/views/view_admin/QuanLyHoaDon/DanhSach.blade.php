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
	<link rel="stylesheet" href="{{asset('css/css_admin/css_HoaDon/css_DanhSach.css')}}">
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
				<h3>DANH SÁCH HÓA ĐƠN</h3>
				<div class="x">
					<table id="verticalScroll" class="table table-sm table-bordered table-striped table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Phòng</th>
							<th scope="col">Tên khách hàng</th>
							<th scope="col">Tên nhân viên</th>
							<th scope="col">Ngày đến</th>
							<th scope="col">Ngày đi</th>
							<th scope="col">Tiền phòng</th>
							<th scope="col">Tiền dịch vụ</th>
							<th scope="col">Tổng tiền</th>
							<th scope="col">Tiền giảm</th>
							<th scope="col">Tiền thanh toán</th>
							<th scope="col">Trạng thái</th>
							<th scope="col">Chi tiết dịch vụ</th>
						</tr>
					</thead>
					<tbody>
						@foreach($hoadon as $hd)
						<tr>
							<th scope="row">{{$hd->MAHOADON}}</th>
							<td>{{$hd->MAPHONG}}</td>
							<td>{{$hd->khachhang->HOTEN}}</td>
							<td>{{$hd->nhanvien->HOTEN}}</td>
							<td>{{$hd->NGAYDEN}}</td>
							<td>{{$hd->NGAYDI}}</td>
							<td>{{$hd->TIENPHONG}}</td>
							<td>{{$hd->TIENDICHVU}}</td>
							<td>{{$hd->TONGTIEN}}</td>
							<td>{{$hd->TIENGIAM}}</td>
							<td>{{$hd->TONGTIENTHANHTOAN}}</td>
							<td>{{$hd->TRANGTHAI}}</td>
							<td><i onclick="danhsachcthd({{$hd->MAHOADON}})">Xem</i></td>
						</tr>
						@endforeach
					</tbody>
					</table>
				</div>
				
			</div>
	</div>
	<script>
		function danhsachcthd(idcthd){
			var url1="{{ url('view_admin/QuanLyChiTietHoaDon/danhsach/')}}";

			$.ajax({
                type:'GET',
                url:url1+"/"+idcthd,
                data:'_token = <?php echo csrf_token() ?>',
                success: function( data ) {
                	$('body').append(data);
                	$('.thongtincthd').fadeIn(300,function(){
                		$('.thongtincthd').css('visibility','visible');
                	});
                },
                error: function(error){
                	alert(error);
                }
            });
            $('body').append("<div id='over' style='display:none;width:100%;height:100%;background:#342e2e;position:absolute;top:0;left:0;opacity:0.6;z-index:999999'></div>");
			$('#over').fadeIn(300);
		}

		$(document).on('click', "#over", function() {
	       	$('#over, .thongtincthd').fadeOut(300 , function() {
	           $('#over,.thongtincthd').remove();
	       	});
      		return false;
 		});

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