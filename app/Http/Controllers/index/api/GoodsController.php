<?php

namespace App\Http\Controllers\index\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goods;


class GoodsController extends Controller
{
    public function list(){
    	$cate_id = Request()->cate_id;
    	$cate_id =1;
    	$data = Goods::where("cate_id",$cate_id)->get();
    	return json_encode(['code'=>100,"msg"=>"添加成功","ret"=>[$data]]);
    }
}
