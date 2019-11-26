<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dichvu extends Model
{
    //
    protected $table="dichvu";
    protected $primaryKey="MADICHVU";
    public $timestamps = false;
    public function chitiethoadon(){
    	return $this->hasMany('App\chitiethoadon','MADICHVU','MADICHVU');
    }
}
