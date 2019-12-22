<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\phong;
// use App\Rules\NgayDi;
use DB;

class ClientController extends Controller
{
    //
    public function getHome(){
    	return view('view_client.index');
    }

    public function getPhong(){
    	return view('view_client.room');
    }

    public function getPhongDon(){
    	return view('view_client.phongDon');
    }

    public function getPhongDoi(){
    	return view('view_client.phongDoi');
    }

    public function getFormDatPhong(){
    	$phongDon=phong::where('MALOAIPHONG','=',1,'and')->where('TRANGTHAI','=','Trống')->get();
    	$phongDoi=phong::where('MALOAIPHONG','=',2,'and')->where('TRANGTHAI','=','Trống')->get();
    	return view('view_client.formDatPhong',['phongDon'=>$phongDon,'phongDoi'=>$phongDoi]);
    }

    public function postDatPhong(Request $rq){
        // session_start();
        // if (session_status() == PHP_SESSION_NONE) {
        //     session_start();
        // }
        // $_SESSION['ngayden'] = $rq->ngayden;
    	$this->validate($rq,
    	[
    		'ngayden'=>'required',
    		'ngaydi'=>'required',
    		'chon_phong'=>'required',
    		'hoten'=>'required',
    		'cmnd'=>'required|numeric',
    		'sodienthoai'=>'required|numeric',
    		'diachi'=>'required',
    		'quocgia'=>'required'
    	],
    	[
    		'ngayden.required'=>'Bạn chưa nhập tên ngày đến',
    		'ngaydi.required'=>'Bạn chưa nhập ngày đi',
    		'chon_phong.required'=>'Bạn chưa chọn phòng',
    		'hoten.required'=>'Bạn chưa nhập họ tên',
    		'cmnd.required'=>'Bạn chưa nhập chứng minh dân dân',
    		'cmnd.numeric'=>'Chứng minh nhân dân không hợp lệ',
    		'sodienthoai.required'=>'Bạn chưa nhập số điện thoại',
    		'sodienthoai.numeric'=>'Số điện thoại không hợp lệ',
    		'diachi.required'=>'Bạn chưa nhập địa chỉ',
    		'quocgia.required'=>'Bạn chưa nhập quốc gia'
    	]);
        // $this->validate($rq,['ngaydi'=> new NgayDi]);

    	$phong=phong::where('MALOAIPHONG','=',$rq->chon_phong,'and')->where('TRANGTHAI','=','Trống')->first();
    	DB::select(
	    	'call PRO_LUUTHONGTINDATPHONG(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
	    	[
	        	$rq->hoten,
	        	$rq->cmnd,
	        	$rq->gioitinh,
	        	$rq->diachi,
	        	$rq->sodienthoai,
	        	$rq->quocgia,
	        	$phong->MAPHONG,
	        	2,
	        	$rq->ngayden,
	        	$rq->ngaydi
	    	]
		);
        if($rq->ngaydi< $rq->ngayden){
            return redirect('view_client/phong/formDatPhong')->with('thongbao1','Ngày đi phải lớn hơn ngày đến');
        }
		return redirect('view_client/phong/formDatPhong')->with('thongbao','Đặt phòng thành công');
    }
}
