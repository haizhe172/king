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
    	$json_data=Curls::curl_get($url);
    	$data=json_decode($json_data);
		if($data->code==100){
			return view("index.goods.list",['data'=>$data->ret]);
		}else{
		dd("数据请求失败");
		}
		
    }
}

