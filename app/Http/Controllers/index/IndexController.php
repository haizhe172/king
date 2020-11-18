<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lib\Curls;
class IndexController extends Controller
{
    public function index(){
        $url = "http://api.king.com/index/news";
        $news = Curls::curl_get($url);
        if(!$news){
            $news = [];
        }
        // dd($news);
        $data = json_decode($news,false);
        $news = $data->result->data;
        // dd($news);
    	return view("index.index",compact("news"));
    }
}
