<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    //
    protected $table="khachhang";
    protected $primaryKey="MAKHACHHANG";
    public $timestamps = false;
    public function loaikhachhang(){
    	return $this->belongsTo('App\loaikhachhang','LOAIKHACHHANG','MALOAIKHACHHANG');
    }

    public function phieudatphong(){
    	return $this->hasMany('App\phieudatphong','MAKHACHHANG','MAKHACHHANG');
    }

    public function hoadon(){
        return $this->hasMany('App\hoadon','MAKHACHHANG','MAKHACHHANG');
    }
}
