<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    //
    public function xinChao(){
    	echo "<h2>xin chào</h2>";
    }

    public function test_thamso($ts){
    	echo "đây là tham số truyền vào: ".$ts;
    	return redirect()->route('goiDi');
    }

    public function getURL(Request $re){
    	echo $re->url();
    }

    public function postform(Request $re){
    	echo $re->ten;
    }
}
}
