<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\BrandModel as Brand;
use App\Models\Goods;


class CouponController extends Controller
{
    public function create(){
        return view("admin.coupon.create");
    }
    //搜索
    public function sousuo(){
        $arr = request()->all();
        // dd($arr);
        if(empty($arr)){
            return $this->datacode("false","00001","不能为空");
        }
        if($arr["act_range"]=="1"){
            $cate = Category::where("cate_name",$arr["_val"])->get();
            $cate = $cate ? $cate->toArray() : [];
            foreach($cate as $k=>$v){
                $cate[$k]["id"] = $v["cate_id"];
                $cate[$k]["name"] = $v["cate_name"];
            }
            dd($cate);
            if($cate){
                return $this->datacode("true","00000","搜索成功",$cate);
            }else{
                return $this->datacode("false","00002","没有此分类");
            }

        }
        if($arr["act_range"]=="2"){
            $brand = Brand::where(["brand_name"=>$arr["_val"],"is_del"=>1])->get();
            $brand = $brand ? $brand->toArray() : [];
            foreach($brand as $k=>$v){
                $brand[$k]["id"] = $v["brand_id"];
                $brand[$k]["name"] = $v["brand_name"];
            }
            if($brand){
                return $this->datacode("true","00000","搜索成功",$brand);
            }else{
                return $this->datacode("false","00002","没有此品牌");
            }
        }
        if($arr["act_range"]=="3"){
            $where[] = ["goods_name","like","%".$arr["_val"]."%"];
            $goods = Goods::where(["is_del"=>1,"is_up"=>1])->where($where)->get();
            $goods = $goods ? $goods->toArray() : [];
            foreach($goods as $k=>$v){
                $goods[$k]["id"] = $v["goods_id"];
                $goods[$k]["name"] = $v["goods_name"];
            }
            if($goods){
                return $this->datacode("true","00000","搜索成功",$goods);
            }else{
                return $this->datacode("false","00002","没有此商品");
            }
        }
    }

    //搜索
    public function updsou(){
        $arr = request()->all();
        // dd($arr);
        if(empty($arr)){
            return $this->datacode("false","00001","不能为空");
        }
        if($arr["act_range"]=="1"){
            $cate = Category::where("cate_id",$arr["_val"])->get();
            $cate = $cate ? $cate->toArray() : [];
            foreach($cate as $k=>$v){
                $cate[$k]["id"] = $v["cate_id"];
                $cate[$k]["name"] = $v["cate_name"];
            }
            // dd($cate);
            if($cate){
                return $this->datacode("true","00000","搜索成功",$cate);
            }else{
                return $this->datacode("false","00002","没有此分类");
            }

        }
        if($arr["act_range"]=="2"){
            $brand = Brand::where(["brand_id"=>$arr["_val"],"is_del"=>1])->get();
            $brand = $brand ? $brand->toArray() : [];
            foreach($brand as $k=>$v){
                $brand[$k]["id"] = $v["brand_id"];
                $brand[$k]["name"] = $v["brand_name"];
            }
            if($brand){
                return $this->datacode("true","00000","搜索成功",$brand);
            }else{
                return $this->datacode("false","00002","没有此品牌");
            }
        }
        if($arr["act_range"]=="3"){
            $where[] = ["goods_id","like","%".$arr["_val"]."%"];
            $goods = Goods::where(["is_del"=>1,"is_up"=>1])->where($where)->get();
            $goods = $goods ? $goods->toArray() : [];
            foreach($goods as $k=>$v){
                $goods[$k]["id"] = $v["goods_id"];
                $goods[$k]["name"] = $v["goods_name"];
            }
            if($goods){
                return $this->datacode("true","00000","搜索成功",$goods);
            }else{
                return $this->datacode("false","00002","没有此商品");
            }
        }
    }

    //执行添加
    public function store(){
        $arr = request()->all()["data"];
        // dd($arr);
        if(empty($arr["act_name"])){
            return $this->datacode("false","00001","优惠名称不能为空");
        }
        if(empty($arr["start_time"])){
            return $this->datacode("false","00001","开始时间不能为空");
        }
        if(empty($arr["end_time"])){
            return $this->datacode("false","00001","结束时间不能为空");
        }
        if(empty($arr["act_range"])){
            return $this->datacode("false","00001","范围不能为空");
        }
        if(empty($arr["act_range_ext"])){
            return $this->datacode("false","00001","范围值不能为空");
        }
        if(empty($arr["min_amount"])){
            return $this->datacode("false","00001","下限不能为空");
        }
        if($arr["max_amount"]==""){
            return $this->datacode("false","00001","上限不能为空");
        }
        if(empty($arr["act_type"])){
            return $this->datacode("false","00001","优惠方式不能为空");
        }
        if(empty($arr["act_type_ext"])){
            return $this->datacode("false","00001","金额不能为空");
        }
        $res = Coupon::create($arr);
        if($res){
            return $this->datacode("true","00000","添加成功");
        }else{
            return $this->datacode("false","00001","添加失败");
        }
    }

    // 优惠券展示
    public function index(){
        $act_name = request()->get("act_name");
        $where = [];
        if($act_name){
            $where[] = ["act_name","like","%".$act_name."%"];
        }
        $res = Coupon::where("is_del",1)->where($where)->paginate("3");
        return view("admin.coupon.index",compact("res","act_name"));
    }

    //优惠券及点击该
    public function ajaxNames(){
        $arr = request()->all();
        if(empty($arr["new_name"])){
            return $this->datacode("false","00001","不能为空");
        }
        if(empty($arr["fined"])){
            return $this->datacode("false","00001","非法操作");
        }
        $res = Coupon::where("act_id",$arr["id"])->update([$arr["fined"]=>$arr["new_name"]]);
        // dd($res);
        if($res){
            return $this->datacode("true","00000","修改成功");
        }else{
            return $this->datacode("false","00001","修改失败");
        }
    }
    
    //优惠券修改展示
    public function upd(){
        $id = request()->get("id");
        $res = Coupon::where("act_id",$id)->first();
        // dd($res);
        return view("admin.coupon.upd",compact("res"));
    }

    //修改执行
    public function updDo(){
        $arr = request()->all()["data"];
        // dd($arr);
        if(empty($arr["act_id"])){
            return $this->datacode("false","00001","非法操作");
        }
        if(empty($arr["act_name"])){
            return $this->datacode("false","00001","优惠名称不能为空");
        }
        if(empty($arr["start_time"])){
            return $this->datacode("false","00001","开始时间不能为空");
        }
        if(empty($arr["end_time"])){
            return $this->datacode("false","00001","结束时间不能为空");
        }
        if(empty($arr["act_range"])){
            return $this->datacode("false","00001","范围不能为空");
        }
        if(empty($arr["act_range_ext"])){
            return $this->datacode("false","00001","范围值不能为空");
        }
        if(empty($arr["min_amount"])){
            return $this->datacode("false","00001","下限不能为空");
        }
        if($arr["max_amount"]==""){
            return $this->datacode("false","00001","上限不能为空");
        }
        if(empty($arr["act_type"])){
            return $this->datacode("false","00001","优惠方式不能为空");
        }
        if(empty($arr["act_type_ext"])){
            return $this->datacode("false","00001","金额不能为空");
        }
        $res = Coupon::where("act_id",$arr["act_id"])->update($arr);
        if($res){
            return $this->datacode("true","00000","添加成功");
        }else{
            return $this->datacode("false","00001","添加失败");
        }
        
    }

    //优惠券删除
    public function del($id=0){
        $id = request()->id?:$id;
        // dd($id);
        if(!$id){
            return;
        }
        if(request()->ajax()){
            $act_id = explode(",",$id);
            $res = Coupon::whereIn("act_id",$act_id)->update(["is_del"=>0]);
            if($res){
                return $this->datacode("true","00000","修改成功");
            }
        }
        $res = Coupon::where("act_id",$id)->update(["id_del"=>0]);
        if($res){
            return redirect('/admin/coupon/index');
        }
    }

    //优惠券提示信息
    public function datacode($status="",$code=1,$msg="",$result=""){
        $message = [];
        $message["status"] = $status;
        $message["code"] = $code;
        $message["msg"] = $msg;
        $message["result"] = $result;
        return $message;
    }
}
