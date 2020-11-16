<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    //添加
    public function create(){
        return view("admin.admin.create");
    }
    //唯一
    public function ajaxuniq(Request $request){
        $admin_id = $request->get("admin_id") ? $request->get("admin_id") : [];
        $admin_name = request()->get("admin_name");
        // dd($admin_id);
        if($admin_id==[]){
            $res = Admin::where("admin_name",$admin_name)->first();
        }else{
            $admin = Admin::where("admin_id",$admin_id)->value("admin_name");
            if($admin!=$admin_name){
                $res = Admin::where("admin_name",$admin_name)->first();
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
    //执行添加
    public function store(){
        $arr = request()->all();
        // dd($arr);
        if(empty($arr["admin_name"])){
            return $this->datacode("false","00001","管理员名称不能为空");
        }
        if(empty($arr["admin_pwd"])){
            return $this->datacode("false","00001","管理员密码不能为空");
        }
        $admin_name = Admin::where("admin_name",$arr["admin_name"])->first();
        if($admin_name){
            return $this->datacode("false","00001","管理员名称已存在");
        }
        $arr["add_time"] = time();
        $arr["admin_pwd"] = encrypt($arr["admin_pwd"]);
        // dd($arr);
        $res = Admin::create($arr);
        if($res){
            return $this->datacode("true","00000","添加成功","/admin/admin/index");
        }else{
            return $this->datacode("false","00001","添加失败");
        }
    }

    //展示
    public function index(){
        $admin_name = request()->get("admin_name");
        $where[] = ["admin_name","like","%".$admin_name."%"];
        $admin = Admin::where("admin_status",1)->where($where)->paginate("2");
        return view("admin.admin.index",compact("admin","admin_name"));
    }

    //及点击该
    public function ajaxNames(){
        $arr = request()->all();
        if(empty($arr["new_name"])){
            return $this->datacode("false","00001","不能为空");
        }
        if(empty($arr["fined"])){
            return $this->datacode("false","00001","非法操作");
        }
        $res = Admin::where("admin_id",$arr["id"])->update([$arr["fined"]=>$arr["new_name"]]);
        dd($res);
        if($res){
            return $this->datacode("true","00000","修改成功");
        }else{
            return $this->datacode("false","00001","修改失败");
        }
    }

    //修改展示
    public function upd(){
        $id = request()->get("id");
        $admin = Admin::where(["admin_status"=>1,"admin_id"=>$id])->first();
        $admin["admin_pwd"] = decrypt($admin["admin_pwd"]);
        return view("admin.admin.upd",compact("admin"));
    }

    //修改执行
    public function updDo(){
        $arr = request()->all();
        // dd($arr);
        if(empty($arr["admin_name"])){
            return $this->datacode("false","00001","管理员名称不能为空");
        }
        if(empty($arr["admin_pwd"])){
            return $this->datacode("false","00001","管理员密码不能为空");
        }
        $admin = Admin::where("admin_id",$arr["admin_id"])->value("admin_name");
        if($admin!=$arr["admin_name"]){
            $isres = Admin::where("admin_name",$arr["admin_name"])->first();
            if($isres){
                return $this->datacode("false","00001","管理员名称已存在");
            }
        }else{
            return $this->datacode("true","00000","修改成功","/admin/admin/index");
        }
        $arr["add_time"] = time();
        $arr["admin_pwd"] = encrypt($arr["admin_pwd"]);
        // dd($arr);
        $res = Admin::where("admin_id",$arr["admin_id"])->update($arr);
        if($res){
            return $this->datacode("true","00000","修改成功","/admin/admin/index");
        }else{
            return $this->datacode("false","00001","修改失败");
        }
    }
    //删除
    public function del($id=0){
        $id = request()->id?:$id;
        // dd($id);
        if(!$id){
            return;
        }
        if(request()->ajax()){
            $admin_id = explode(",",$id);
            $res = Admin::whereIn("admin_id",$admin_id)->update(["admin_status"=>0]);
            if($res){
                return $this->datacode("true","00000","修改成功");
            }
        }
        $res = Admin::where("admin_id",$id)->update(["admin_status"=>0]);
        if($res){
            return redirect('/admin/admin/index');
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
