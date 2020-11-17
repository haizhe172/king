<?php

namespace App\Http\Controllers\merchant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Merchant;
class LoginController extends Controller
{
    public function login(){
    	return view("merchant.login");
    }
    public function dologin(){
    	$merchant_user = Request()->merchant_user;
    	$merchant_pwd = Request()->merchant_pwd;
    	$merchant_data = Merchant::where('merchant_name',$merchant_user)->first();
    	$pswd_open = Crypt::decrypt($merchant_data['merchant_pwd']);
    	$merchant_alone = "KING_1";
    	Request()->session()->put("alone",$merchant_alone);
    	Request()->session()->put("merchant_id",$merchant_data['merchant_id']);
    	if($merchant_pwd == $pswd_open){
    		$data =[
    			'msg'=>"登录成功",
    			'code'=>100,
    			'data'=>[],
    		];
    	}else{
    		$data =[
    			'msg'=>"登录失败",
    			'code'=>101,
    			'data'=>[],
    		];
    	}
    	return json_encode($data);
    }	
}
