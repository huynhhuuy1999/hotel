<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaiphong extends Model
{
    //
    protected $table="loaiphong";
    protected $primaryKey="MALOAIPHONG";
    public $timestamps=false;
    public function phong(){
    	return $this->hasMany('App\phong','MALOAIPHONG','MALOAIPHONG');
    }
}
