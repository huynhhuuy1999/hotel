<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hoadon;

class HoaDonController extends Controller
{
    //
    public function getDanhSach(){
    	$hoadon=hoadon::all();
    	return view('view_admin.QuanLyHoaDon.DanhSach',['hoadon'=>$hoadon]);
    }
}
