<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hoadon;
use PDF;
use DB;

class HoaDonController extends Controller
{
    //
    public function getDanhSach(){
    	$hoadon=hoadon::all();
    	return view('view_admin.QuanLyHoaDon.DanhSach',['hoadon'=>$hoadon]);
    }

    public function getThongKe(){
    	return view('view_admin.QuanLyHoaDon.ThongKe');
    }

    // public function getBieuDo(){
    // 	$data=hoado
    // }

    public function getPDF(Request $rq){
        $this->validate($rq,
        [
            'tungay'=>'required',
            'denngay'=>'required'
        ],
        [
            'tungay.required'=>'Bạn chưa nhập từ ngày',
            'denngay.required'=>'Bạn chưa nhập đến ngày'
        ]);
    	$tungay=$rq->tungay;
    	$denngay=$rq->denngay;
    	$thongke=DB::table('hoadon')->select(DB::raw("YEAR(NGAYDI) as nam"),DB::raw("MONTH(NGAYDI) as thang"),DB::raw("(SUM(TONGTIENTHANHTOAN)) as tongtienthanhtoan"))->where('NGAYDI','<',$rq->denngay,'and')->where('NGAYDI','>',$rq->tungay)->orderBy(DB::raw("YEAR(NGAYDI)",'DESC'))->orderBy(DB::raw("MONTH(NGAYDI)",'ASC'))->groupBy(DB::raw("YEAR(NGAYDI)"),DB::raw("MONTH(NGAYDI)"))->get();
    	$pdf=PDF::loadView('view_admin.PDF.ThongKeHoaDon',['thongke'=>$thongke,'tungay'=>$tungay,'denngay'=>$denngay]);//thư mục
    	return $pdf->download('ThongKeHoaDon.pdf');
    }

    public function getXemThongKe($tungay,$denngay){
        $thongke=DB::table('hoadon')->select(DB::raw("YEAR(NGAYDI) as nam"),DB::raw("MONTH(NGAYDI) as thang"),DB::raw("(SUM(TONGTIENTHANHTOAN)) as tongtienthanhtoan"))->where('NGAYDI','<',$denngay,'and')->where('NGAYDI','>',$tungay)->orderBy(DB::raw("YEAR(NGAYDI)",'DESC'))->orderBy(DB::raw("MONTH(NGAYDI)",'ASC'))->groupBy(DB::raw("YEAR(NGAYDI)"),DB::raw("MONTH(NGAYDI)"))->get();
        $nam=0;
        $tong=0;
        $tongnam=0;
        echo "<table class='table table-sm table-bordered table-striped bang-thongke' border='1' style='border-space:0;margin-left:200px;width:700px;'>";
        echo "<thead><tr>";
        echo "<th style='text-align:center'>Năm</th>";
        echo "<th style='text-align:center'>Tháng</th>";
        echo "<th style='text-align:center'>Doanh thu</th>";
        echo "</tr></thead>";
        echo "<tbody>";
        foreach ($thongke as $tk) {
            # code...
            
            if ($tk->nam!=$nam) {
                # code...
                if ($tongnam!=0) {
                    # code...
                    echo "<tr><td colspan='2' style='font-weight:bold;text-align:center'>Tổng doanh thu năm</td>";
                    echo "<td>".$tongnam."</td></tr>";
                }
                echo "<tr><td colspan='3'>".$tk->nam."</td></tr>";
                $nam=$tk->nam;
                $tongnam=0;
            }
            $tongnam=$tongnam+$tk->tongtienthanhtoan;
            echo "<tr>";
            echo "<td></td>";
            echo "<td>".$tk->thang."</td>";
            echo "<td>".$tk->tongtienthanhtoan."</td>";
            echo "</tr>";
            $tong=$tong+$tk->tongtienthanhtoan;
        }
        echo "<tr><td colspan='2' style='font-weight:bold;text-align:center'>Tổng doanh thu năm</td>";
        echo "<td>".$tongnam."</td></tr>";
        echo "<tr>";
        echo "<td colspan='2' style='font-weight:bold;text-align:center'>Tổng doanh thu</td>";
        echo "<td>".$tong."</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
    }
}
