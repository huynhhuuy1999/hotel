<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitiethoadon extends Model
{
    //
    protected $table="chitiethoadon";
    protected $primaryKey="MACTHD";
    public $timestamps = false;
    public function dichvu(){
    	return $this->belongsTo('App\dichvu','MADICHVU','MADICHVU');
    }
}
