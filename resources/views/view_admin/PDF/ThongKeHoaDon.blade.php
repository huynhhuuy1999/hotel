<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		*{
			font-family: DejaVu Sans !important;
		}
		.tenKS{
			font-weight: bold;
		}
		.x{
			padding: 0;
			margin-top: 50px;
		}
		h3{
			text-align: center;
			font-weight: bold;
		}
		table{
			align-content: center;
			padding: 0;
			width: 700px;
			height:auto;
			border-spacing: 0px;
		}
		.nam{
			background-color: #e91e43;
		}
		.thang{
			background-color: #a0bbd0;
		}
		.doanhthu{
			background-color: #c6d062;
		}
	</style>
</head>
<body>
	<div class="tenKS">
		KHÁCH SẠN <br>TAM NGƯ
	</div>
	<h3>THỐNG KÊ DOANH THU HÓA ĐƠN</h3>
	<p>Từ ngày: {{$tungay}}</p>
	<p>Đến ngày: {{$denngay}}</p>
	<div class="x">
		<table border="1px">
			<thead>
				<tr>
					<th style="text-align: center;">Năm</th>
					<th style="text-align: center;">Tháng</th>
					<th style="text-align: center;">Doanh thu</th>
				</tr>
			</thead>
			{{$nam=0}};
			{{$tong=0}};
			{{$tongnam=0}};
			<tbody>
				@foreach($thongke as $tk)
					@if($tk->nam!=$nam)
						@if($tongnam!=0)
							<tr>
								<td colspan="2" style="font-weight: bold;text-align: center;">Tổng doanh thu năm</td>
								<td>{{$tongnam}}</td>
							</tr>
						@endif
						<tr class="nam"><td colspan="3">{{$tk->nam}}</td></tr>
						{{$nam=$tk->nam}};
						{{$tongnam=0}};
					@endif
					{{$tongnam=$tongnam+$tk->tongtienthanhtoan}};
					<tr>
						<td></td>
						<td class="thang">{{$tk->thang}}</td>
						<td class="thang">{{$tk->tongtienthanhtoan}}</td>
					</tr>
					{{$tong=$tong+$tk->tongtienthanhtoan}};
				@endforeach
				<tr>
					<td colspan="2" style="text-align: center;">Tổng doanh thu năm</td>
					<td class="doanhthu">{{$tongnam}}</td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;" class="doanhthu">Tổng doanh thu</td>
					<td class="doanhthu">{{$tong}}</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>