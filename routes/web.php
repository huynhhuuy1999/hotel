<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('duocGoi',function(){
	echo "tao da duoc goi lan nua";
})->name('goiDi');
Route::get('goi',function(){
	return redirect()->route('goiDi');
});
Route::group(['prefix'=>'MyGroup'],function(){
	Route::get('user1',function(){echo 'user1';});
	Route::get('user2',function(){echo 'user2';});
	Route::get('/index1',function(){
		return view('view_client.room');
	})->name('room');
});
Route::get('goiController','MyController@xinChao');
Route::get('ts/{ts}','MyController@test_thamso');
Route::get('url','MyController@getURL');
Route::get('getForm',function(){
	return view('test_form');
});
Route::post('postform',['as'=>'postform','uses'=>'MyController@postform']);

Route::group(['prefix'=>'view_client'],function(){

	Route::group(['prefix'=>'phong'],function(){
		Route::get('home','ClientController@getHome')->name('view_home');
		Route::get('phong','ClientController@getPhong')->name('view_phong');
		Route::get('phongDon','ClientController@getPhongDon')->name('view_PhongDon');
		Route::get('phongDoi','ClientController@getPhongDoi')->name('view_PhongDoi');
		Route::get('formDatPhong','ClientController@getFormDatPhong')->name('view_FormDatPhong');
		Route::post('datphong','ClientController@postDatPhong')->name('client_datphong');
	});
});

Route::get('dangnhap','LoginController@getDangNhap')->name('dangnhap_login');
Route::post('dangnhap','LoginController@postDangNhap')->name('dangnhap_login1');



Route::group(['prefix'=> 'view_admin','middleware'=> 'adminLogin'],function(){

	Route::group(['prefix'=>'QuanLyNhanVien'],function(){
		Route::get('danhsach','NhanVienController@getDanhSach')->name('danhsach_nhanvien');

		Route::get('them','NhanVienController@getThem')->name('them_nhanvien');
		Route::post('them','NhanVienController@postThem')->name('them_nhanvien1');

		Route::get('sua/{MaNhanVien}','NhanVienController@getSua')->name('sua_nhanvien');
		Route::post('sua/{MaNhanVien}','NhanVienController@postSua')->name('sua_nhanvien1');

		Route::get('xoa/{MaNhanVien}','NhanVienController@getXoa')->name('xoa_nhanvien');
	});

	Route::group(['prefix'=>'QuanLyDichVu'],function(){
		Route::get('danhsach','DichVuController@getDanhSach')->name('danhsach_dichvu');

		Route::get('them','DichVuController@getThem')->name('them_dichvu');
		Route::post('them','DichVuController@postThem')->name('them_dichvu1');

		Route::get('sua/{MaDichVu}','DichVuController@getSua')->name('sua_dichvu');
		Route::post('sua/{MaDichVu}','DichVuController@postSua')->name('sua_dichvu1');

		Route::get('xoa/{MaDichVu}','DichVuController@getXoa')->name('xoa_dichvu');
	});

	Route::group(['prefix'=>'QuanLyKhachHang'],function(){
		Route::get('danhsach','KhachHangController@getDanhSach')->name('danhsach_khachhang');

		Route::get('them','KhachHangController@getThem')->name('them_khachhang');
		Route::post('them','KhachHangController@postThem')->name('them_khachhang');

		Route::get('sua/{MaKhachHang}','KhachHangController@getSua')->name('sua_khachhang');
		Route::post('sua/{MaKhachHang}','KhachHangController@postSua')->name('sua_khachhang1');
	});

	Route::group(['prefix'=>'QuanLyTaiKhoan'],function(){
		Route::get('danhsach','TaiKhoanController@getDanhSach')->name('danhsach_taikhoan');

		Route::get('them','TaiKhoanController@getThem')->name('them_taikhoan');
		Route::post('them','TaiKhoanController@postThem')->name('them_taikhoan1');

		Route::get('sua/{id}','TaiKhoanController@getSua')->name('sua_taikhoan');
		Route::post('sua/{id}','TaiKhoanController@postSua')->name('sua_taikhoan1');

		Route::get('xoa/{id}','TaiKhoanController@getXoa')->name('xoa_taikhoan');
	});

	Route::group(['prefix'=>'QuanLyPhong'],function(){
		Route::get('danhsach','PhongController@getDanhSach')->name('danhsach_phong');
		Route::post('datphong','PhongController@postDatPhong')->name('datPhong_phong');
		Route::post('thuephong','PhongController@postThuePhong')->name('thuePhong_phong');
		Route::get('traphong','PhongController@getTraPhong')->name('traphong_phong');
		Route::get('donphong','PhongController@getDonPhong')->name('donphong_phong');
	});

	Route::group(['prefix'=>'QuanLyPhieuDatPhong'],function(){
		Route::get('danhsach','PhieuDatPhongController@getDanhSach')->name('danhsach_phieu');
		Route::get('huy/{id}','PhieuDatPhongController@getHuy')->name('huy_phieu');
		Route::get('nhan/{id}','PhieuDatPhongController@getNhan')->name('nhan_phieu');
	});

	Route::group(['prefix'=>'QuanLyHoaDon'],function(){
		Route::get('danhsach','HoaDonController@getDanhSach')->name('danhsach_hoadon');
		Route::get('thongke','HoaDonController@getThongKe')->name('thongke_hoadon');
		Route::get('bieudo','HoaDonController@getBieuDo')->name('bieudo_hoadon');
		Route::get('pdfHoaDon','HoaDonController@getPDF')->name('pdf_hoadon');
		Route::get('xemThongKe/{id1}/{id2}','HoaDonController@getXemThongKe')->name('xemthongke_hoadon');
	});

	Route::group(['prefix'=>'QuanLyChiTietHoaDon'],function(){
		Route::get('danhsach/{id}','ChiTietHoaDonController@getDanhSach')->name('danhsach_cthd');
		Route::post('datdichvu','ChiTietHoaDonController@getDatDichVu')->name('datdichvu_cthd');
	});

	Route::group(['prefix'=>'Ajax'],function(){
		Route::get('ttphong/{id}','AjaxController@getTTPhong')->name('thongtin_phong');
	});

});

Route::get('test',function(){
	return view('view_client.test');
})->name('test');

Route::get('model/test/save',function(){
	$x=new App\loaitaikhoan();
	$x->TENLOAITAIKHOAN="ABC";
	$x->save();
	echo "thêm thành công";
});

