<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lib\Curls;

class GoodsController extends Controller
{
    public function list(){
    	$cate_id =1;
    	$url = "http://api.king.com/list?cate_id".$cate_id;
    	$data=Curls::curl_get($url);
    	dd($data);
    }
}
