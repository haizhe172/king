<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin_user;
use App\Models\PublicModel;
class IndexController extends Controller
{
    public function index(){
   	$data = ['admin_user_name'=>"张三","admin_user_pwd"=>"123","admin_user_time"=>time()];
    $ret = Admin_user::insert($data);
    dd($ret);
    	//return view("admin.index");
    }

}
