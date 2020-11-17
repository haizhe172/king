<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Merchant;
use App\Models\Merchant_user;
use App\GatewayClient\Gateway;
use Auth;
class ChatController extends Controller
{
    public function chat(){
        $merchant_id = 1;
        $user_id = 1;
        $type = 1;
        $data = [];
          //判断是用户发给客服 还是客服回用户
        if($type==1){
            $user_data = User::where("index_user_id",$user_id)->first();
            $data_name = $user_data['index_user_name'];
            $send_alone = "KING_1";
            $take_alone = "KING_2";

        }else{
            //$send_alone = $merchant_data['alone'];
            //$take_alone = $user_data['alone'];
            $user_data = Merchant::where("merchant_id",$merchant_id)->first();
            $data_name = $user_data['merchant_name'];
            $send_alone = "KING_2";
            $take_alone = "KING_1";
        }
        return view("index.chat.chat",['data_name'=>$data_name,'send_alone'=>$send_alone,'take_alone'=>$take_alone]);
    }
    public function user(){
    	Request()->session()->put("user_id",1);
    }


    public function merchant(){
        Request()->session()->put("merchant_id",1);
    }

    //聊天
    public function say(Request $request){
        $content = Request()->content;
        $send_alone = Request()->send_alone;
        $take_alone = Request()->take_alone;
        $data =[
            'type'=>'say',
            'content'=>$content,
            'time'=>date("Y-m-d h:i:s",time())
        ];
        $alone = "KING_11";
        Gateway::sendToUid($alone,json_encode($data));


    }
    //用户登录
    public function init(){
        $client_id = Request()->client_id;
        $this->bind($client_id);

    }
    //给用户绑定id
    private function bind($client_id){
        $alone = "KING_11";
    	$client_id = $client_id;
    	Gateway::bindUid($client_id,$alone);
    }



}
