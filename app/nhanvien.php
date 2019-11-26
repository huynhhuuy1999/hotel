<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhanvien extends Model
{
    //
    protected $table="nhanvien";
    protected $primaryKey="MANHANVIEN";
    public $timestamps = false;

    public function phieudatphong(){
    	return $this->hasMany('App\phieudatphong','MANHANVIEN','MANHANVIEN');
    }
}
