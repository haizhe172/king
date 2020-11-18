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
        dd($news);
    	return view("index.index");
    }
}
