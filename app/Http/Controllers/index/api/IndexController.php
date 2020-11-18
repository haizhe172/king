<?php

namespace App\Http\Controllers\index\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin_news;
class IndexController extends Controller
{
    public function index(){
    	$data = [1,3,4,56,67];
    	return json_encode($data);
    }
    public function news(){
        $news = Admin_news::where("is_del",1)->orderBy("add_time","desc")->paginate("6");
        $news = $news ? $news->toArray() : [];
        if(!$news){
            $data = [
                "code"=>"00001",
                "msg"=>"没有数据",
                "result"=>[]
            ];
        }else{
            $data = [
                "code"=>"00000",
                "msg"=>"获取成功",
                "result"=>$news
            ];
        }
        dd($data);
    	return json_encode($data);
    }
}
