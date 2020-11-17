<?php

namespace App\Http\Controllers\merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
    	return view("merchant.index");
    }
    public function head(){
    	return view("layout.merchant.head");
    }
    public function left(){
    	return view("layout.merchant.left");
    }
    public function goods(){
    	return view("layout.merchant.goods");
    }
    public function type(){
        return view("layout.merchant.type");
    }
}
