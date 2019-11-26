<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\phieudatphong;
use DB;

class PhieuDatPhongController extends Controller
{
    //
    public function getDanhSach(){
    	$phieudatphong=phieudatphong::all();
    	return view('view_admin.QuanLyPhieuDatPhong.DanhSach',['phieudatphong'=>$phieudatphong]);
    }

    public function getHuy($maphieu){
    	DB::select(
    		'call PRO_HUYPHIEUDATPHONG(?)',
    		[$maphieu]
    	);
    	return redirect('view_admin/QuanLyPhieuDatPhong/danhsach')->with('thongbao','Bạn đã hủy thành công');
    }

    public function getNhan($maphieu){
    	$phieu=phieudatphong::where('MAPHIEU','=',$maphieu)->first();
    	DB::select(
    		'call PRO_NHANPHONGDADATTRUOC(?,?,?,?,?)',
    		[
    			$phieu->MAPHONG,
    			$phieu->MAKHACHHANG,
    			$phieu->MANHANVIEN,
    			$phieu->NGAYDEN,
    			$phieu->NGAYDI
    		]
    	);
    	return redirect('view_admin/QuanLyPhieuDatPhong/danhsach')->with('thongbao','Bạn đã nhận phòng thàng công');
    }
}
