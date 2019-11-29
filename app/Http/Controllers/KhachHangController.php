<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khachhang;
class KhachHangController extends Controller
{
    //
    public function getDanhSach(){
    	$khachhang=khachhang::all();
    	return view('view_admin.QuanLyKhachHang.DanhSach',['khachhang'=>$khachhang]);
    }

    public function getSua($MaKhachHang){
    	 $khachhang=khachhang::where('MAKHACHHANG','=',$MaKhachHang)->first();
    	 return view('view_admin.QuanLyKhachHang.SuaKhachHang',['khachhang'=>$khachhang]);
    }

    public function postSua(Request $request,$MaKhachHang){
    	$khachhang= khachhang::where('MAKHACHHANG','=',$MaKhachHang)->first();
    	$this->validate($request,
    	[
    		'Ten'=>'required',
    		'CMND'=>'required|numeric',
    		'QuocGia'=>'required',
    		'SoDienThoai'=>'required|numeric',
    		'DiaChi'=>'required'
    	],
    	[
    		'Ten.required'=>'Bạn chưa nhập họ tên',
    		'CMND.required'=>'Bạn chưa nhập CMND',
            'CMND.numeric'=>'CMND không hợp lệ',
    		'QuocGia'=>'Bạn chưa nhập quốc gia',
    		'SoDienThoai.required'=>'Bạn chưa nhập số điện thoại',
            'SoDienThoai.numeric'=>'Số điện thoại không hợp lệ',
    		'DiaChi.required'=>'Bạn chưa nhập địa chỉ'
    	]);
    	$khachhang->HOTEN = $request->Ten;
    	$khachhang->CMND = $request->CMND;
    	$khachhang->QuocGia=$request->QuocGia;
    	$khachhang->SDT = $request->SoDienThoai;
    	$khachhang->DIACHI = $request->DiaChi;
    	$khachhang->GIOITINH = $request->GioiTinh;
    	$khachhang->save();
    	
    	 return redirect('view_admin/QuanLyKhachHang/sua/'.$MaKhachHang)->with('thongbao','Sửa thành công');
    }
}
