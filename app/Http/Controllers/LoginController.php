<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\phong;
use App\phieudatphong;
use App\khachhang;
use App\User;

class LoginController extends Controller
{
    // 
    public function getDangNhap(){
        $ngay=Carbon::now('Asia/Ho_Chi_Minh');

        $phieudatphong1=phieudatphong::where('NGAYDEN','<',$ngay)->get();
        foreach($phieudatphong1 as $phieu){
            $maphong=$phieu->MAPHONG;
            $makh=$phieu->MAKHACHHANG;
            $phong=phong::where('MAPHONG','=',$maphong)->first();
            $phong->TRANGTHAI='Trống';
            $phong->save();
            $kh=khachhang::where('MAKHACHHANG','=',$makh)->first();
            $kh->TRANGTHAI='Đã rời đi';
            $kh->save();
            $phieu->delete();
        }
    	return view('view_admin.QuanLyDangNhap.login');
    }

    public function postDangNhap(Request $request){
    	// $taikhoan=taikhoan::all();
    	$this->validate($request,
        [
            'TenDangNhap'=>'required',
            'MatKhau'=>'required'
        ],
        [
            'TenDangNhap.required'=>'Bạn chưa nhập tên tài khoản',
            'MatKhau.required'=>'Bạn chưa nhập mật khẩu'
        ]);

    	if(Auth::attempt(['email'=>$request->TenDangNhap,'password'=>$request->MatKhau])){
    		return redirect('view_admin/QuanLyPhong/danhsach');
    	}
    	else
    	{
    		return redirect('dangnhap')->with('thongbao','Đăng nhập không thành công');
    	}
    }

    public function getDangXuat(){
        Auth::logout();
        return view('view_admin.QuanLyDangNhap.login');
    }

    
}
