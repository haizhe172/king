<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goodstype;
use App\Models\Attribute;

class GoodstypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat_name = request()->get("cat_name");
        $where = [];
        if($cat_name){
            $where[] = ["cat_name","like","%".$cat_name."%"];
        }
        $res = Goodstype::where($where)->where("is_del",1)->paginate("5");
        return view("admin.goodstype.index",compact("res","cat_name"));
    }

    public function ajaxNames(){
        $arr = request()->all();
        if(empty($arr["new_name"])){
            return $this->datacode("false","00001","不能为空");
        }
        if(empty($arr["fined"])){
            return $this->datacode("false","00001","非法操作");
        }
        $res = Goodstype::where("type_id",$arr["id"])->update([$arr["fined"]=>$arr["new_name"]]);
        // dd($res);
        if($res){
            return $this->datacode("true","00000","修改成功");
        }else{
            return $this->datacode("false","00001","修改失败");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.goodstype.create");
    }

    public function ajaxuniq(Request $request){
        $type_id = $request->get("type_id") ? $request->get("type_id") : [];
        $cat_name = request()->get("cat_name");
        // dd($type_id);
        if($type_id==[]){
            $res = Goodstype::where("cat_name",$cat_name)->first();
        }else{
            $admin = Goodstype::where("type_id",$type_id)->value("cat_name");
            if($admin!=$cat_name){
                $res = Goodstype::where("cat_name",$cat_name)->first();
            }else{
                echo "ok";die;
            }
        }
        
        if($res){
            echo "no";
        }else{
            echo "ok";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arr = request()->all();
        // dd($arr);
        if(empty($arr["cat_name"])){
            return $this->datacode("false","00001","商品类型名称不能为空");
        }
        $cat_name = Goodstype::where("cat_name",$arr["cat_name"])->first();
        if($cat_name){
            return $this->datacode("false","00001","商品类型名称已存在");
        }
        $arr["add_time"] = time();
        // dd($arr);
        $res = Goodstype::create($arr);
        if($res){
            return $this->datacode("true","00000","添加成功","/admin/goodstype/index");
        }else{
            return $this->datacode("false","00001","添加失败");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upd()
    {
        $id = request()->get("id");
        $res = Goodstype::where("type_id",$id)->first();
        return view("admin.goodstype.upd",compact("res"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updDo(Request $request)
    {
        $arr = request()->all();
        // dd($arr);
        if(empty($arr["cat_name"])){
            return $this->datacode("false","00001","商品类型名称不能为空");
        }
        $admin = Goodstype::where("type_id",$arr["type_id"])->value("cat_name");
        if($admin!=$arr["cat_name"]){
            $isres = Goodstype::where("cat_name",$arr["cat_name"])->first();
            if($isres){
                return $this->datacode("false","00001","商品类型名称已存在");
            }
        }else{
            return $this->datacode("true","00000","修改成功","/admin/goodstype/index");
        }
        $arr["add_time"] = time();
        // dd($arr);
        $res = Goodstype::where("type_id",$arr["type_id"])->update($arr);
        if($res){
            return $this->datacode("true","00000","修改成功","/admin/goodstype/index");
        }else{
            return $this->datacode("false","00001","修改失败");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //删除
    public function del($id=0){
        $id = request()->id?:$id;
        // dd($id);
        if(!$id){
            return;
        }
        if(request()->ajax()){
            $type_id = explode(",",$id);
            $res = Goodstype::whereIn("type_id",$type_id)->update(["is_del"=>0]);
            if($res){
                return $this->datacode("true","00000","修改成功");
            }
        }
        $res = Goodstype::where("type_id",$id)->update(["is_del"=>0]);
        if($res){
            return redirect('/admin/goodstype/index');
        }
    }

    public function attr(){
        $id = request()->get("id");
        $res = Attribute::leftjoin("merchant_goods_type","merchant_attribute.type_id","=","merchant_goods_type.type_id")->where("merchant_attribute.is_del",1)->paginate("5");
        return view("admin.goodstype.attr",compact("res","id"));
    }
    
    //商品类型提示信息
    public function datacode($status="",$code=1,$msg="",$result=""){
        $message = [];
        $message["status"] = $status;
        $message["code"] = $code;
        $message["msg"] = $msg;
        $message["result"] = $result;
        return $message;
    }
}
