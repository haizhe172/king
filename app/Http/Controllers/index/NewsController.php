<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lib\Curls;

class NewsController extends Controller
{
    public function newsdesc($id){
        // dd($id);
        $url = "http://api.king.com/index/newsdesc?id=".$id;
        $news = Curls::curl_get($url);
        dd($news);
        return view("/index/news/newsdesc");
    }
}
