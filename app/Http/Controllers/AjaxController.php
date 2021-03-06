<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\phong;
use App\loaiphong;
use App\khachhang;
use App\hoadon;
use App\phieudatphong;

class AjaxController extends Controller
{
    //
    public function getTTPhong($maphong){
    	$phong=phong::where('MAPHONG','=',$maphong)->first();
        $hoadon=hoadon::where('MAPHONG','=',$maphong,'and')->where('TRANGTHAI','=','Chưa thanh toán')->first();
    	$phieudatphong=phieudatphong::where('MAPHONG','=',$maphong)->first();
        // if (session_status() == PHP_SESSION_NONE) {
        //     session_start();
        // }
        session_start();
    	$_SESSION['maphong'] = $phong->MAPHONG;
        if (count($phieudatphong)>0) {
            # code...
            $_SESSION['maphieu']=$phieudatphong->MAPHIEU;
        }
        
    	echo "<div class='thongtinphong' style='visibility:hidden;height:auto;width:550px;background:#337ab7;overflow:hidden;position:absolute;z-index:999999;top:10%;left:50%;margin-left:-250px;'>";
    	echo "<h3 style='color:white;font-size:20px;padding-left:20px'>PHÒNG ".$phong->MAPHONG."</h3>";
    	echo "<div style='background-color:#fff;margin:5px;padding:15px;'>";
    	echo "<table style='width:500px;margin:10px;'>";
        // echo "<table class='table table-sm table-bordered table-striped table-hover'>";
    	echo "<tr>";
    	echo "<td style='border-bottom:1px solid #e5e5e5;font-weight:bold;padding:5px;'>Loại phòng</td>";
    	echo "<td style='border-bottom:1px solid #e5e5e5'>".$phong->loaiphong->TENLOAIPHONG."</td>";
    	echo "</tr>";
    	echo "<tr>";
    	echo "<td style='border-bottom:1px solid #e5e5e5;font-weight:bold;padding:5px;'>Giá phòng</td>";
    	echo "<td style='border-bottom:1px solid #e5e5e5'>".$phong->loaiphong->GIAPHONG."</td>";
    	echo "</tr>";
    	echo "<tr>";
    	echo "<td style='border-bottom:1px solid #e5e5e5;font-weight:bold;padding:5px;'>Trạng thái</td>";
    	echo "<td style='border-bottom:1px solid #e5e5e5'>".$phong->TRANGTHAI."</td>";
    	echo "</tr>";
        if($phong->TRANGTHAI=='Đang thuê'){
            echo "<tr>";
            echo "<td style='border-bottom:1px solid #e5e5e5;font-weight:bold;padding:5px;'>Khách hàng</td>";
            echo "<td style='border-bottom:1px solid #e5e5e5;'>".$hoadon->khachhang->HOTEN."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td style='border-bottom:1px solid #e5e5e5;font-weight:bold;padding:5px;'>Ngày đến</td>";
            echo "<td style='border-bottom:1px solid #e5e5e5;'>".$hoadon->NGAYDEN."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td style='border-bottom:1px solid #e5e5e5;font-weight:bold;padding:5px;'>Ngày đi</td>";
            echo "<td style='border-bottom:1px solid #e5e5e5;'>".$hoadon->NGAYDI."</td>";
            echo "</tr>";
        }
        if($phong->TRANGTHAI=='Đã đặt trước'){
            echo "<tr>";
            echo "<td style='border-bottom:1px solid #e5e5e5;font-weight:bold;padding:5px;'>Khách hàng</td>";
            echo "<td style='border-bottom:1px solid #e5e5e5'>".$phieudatphong->khachhang->HOTEN."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td style='border-bottom:1px solid #e5e5e5;font-weight:bold;padding:5px;'>Ngày đặt</td>";
            echo "<td style='border-bottom:1px solid #e5e5e5'>".$phieudatphong->NGAYDAT."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td style='border-bottom:1px solid #e5e5e5;font-weight:bold;padding:5px;'>Ngày đến</td>";
            echo "<td style='border-bottom:1px solid #e5e5e5'>".$phieudatphong->NGAYDEN."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td style='border-bottom:1px solid #e5e5e5;font-weight:bold;padding:5px;'>Ngày đi</td>";
            echo "<td style='border-bottom:1px solid #e5e5e5'>".$phieudatphong->NGAYDI."</td>";
            echo "</tr>";
            
        }
    	echo "</table>";
        if ($phong->TRANGTHAI=='Trống') {
            # code...
            echo "<button class='btn btn-primary' id='nut-datphong' style='' onclick='datPhong()'>Đặt phòng</button>";
            echo "<button class='btn btn-info' id='nut-thuephong' style='' onclick='thuePhong()'>Thuê phòng</button>";
            echo "<button class='btn btn-danger' id='nut-huy' style='margin-left:5px' onclick=''>Hủy</button>";
        }
    	if ($phong->TRANGTHAI=='Chưa dọn') {
            # code...
            echo "<button type='submit' class='btn btn-success' id='nut-sansang' style='' ><a href='".route('donphong_phong')."' style='text-decoration:none;color:white'>Sẵn sàng</a></button>";
            echo "<button class='btn btn-danger' id='nut-huy' style='margin-left:5px' onclick=''>Hủy</button>";
        }
    	if ($phong->TRANGTHAI=='Đang thuê') {
    		# code...
    		echo "<button type='submit' class='btn btn-primary' id='nut-traphong' style=''><a href='".route('traphong_phong')."' style='text-decoration:none;color:white'>Trả phòng</a></button>";
    		echo "<button class='btn btn-warning' id='nut-dichvu' style='margin-left:5px' onclick='datDichVu()'>Dịch vụ</button>";
            echo "<button class='btn btn-danger' id='nut-huy' style='margin-left:5px' onclick=''>Hủy</button>";
    	}
        if ($phong->TRANGTHAI=='Đã đặt trước') {
            # code...
            echo "<button type='submit' class='btn btn-primary' id='nut-nhanphong'><a href='".route('nhanphong_phong')."' style= 'text-decoration:none;color:white'>Nhận phòng</a></button>";
            echo "<button type='' class='btn btn-warning' id='nut-huyphong'><a href='".route('huydatphong_phong')."' style='text-decoration:none;color:white'>Hủy phòng</a></button>";
            echo "<button class='btn btn-danger' id='nut-huy' style='margin-left:5px' onclick=''>Hủy</button>";
        }
        
    	echo "</div>";
    	echo "</div>";
    }	
}
?>