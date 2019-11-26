<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
    //
    protected $table="hoadon";
    protected $primaryKey="MAHOADON";
    public $timestamps = false;
    public function phong(){
    	return $this->belongsTo('App\phong','MAPHONG','MAPHONG');
    }
    public function khachhang(){
    	return $this->belongsTo('App\khachhang','MAKHACHHANG','MAKHACHHANG');
    }
    public function nhanvien(){
    	return $this->belongsTo('App\nhanvien','MANHANVIEN','MANHANVIEN');
    }
}
