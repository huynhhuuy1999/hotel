<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dichvu;

class DichVuController extends Controller
{
    //
    public function getDanhSach(){
    	$dichvu= dichvu::all();
    	return view('view_admin.QuanLyDichVu.DanhSach',['dichvu'=>$dichvu]);
    }

    public function getThem(){
    	return view('view_admin.QuanLyDichVu.ThemDichVu');
    }

    public function postThem(Request $request){
    	$this->validate($request,
    	[
    		'TenDichVu'=>'required',
    		'GiaTien'=>'required'
    	],
    	[
    		'TenDichVu.required'=>'Bạn chưa nhập tên dịch vụ',
    		'GiaTien.required'=>'Bạn chưa nhập giá tiền'
    	]);
    	$dichvu=new dichvu;
        $dichvu->TENDICHVU = $request->TenDichVu;
        $dichvu->GIATIEN = $request->GiaTien;
    	$dichvu->TRANGTHAI = $request->TrangThai;
    	$dichvu->save();
    	return Redirect('view_admin/QuanLyDichVu/them/')->with('thongbao','Thêm thành công');
    }

    public function getSua($MaDichVu){
    	$dichvu=dichvu::where('MADICHVU','=',$MaDichVu)->first();
    	return view('view_admin.QuanLyDichVu.SuaDichVu',['dichvu'=>$dichvu]);
    }

    public function postSua(Request $request,$MaDichVu){
    	$dichvu=dichvu::where('MADICHVU','=',$MaDichVu)->first();
    	$this->validate($request,
    	[
    		'TenDichVu'=>'required',
    		'GiaTien'=>'required'
    	],
    	[
    		'TenDichVu.required'=>'Bạn chưa nhập tên dịch vụ',
    		'GiaTien.required'=>'Bạn chưa nhập giá tiền'
    	]);
    	$dichvu->TENDICHVU = $request->TenDichVu;
    	$dichvu->GIATIEN = $request->GiaTien;
    	$dichvu->TRANGTHAI = $request->TrangThai;

    	$dichvu->save();
    	return redirect('view_admin/QuanLyDichVu/sua/'.$MaDichVu)->with('thongbao','Sửa thành công');
    }

    public function getXoa($MaDichVu){
    	$dichvu=dichvu::where('MADICHVU','=',$MaDichVu)->first();
    	$dichvu->delete();
    	return redirect('view_admin/QuanLyDichVu/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }

}
