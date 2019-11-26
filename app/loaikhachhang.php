<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaikhachhang extends Model
{
    //
    protected $table="loaikhachhang";
    protected $primaryKey="MALOAIKHACHHANG";
    public $timestamps = false;
    public function khachhang(){
    	return $this->hasMany('App\khachhang','LOAIKHACHHANG','MALOAIKHACHHANG');
    }
}
