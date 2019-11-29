<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nhanvien;

class NhanVienController extends Controller
{
    //
    public function getDanhSach(){
    	$nhanvien= nhanvien::all();
    	return view('view_admin.QuanLyNhanVien.DanhSach',['nhanvien'=>$nhanvien]);
    }

    public function getThem(){
        return view('view_admin.QuanLyNhanVien.ThemNhanVien');
    }

    public function postThem(Request $request){
        $this->validate($request,
        [
            'Ten'=>'required',
            'Email'=>'required|unique:nhanvien,Email',
            'NgaySinh'=>'required',
            'NgayVaoLam'=>'required',
            'CMND'=>'required|numeric|unique:nhanvien,CMND',
            'SoDienThoai'=>'required|numeric',
            'DiaChi'=>'required'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập họ tên',
            'Email.required'=>'Bạn chưa nhập email',
            'Email.unique'=>'Email của bạn đã tồn tại',
            'NgaySinh.required'=>'Bạn chưa nhập ngày sinh',
            'NgayVaoLam.required'=>'Bạn chưa nhập ngày vào làm',
            'CMND.required'=>'Bạn chưa nhập CMND',
            'CMND.numeric'=>'CMND không hợp lệ',
            'CMND.unique'=>'CMND của bạn đã tồn tại',
            'SoDienThoai.required'=>'Bạn chưa nhập số điện thoại',
            'SoDienThoai.numeric'=>'Số điện thoại không hợp lệ',
            'DiaChi.required'=>'Bạn chưa nhập địa chỉ'
        ]);

        $nhanvien=new nhanvien;
        $nhanvien->HOTEN = $request->Ten;
        $nhanvien->NGAYSINH = $request->NgaySinh;
        $nhanvien->NGAYVAOLAM = $request->NgayVaoLam;
        $nhanvien->CMND = $request->CMND;
        $nhanvien->SDT = $request->SoDienThoai;
        $nhanvien->EMAIL = $request->Email;
        $nhanvien->DIACHI = $request->DiaChi;
        $nhanvien->GIOITINH = $request->GioiTinh;
        $nhanvien->TRANGTHAI = $request->TrangThai;
        $nhanvien->save();
        return redirect('view_admin/QuanLyNhanVien/them/')->with('thongbao','Thêm thành công');
    }

    public function getSua($MaNhanVien){
    	$nhanvien1= nhanvien::where('MANHANVIEN','=',$MaNhanVien)->first();
    	return view('view_admin.QuanLyNhanVien.SuaNhanVien',['nhanvien'=>$nhanvien1]);
    }

    public function postSua(Request $request,$MaNhanVien){
    	$nhanvien= nhanvien::where('MANHANVIEN','=',$MaNhanVien)->first();
    	$this->validate($request,
    	[
    		'Ten'=>'required',
    		'Email'=>'required',
    		'NgaySinh'=>'required',
    		'NgayVaoLam'=>'required',
    		'CMND'=>'required|numeric',
    		'SoDienThoai'=>'required|numeric',
    		'DiaChi'=>'required'
    	],
    	[
    		'Ten.required'=>'Bạn chưa nhập họ tên',
    		'Email.required'=>'Bạn chưa nhập email',
    		'NgaySinh.required'=>'Bạn chưa nhập ngày sinh',
    		'NgayVaoLam.required'=>'Bạn chưa nhập ngày vào làm',
    		'CMND.required'=>'Bạn chưa nhập CMND',
            'CMND.numeric'=>'CMND không hợp lệ',
    		'SoDienThoai.required'=>'Bạn chưa nhập số điện thoại',
            'SoDienThoai.numeric'=>'Số điện thoại không hợp lệ',
    		'DiaChi.required'=>'Bạn chưa nhập địa chỉ'
    	]);
    	$nhanvien->HOTEN = $request->Ten;
    	$nhanvien->NGAYSINH = $request->NgaySinh;
    	$nhanvien->NGAYVAOLAM = $request->NgayVaoLam;
    	$nhanvien->CMND = $request->CMND;
    	$nhanvien->SDT = $request->SoDienThoai;
    	$nhanvien->EMAIL = $request->Email;
    	$nhanvien->DIACHI = $request->DiaChi;
    	$nhanvien->GIOITINH = $request->GioiTinh;
    	$nhanvien->TRANGTHAI = $request->TrangThai;
    	$nhanvien->save();
    	
    	 return redirect('view_admin/QuanLyNhanVien/sua/'.$MaNhanVien)->with('thongbao','Sửa thành công');
    }

    public function getXoa($manv){
        $nhanvien= nhanvien::where('MANHANVIEN','=',$manv)->first();
        $nhanvien->delete();
        return redirect('view_admin/QuanLyNhanVien/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
