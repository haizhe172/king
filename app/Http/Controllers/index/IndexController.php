<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lib\Curls;
class IndexController extends Controller
{
    public function index(){
    	$Curls = new Curls();
    	dd($Curls->test());
    	return view("index.index");
    }
}
