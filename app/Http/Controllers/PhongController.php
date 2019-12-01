<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\phong;
use App\hoadon;
use App\dichvu;
use DB;

class PhongController extends Controller
{
    //


    public function getDanhSach(){
    	$phong=phong::all();
        $dichvu=dichvu::all();
    	return view('view_admin.QuanLyPhong.DanhSach',['phong'=>$phong,'dichvu'=>$dichvu]);
    }

    public function postDatPhong(Request $request){
    	$this->validate($request,
        [
            'Ten'=>'required',
            'ngayden'=>'required',
            'ngaydi'=>'required',
            'quocgia'=>'required',
            'CMND'=>'required|numeric',
            'dienthoai'=>'required|numeric',
            'diachi'=>'required'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập họ tên',
            'ngayden.required'=>'Bạn chưa nhập ngày đến',
            'ngaydi.required'=>'Bạn chưa nhập ngày đi',
            'quocgia.required'=>'Bạn chưa nhập quốc gia',
            'CMND.required'=>'Bạn chưa nhập CMND',
            'CMND.numeric'=>'CMND không hợp lệ',
            'dienthoai.required'=>'Bạn chưa nhập số điện thoại',
            'dienthoai.numeric'=>'Số điện thoại không hợp lệ',
            'diachi.required'=>'Bạn chưa nhập địa chỉ'
        ]);
    	session_start();
		
        DB::select(
	    	'call PRO_LUUTHONGTINDATPHONG(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
	    	[
	        	$request->Ten,
	        	$request->CMND,
	        	$request->gioitinh,
	        	$request->diachi,
	        	$request->dienthoai,
	        	$request->quocgia,
	        	$_SESSION['maphong'],
	        	2,
	        	$request->ngayden,
	        	$request->ngaydi
	    	]
		);
		return redirect('view_admin/QuanLyPhong/danhsach');
    }

    public function postThuePhong(Request $request){
        $this->validate($request,
        [
            'Ten'=>'required',
            'ngaydi'=>'required',
            'quocgia'=>'required',
            'CMND'=>'required',
            'dienthoai'=>'required',
            'diachi'=>'required'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập họ tên',
            'ngaydi.required'=>'Bạn chưa nhập ngày đi',
            'quocgia.required'=>'Bạn chưa nhập quốc gia',
            'CMND.required'=>'Bạn chưa nhập CMND',
            'dienthoai.required'=>'Bạn chưa nhập số điện thoại',
            'diachi.required'=>'Bạn chưa nhập địa chỉ'
        ]);
        session_start();
        
        DB::select(
            'call PRO_LUUTHONGTINTHUEPHONG(?, ?, ?, ?, ?, ?, ?, ?, ?)',
            [
                $request->Ten,
                $request->CMND,
                $request->gioitinh,
                $request->diachi,
                $request->dienthoai,
                $request->quocgia,
                $_SESSION['maphong'],
                2,
                $request->ngaydi
            ]
        );
        return redirect('view_admin/QuanLyPhong/danhsach');
    }

    public function getTraPhong(){
        session_start();
        $hoadon=hoadon::where('MAPHONG','=',$_SESSION['maphong'],'and')->where('TRANGTHAI','=','Chưa thanh toán')->first();
        DB::select(
            'call PRO_THANHTOANHOADON(?)',
            [$hoadon->MAHOADON]
        );
        return redirect('view_admin/QuanLyPhong/danhsach');
    }

    public function getDonPhong(){
        session_start();
        $phong=phong::where('MAPHONG','=',$_SESSION['maphong'],'and')->where('TRANGTHAI','=','Chưa dọn')->first();

        $phong->TRANGTHAI='Trống';
        $phong->save();
        return redirect('view_admin/QuanLyPhong/danhsach');
    }
}
