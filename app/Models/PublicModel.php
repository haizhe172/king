<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin_user;

class PublicModel extends Model
{
    static function ins($Models,$data =array()){
	$ret  = $Models::insert($data);
	if($ret){
		$result =['code'=>100,'ret'=>"添加成功","info"=>[]];
	}else{
		$result =['code'=>101,'ret'=>"添加失败","info"=>[]];
	}
	return $result;
    
}

static function del($Models,$keyid,$id){
	if(is_array($id)){
		foreach ($id as $key => $value) {
			$ret = $Models::where($keyid,$id)->delete();
		}
	}else{
		$ret = $Models::where($keyid,$id)->delete();
	}
	if($ret){
		$result =['code'=>100,'ret'=>"删除成功","info"=>[]];
	}else{
		$result =['code'=>101,'ret'=>"删除失败","info"=>[]];
	}
	return $result;
}

static function upd($Models,$keyid,$id,$data){
	$ret  = $Models::where($keyid,$id)->update($data);
	if($ret){
		$result =['code'=>100,'ret'=>"修改成功","info"=>[]];
	}else{
		$result =['code'=>101,'ret'=>"修改失败","info"=>[]];
	}
	return $result;
}
}
