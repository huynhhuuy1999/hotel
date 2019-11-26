<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TaiKhoanController extends Controller
{
    //
    public function getDanhSach(){
    	$taikhoan=User::all();
    	return view('view_admin.QuanLyTaiKhoan.DanhSach',['taikhoan'=>$taikhoan]);
    }

    public function getThem(){
    	return view('view_admin.QuanLyTaiKhoan.ThemTaiKhoan');
    }

    public function postThem(Request $request){
    	$this->validate($request,
        [
            'TenTaiKhoan'=>'required',
            'Email'=>'required|unique:users,Email',
            'MatKhau'=>'required',
            'MatKhau2'=>'required|same:MatKhau'
        ],
        [
            'TenTaiKhoan.required'=>'Bạn chưa nhập tên tài khoản',
            'Email.required'=>'Bạn chưa nhập email',
            'Email.unique'=>'Email đã tồn tại',
            'MatKhau.required'=>'Bạn chưa nhập mật khẩu',
            'MatKhau2.required'=>'Bạn chưa nhập lại mật khẩu',
            'MatKhau2.same'=>'Mật khẩu nhập lại không đúng',
        ]);

        $User=new User;
        $User->name= $request->TenTaiKhoan;
        $User->email = $request->Email;
        $User->password = bcrypt($request->MatKhau);
        $User->save();

        return redirect('view_admin/QuanLyTaiKhoan/them/')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
    	$user=User::where('id','=',$id)->first();
    	return view('view_admin.QuanLyTaiKhoan.SuaTaiKhoan',['user'=>$user]);
    }

    public function postSua(Request $request,$id){
    	$user=User::where('id','=',$id)->first();
    	$this->validate($request,
        [
            'TenTaiKhoan'=>'required'
        ],
        [
            'TenTaiKhoan.required'=>'Bạn chưa nhập tên tài khoản'
        ]);

        $user->name= $request->TenTaiKhoan;
        if ($request->doiMatKhau=='on') {
        	# code...
        	$this->validate($request,
        	[
            'MatKhau'=>'required',
            'MatKhau2'=>'required|same:MatKhau'
        	],
        	[
            'MatKhau.required'=>'Bạn chưa nhập mật khẩu',
            'MatKhau2.required'=>'Bạn chưa nhập lại mật khẩu',
            'MatKhau2.same'=>'Mật khẩu nhập lại không đúng'
        	]);
        	$user->password = bcrypt($request->MatKhau);
        }
        $user->save();

        return redirect('view_admin/QuanLyTaiKhoan/sua/'.$id)->with('thongbao','Sừa thành công');
    }

    public function getXoa($id){
    	$user=User::where('id','=',$id)->first();
    	$user->delete();
    	return redirect('view_admin/QuanLyTaiKhoan/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
