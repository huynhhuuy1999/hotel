<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chitiethoadon;
use App\hoadon;
use App\dichvu;
use DB;

class ChiTietHoaDonController extends Controller
{
    //
    public function getDanhSach($mahoadon){
    	// $cthd=DB::table('chitiethoadon')->where('MAHOADON',$mahoadon)->get();
    	$cthd=chitiethoadon::where('MAHOADON','=',$mahoadon)->get();
    	// echo $cthd[0]->MAHOADON;
    	$tongtien=0;
    	echo "<div class='thongtincthd' style='width:550px;height:auto;visibility:hidden;background:#337ab7;overflow:hidden;position:absolute;z-index:999999;top:10%;left:50%;margin-left:-250px;'>";
    	if(count($cthd)>0){
    		echo "<h3 style='color:white;font-size:20px;padding-left:20px'>CHI TIẾT HÓA ĐƠN ".$cthd[0]->MAHOADON."</h3>";
    	}
    	echo "<div style='background-color:#fff;margin:5px;padding:15px;'>";
    	echo "<table class='table table-sm table-bordered table-striped table-hover'>";
    	echo "<tr>";
    	echo "<th>Mã hóa đơn</th>";
    	echo "<th>Tên dịch vụ</th>";
    	echo "<th>Số lượng</th>";
    	echo "<th>Thành tiền</th>";
    	echo "</tr>";
    	if(count($cthd)>0){
	    	foreach ($cthd as $ct) {
	    		// code...
	    		echo "<tr>";
	    		echo "<td>".$ct->MAHOADON."</td>";
	    		echo "<td>".$ct->dichvu->TENDICHVU."</td>";
	    		echo "<td>".$ct->SOLUONG."</td>";
	    		echo "<td>".$ct->THANHTIEN."</td>";
	    		echo "</tr>";
	    		$tongtien=$tongtien+$ct->THANHTIEN;
    		}
    	}
    	echo "<tr>";
    	echo "<td colspan=3 style='text-align:center'>Tổng tiền</td>";
    	echo "<td>".$tongtien."</td>";
    	echo "</tr>";
    	echo "</table>";
    	echo "</div>";
    	echo "</div>";
    }

    public function getDatDichVu(Request $rq){
        $dem=0;
        session_start();
        $maphong=$_SESSION['maphong'];
        $mahoadon=hoadon::where('MAPHONG','=',$maphong,'and')->where('TRANGTHAI','=','Chưa thanh toán')->first();
        foreach ($rq->TenDichVu['tendv'] as $key => $val) {
            # code...
            $madichvu=dichvu::where('TENDICHVU','=',$val)->first();
            $soluong=$rq->soluong['soluong'][$dem];
            DB::select(
                'call PRO_DATDICHVUCHOKHACHHANG(?,?,?)',
                [
                    $mahoadon->MAHOADON,
                    $madichvu->MADICHVU,
                    (int)$soluong
                ]
            );
            $dem=$dem+1;
        }
        return redirect('view_admin/QuanLyPhong/danhsach');
    }
}
?>