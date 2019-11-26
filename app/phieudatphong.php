<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phieudatphong extends Model
{
    //
    protected $table="phieudatphong";
    protected $primaryKey="MAPHIEU";
    public $timestamps = false;
    public function nhanvien(){
    	return $this->belongsTo('App\nhanvien','MANHANVIEN','MANHANVIEN');
    }

    public function khachhang(){
    	return $this->belongsTo('App\khachhang','MAKHACHHANG','MAKHACHHANG');
    }
}
