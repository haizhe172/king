<?php

namespace App\Http\Controllers\index\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
    	$data = [1,3,4,56,67];
    	return json_encode($data);
    }
    public function list(){
    	
    }
}
