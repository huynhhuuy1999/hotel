<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\phong;
use App\hoadon;
use App\dichvu;
use App\phieudatphong;
use Carbon\Carbon;
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
        // if (session_status() == PHP_SESSION_NONE) {
        //     session_start();
        // }
        
        // $this->validate($request,['ngaydi' => new NgayDi]);
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
        if($request->ngayden> $request->ngaydi){
            return redirect('view_admin/QuanLyPhong/danhsach')->with('thongbao1',"Đặt phòng thất bại");
        }
		return redirect('view_admin/QuanLyPhong/danhsach');
    }

    public function postThuePhong(Request $request){
        $this->validate($request,
        [
            'Ten'=>'required',
            'ngaydi'=>'required',
            'quocgia'=>'required',
            'CMND'=>'required|numeric',
            'dienthoai'=>'required|numeric',
            'diachi'=>'required'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập họ tên',
            'ngaydi.required'=>'Bạn chưa nhập ngày đi',
            'quocgia.required'=>'Bạn chưa nhập quốc gia',
            'CMND.required'=>'Bạn chưa nhập CMND',
            'CMND.numeric'=>'CMND không hợp lệ',
            'dienthoai.required'=>'Bạn chưa nhập số điện thoại',
            'dienthoai.numeric'=>'Số điện thoại không hợp lệ',
            'diachi.required'=>'Bạn chưa nhập địa chỉ'
        ]);
        session_start();
        // if (session_status() == PHP_SESSION_NONE) {
        //     session_start();
        // }
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
        if($request->ngaydi< Carbon::now('Asia/Ho_Chi_Minh')){
            return redirect('view_admin/QuanLyPhong/danhsach')->with("thongbao1","Ngày thuê không hợp lệ");
        }
        return redirect('view_admin/QuanLyPhong/danhsach');
    }

    public function getTraPhong(){
        session_start();
        // if (session_status() == PHP_SESSION_NONE) {
        //     session_start();
        // }
        $hoadon=hoadon::where('MAPHONG','=',$_SESSION['maphong'],'and')->where('TRANGTHAI','=','Chưa thanh toán')->first();
        DB::select(
            'call PRO_THANHTOANHOADON(?)',
            [$hoadon->MAHOADON]
        );
        return redirect('view_admin/QuanLyPhong/danhsach');
    }

    public function getDonPhong(){
        session_start();
        // if (session_status() == PHP_SESSION_NONE) {
        //     session_start();
        // }
        $phong=phong::where('MAPHONG','=',$_SESSION['maphong'],'and')->where('TRANGTHAI','=','Chưa dọn')->first();

        $phong->TRANGTHAI='Trống';
        $phong->save();
        return redirect('view_admin/QuanLyPhong/danhsach');
    }

    public function getHuyPhieuDatPhong(){
        session_start();
        DB::select(
            'call PRO_HUYPHIEUDATPHONG(?)',
            [$_SESSION['maphieu']]
        );
        return redirect('view_admin/QuanLyPhong/danhsach')->with('thongbao','Bạn đã hủy đặt phòng thành công');
    }

    public function getNhanPhong(){
        session_start();
        $phieu=phieudatphong::where('MAPHIEU','=',$_SESSION['maphieu'])->first();
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
        return redirect('view_admin/QuanLyPhong/danhsach')->with('thongbao','Bạn đã nhận phòng thàng công');
    }
}
