<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin_user;
class IndexController extends Controller
{
    public function index(){
    	return view("admin.index");
    }
    public function home(){
    	return view("admin.home");
    }

}
