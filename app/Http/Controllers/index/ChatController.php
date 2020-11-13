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
    	Request()->session()->get("user_id",1);
    }



}
