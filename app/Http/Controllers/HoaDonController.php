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
    	$tungay=$rq->tungay;
    	$denngay=$rq->denngay;
    	$thongke=DB::table('hoadon')->select(DB::raw("YEAR(NGAYDI) as nam"),DB::raw("MONTH(NGAYDI) as thang"),DB::raw("(SUM(TONGTIENTHANHTOAN)) as tongtienthanhtoan"))->where('NGAYDI','<',$rq->denngay,'and')->where('NGAYDI','>',$rq->tungay)->orderBy(DB::raw("YEAR(NGAYDI)",'DESC'))->orderBy(DB::raw("MONTH(NGAYDI)",'ASC'))->groupBy(DB::raw("YEAR(NGAYDI)"),DB::raw("MONTH(NGAYDI)"))->get();
    	$pdf=PDF::loadView('view_admin.PDF.ThongKeHoaDon',['thongke'=>$thongke,'tungay'=>$tungay,'denngay'=>$denngay]);//thư mục
    	return $pdf->download('ThongKeHoaDon.pdf');
    }
}
