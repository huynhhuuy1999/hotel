<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phong extends Model
{
    //
    protected $table="phong";
    protected $primaryKey="MAPHONG";
    public $timestamps = false;
    public function loaiphong(){
    	return $this->belongsTo('App\loaiphong','MALOAIPHONG','MALOAIPHONG');
    }
}
