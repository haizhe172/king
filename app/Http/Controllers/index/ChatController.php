<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chat(){
    	return view("index.chat.chat");
    }
    public function user(){
    $count = 5;
    function get_count(){
    	static $count =1;
    	return $count--;
    };
    echo $count;
    ++$count;
    echo get_count();
    echo get_count();
    	Request()->session()->get("user_id",1);
    }



}
