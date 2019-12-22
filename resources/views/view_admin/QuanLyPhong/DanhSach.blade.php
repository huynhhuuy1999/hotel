<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="{{asset('bootstrap-3.3.7-dist/js/bootstrap.min.js')}}"></script>
	<link rel="stylesheet" href="{{asset('bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/css_admin/css_Phong/css_DanhSach.css')}}">
	<link rel="stylesheet" href="{{asset('fontawesome-free-5.11.2-web/css/all.css')}}">
</head>
<body>
	<div class="title">
		<div class="col-md-2">
			<h3>KHÁCH SẠN <br> TAM NGƯ <a href=""></a></h3>
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
			{{$phongtrong=0}};
			{{$dangthue=0}};
			{{$chuadon=0}}
			@foreach($phong as $p)
				@if($p->TRANGTHAI=='Trống')
					{{$phongtrong=$phongtrong+1}};
				@endif
				@if($p->TRANGTHAI=='Đang thuê' || $p->TRANGTHAI=='Đã đặt trước')
					{{$dangthue=$dangthue+1}};
				@endif
				@if($p->TRANGTHAI=='Chưa dọn')
					{{$chuadon=$chuadon+1}};
				@endif
			@endforeach
			<div class="col-md-10">
				<div class="ds-nut">
					<button class="btn btn-primary" id="ds-datphong"><a href="{{URL::route('danhsach_phieu')}}">DS Đặt phòng</a></button>
				</div>
				<div class="thongtin">
					<ul>
						<li id="icon-phongtrong"><i class="fas fa-solar-panel" data-toggle="tooltip" data-placement="bottom" title="Phòng trống"></i>{{$phongtrong}}</li>
						<li id="icon-dangthue"><i class="fas fa-bed" data-toggle="tooltip" data-placement="bottom" title="Phòng có người"></i>{{$dangthue}}</li>
						<li id="icon-chuadon"><i class="fas fa-magic" data-toggle="tooltip" data-placement="bottom" title="Phòng chưa dọn"></i>{{$chuadon}}</li>
					</ul>
				</div>
				@if(count($errors) > 0)
					<div class="alert alert-danger">
						"Đặt phòng thất bại"
					</div>
				@endif

				@if(session('thongbao1'))
					<div class="alert alert-danger">
						{{session('thongbao1')}}
					</div>
				@endif
				<div class="table-responsive">
										
				</div>
				<div class="form-khachhang">
					<h3 >THÔNG TIN KHÁCH HÀNG</h3>
					{{-- @if(count($errors) > 0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
								{{$err}} <br>
							@endforeach
						</div>
					@endif --}}
				<div class="div1">
					<form class="form-horizontal" action="{{route('datPhong_phong')}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
							<label for="ngayden" id="" class="control-label col-xs-2">Ngày đến:</label>
							<div class="col-xs-4">
								<input type="date" id="ngayden" name="ngayden" value="" placeholder="" class="form-control">
							</div>
							<label for="ngaydi" id="" class="control-label col-xs-2">Ngày đi:</label>
							<div class="col-xs-4">
								<input type="date" id="ngaydi" name="ngaydi" value="" placeholder="" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="Ten" id="" class="control-label col-xs-2">Tên khách hàng:</label>
							<div class="col-xs-10">
								<input type="text" id="Ten" name="Ten" value="" placeholder="Nhập họ tên" class="form-control">
							</div>
						</div>
						<div class="form-group" >
							<label for="dienthoai" id="" class="control-label col-xs-2">Điện thoại:</label>
							<div class="col-xs-4">
								<input type="text" id="dienthoai" name="dienthoai" value="" placeholder="Nhập số điện thoại" class="form-control">
							</div>
							<label for="quocgia" id="" class="control-label col-xs-2">Quốc gia:</label>
							<div class="col-xs-4">
								<input type="text" id="quocgia" name="quocgia" value="" placeholder="Nhập quốc gia" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="diachi" id="" class="control-label col-xs-2">Địa chỉ:</label>
							<div class="col-xs-10">
								<input type="text" id="diachi" name="diachi" value="" placeholder="Nhập địa chỉ" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="gioitinh" id="" class="control-label col-xs-2">Giới tính:</label>
							<div class="col-xs-4">
								<select name="gioitinh" id="gioitinh" class="form-control">
									<option value="Nam">Nam</option>
									<option value="Nữ">Nữ</option>
								</select>
							</div>
							<label for="CMND" id="" class="control-label col-xs-2">CMND:</label>
							<div class="col-xs-4">
								<input type="text" id="CMND" name="CMND" value="" placeholder="Nhập CMND" class="form-control">
							</div>
						</div>
						<button type="submit" class="btn btn-primary luu" name="Lưu"><i class="fas fa-save"></i>Lưu</button>
						<button type="Reset" class="btn btn-danger huy" name="Hủy"><i class="fas fa-trash"></i>Hủy</button>
					</form>
				</div>
			</div>
			<div class="form-khachhang2" >
					<h3 >THÔNG TIN KHÁCH HÀNG</h3>
					{{-- @if(count($errors) > 0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
								{{$err}} <br>
							@endforeach
						</div>
					@endif --}}
					<div class="div2" >
					<form class="form-horizontal" action="{{route('thuePhong_phong')}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
							
							<label for="ngaydi" id="" class="control-label col-xs-2">Ngày đi:</label>
							<div class="col-xs-10">
								<input type="date" id="ngaydi" name="ngaydi" value="" placeholder="" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="Ten" id="" class="control-label col-xs-2">Tên khách hàng:</label>
							<div class="col-xs-10">
								<input type="text" id="Ten" name="Ten" value="" placeholder="Nhập họ tên" class="form-control">
							</div>
						</div>
						<div class="form-group" >
							<label for="dienthoai" id="" class="control-label col-xs-2">Điện thoại:</label>
							<div class="col-xs-4">
								<input type="text" id="dienthoai" name="dienthoai" value="" placeholder="Nhập số điện thoại" class="form-control">
							</div>
							<label for="quocgia" id="" class="control-label col-xs-2">Quốc gia:</label>
							<div class="col-xs-4">
								<input type="text" id="quocgia" name="quocgia" value="" placeholder="Nhập quốc gia" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="diachi" id="" class="control-label col-xs-2">Địa chỉ:</label>
							<div class="col-xs-10">
								<input type="text" id="diachi" name="diachi" value="" placeholder="Nhập địa chỉ" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="gioitinh" id="" class="control-label col-xs-2">Giới tính:</label>
							<div class="col-xs-4">
								<select name="gioitinh" id="gioitinh" class="form-control">
									<option value="Nam">Nam</option>
									<option value="Nữ">Nữ</option>
								</select>
							</div>
							<label for="CMND" id="" class="control-label col-xs-2">CMND:</label>
							<div class="col-xs-4">
								<input type="text" id="CMND" name="CMND" value="" placeholder="Nhập CMND" class="form-control">
							</div>
						</div>
						<button type="submit" class="btn btn-primary luu2" name="Lưu"><i class="fas fa-save"></i>Lưu</button>
						<button type="Reset" class="btn btn-danger huy2" name="Hủy"><i class="fas fa-trash"></i>Hủy</button>
					</form>
				</div>
			</div>
			<div class="form-dichvu">
				<h3 >DỊCH VỤ</h3>
					@if(count($errors) > 0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
								{{$err}} <br>
							@endforeach
						</div>
					@endif
				<div class="div3">
					<div class="them"><button class="btn btn-success" id="nut-them">Thêm</button></div>
					<form action="{{route('datdichvu_cthd')}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<table class="table table-sm table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th scope="col">Tên dịch vụ</th>
									<th scope="col">Số lượng</th>
									<th scope="col">Thành tiền</th>
								</tr>
							</thead>
							<tbody id="ds-dichvu">
								
							</tbody>
						</table>
						<button type="submit" class="btn btn-primary luu3" name="Lưu"><i class="fas fa-save"></i>Lưu</button>
						<button type="Reset" class="btn btn-danger huy3" name="Hủy"><i class="fas fa-trash"></i>Hủy</button>
					</form>
					
				</div>
			</div>
			</div>
	</div>



	<script>
		$(document).ready(function(){
			$('.table-responsive').append("\
				<table class=\"table-bordered\"> \
						@foreach($phong as $p)\
							@if($p->MAPHONG==101||$p->MAPHONG==201||$p->MAPHONG==301)\
								<tr>\
							@endif\
							@if($p->MAPHONG==201||$p->MAPHONG==301)\
								</tr>\
								@if($p->MAPHONG==201)\
									<td class=\"floor\">2</td>\
								@endif\
								@if($p->MAPHONG==301)\
									<td class=\"floor\">3</td>\
								@endif\
							@endif\
							@if($p->MAPHONG==101)\
								<td class=\"floor\">1</td>\
							@endif\
							<td>\
								@if($p->TRANGTHAI=='Trống')\
									<div class=\"phong\" onclick='chonPhong(this.id)' id='"+ <?php echo json_encode($p->MAPHONG); ?> +"'>\
								@endif\
								@if($p->TRANGTHAI=='Đã đặt trước'||$p->TRANGTHAI=='Đang thuê')\
									<div class=\"phong\" style='background-color:red' onclick='chonPhong(this.id)' id='"+ <?php echo json_encode($p->MAPHONG); ?> +"'>\
								@endif\
								@if($p->TRANGTHAI=='Chưa dọn')\
									<div class=\"phong\" style='background-color:#aba9a9' onclick='chonPhong(this.id)' id='"+ <?php echo json_encode($p->MAPHONG); ?> +"'>\
								@endif\
									<b class=\"tenphong\">{{$p->MAPHONG}}</b><br>\
									<p class=\"loaiphong\">{{$p->loaiphong->TENLOAIPHONG}}</p>\
									<p class=\"trangthai\">{{$p->TRANGTHAI}}</p>\
								</div>\
							</td>\
							@if($p->MAPHONG==104||$p->MAPHONG==204||$p->MAPHONG==304)\
								<td class=\"none\"></td>\
							@endif					\
						@endforeach\
					</table>"

				);
			
		});
		
		function chonPhong(idPhong){
			var url1="{{ url('view_admin/Ajax/ttphong/')}}";

			$.ajax({
                type:'GET',
                url:url1+"/"+idPhong,
                data:'_token = <?php echo csrf_token() ?>',
                success: function( data ) {
                	$('body').append(data);
                	$('.thongtinphong').fadeIn(300,function(){
                		$('.thongtinphong').css('visibility','visible');
                	});
                },
                error: function(error){
                	alert(error);
                }
            });
            $('body').append("<div id='over' style='display:none;width:100%;height:100%;background:#342e2e;position:absolute;top:0;left:0;opacity:0.6;z-index:999'></div>");
			$('#over').fadeIn(300);

		}
		$(document).on('click', "#over,#nut-huy", function() {
	       	$('#over, .thongtinphong').fadeOut(300 , function() {
	           $('#over,.thongtinphong').remove();
	       	});
      		return false;
 		});
		$(document).on('click', "#nut-datphong", function() {
	       	$('.thongtinphong').fadeOut(300 , function() {
	           $('.thongtinphong').css('visibility','hidden');
	          
	       	});	
	    });
	    function datPhong(){
	    	$('.form-khachhang').fadeIn(300,function(){
	       		$('.form-khachhang').css('visibility','visible');
	       	});
	    }
	    $(document).on('click', ".huy", function() {
	       	$('.form-khachhang,#over').fadeOut(300 , function() {
	           $('.form-khachhang').css('visibility','hidden');
	           $('#over').remove();
	           $('.thongtinphong').remove();
	       	});
	    });

	    $(document).on('click', "#nut-thuephong", function() {
	       	$('.thongtinphong').fadeOut(300 , function() {
	           $('.thongtinphong').css('visibility','hidden');
	       	});
	    });
	    function thuePhong(){
	    	$('.form-khachhang2').fadeIn(300,function(){
	       		$('.form-khachhang2').css('visibility','visible');
	       	});
	    }
	    $(document).on('click', ".huy2", function() {
	       	$('.form-khachhang2,#over').fadeOut(300 , function() {
	           $('.form-khachhang2').css('visibility','hidden');
	           $('#over').remove();
	           $('.thongtinphong').remove();
	       	});
	    });

	    $(document).on('click', "#nut-dichvu", function() {
	       	$('.thongtinphong').fadeOut(300 , function() {
	           $('.thongtinphong').css('visibility','hidden');
	       	});
	    });

	    function datDichVu(){
	    	$('.form-dichvu').fadeIn(300,function(){
		    		$('.form-dichvu').fadeIn(300,function(){
		       		$('.form-dichvu').css('visibility','visible');
	       		});
	    	});
	    }

	    $(document).on('click', ".huy3", function() {
	       	$('.form-dichvu,#over').fadeOut(300 , function() {
	           $('.form-dichvu').css('visibility','hidden');
	           $('#over').remove();
	           $('.thongtinphong').remove();
	           $('#ds-dichvu').empty();
	       	});
	    });
	    var id=0;
	    $(document).on('click',"#nut-them",function(){
	    	$('#ds-dichvu').append("<tr><td><select name='TenDichVu[tendv][]' id='"+id+"' class='tendichvu'>\
	    		<option disabled selected>Chọn dịch vụ</option>\
	    		@foreach($dichvu as $dv)\
	    			<option values={{$dv->TENDICHVU}}>{{$dv->TENDICHVU}}</option>\
	    		@endforeach\
	    		</td>\
	    		<td><input type='number' name='soluong[soluong][]' value='' class='soluong' id='sl"+id+"'></td>\
	    		<td><span class='z' id='tt"+id+"'></span></td>\
	    		</tr>");
	    	id=id+1;
	    });
	    $(document).on('change','.soluong',function(){
	    	var id= $(this).attr('id');
	    	var iddv=id.substr(2,3);
	    	var tendichvu=$('#'+iddv).val();
	    	var tien=0;
	    	var soluong=$('#'+id).val();
	    	@foreach($dichvu as $dv)
	    		if(<?php echo json_encode($dv->TENDICHVU); ?>==tendichvu){
	    			tien=<?php echo json_encode($dv->GIATIEN); ?>;
	    			var thanhtien=tien*soluong;
	    			
	    			$('#tt'+iddv).text(thanhtien);
	    		}
	    	@endforeach
	    });

	    $(document).on('change','.tendichvu',function(){
	    	var id= $(this).attr('id');
	    	var tendichvu=$(this).val();
	    	var tien=0;
	    	var soluong=$('#sl'+id).val();
	    	// $('#tt'+id).text($(this).val());
	    	@foreach($dichvu as $dv)
	    		if(<?php echo json_encode($dv->TENDICHVU); ?>==tendichvu){
	    			tien=<?php echo json_encode($dv->GIATIEN); ?>;
	    			var thanhtien=tien*soluong;
	    			$('#tt'+id).text(thanhtien);
	    		}
	    	@endforeach
	    	
	    });
	    
	</script>
</body>
</html>