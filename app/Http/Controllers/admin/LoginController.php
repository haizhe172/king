<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class LoginController extends Controller
{
    public function login(){
        return view("admin.login");
    }

    public function loginis(){
        $arr = request()->all();
        if(empty($arr["admin_name"])){
            return $this->datacode("false","00001","用户名不能为空");
        }
        // dd($arr["admin_name"]);
        $admin=Admin::where("admin_name",$arr["admin_name"])->first();
        // dd($admin);
        if(!$admin){
            return $this->datacode("false","00001","请重新输入账号或者密码");
        }
        if(empty($arr["admin_pwd"])){
            return $this->datacode("false","00001","密码不能为空");
        }
        // dd($admin->admin_pwd);
        if($arr["admin_pwd"]!=decrypt($admin->admin_pwd)){
            return $this->datacode("false","00001","密码错误");
        }else{
            request()->session()->put("admin",$admin);
            return $this->datacode("true","00000","登录成功");
        }
    }

    //管理员提示信息
    public function datacode($status="",$code=1,$msg="",$result=""){
        $message = [];
        $message["status"] = $status;
        $message["code"] = $code;
        $message["msg"] = $msg;
        $message["result"] = $result;
        return $message;
    }
}
