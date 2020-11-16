<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Admin;
use App\Models\Admin_role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_name = request()->get("role_name");
        $where = [];
        if($role_name){
            $where[] = ["role_name","like","%".$role_name."%"];
        }
        $role = Role::where("role_status",1)->where($where)->paginate("3");
        return view("admin.role.index",compact("role","role_name"));
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
        $res = Role::where("role_id",$arr["id"])->update([$arr["fined"]=>$arr["new_name"]]);
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
        return view("admin.role.create");
    }

     //唯一
     public function ajaxuniq(Request $request){
        $role_id = $request->get("role_id") ? $request->get("role_id") : [];
        $role_name = request()->get("role_name");
        // dd($role_id);
        if($role_id==[]){
            $res = Role::where("role_name",$role_name)->first();
        }else{
            $role = Role::where("role_id",$role_id)->value("role_name");
            if($role!=$role_name){
                $res = Role::where("role_name",$role_name)->first();
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
        if(empty($arr["role_name"])){
            return $this->datacode("false","00001","角色名称不能为空");
        }
        $role_name = Role::where("role_name",$arr["role_name"])->first();
        if($role_name){
            return $this->datacode("false","00001","角色名称已存在");
        }
        $arr["add_time"] = time();
        // dd($arr);
        $res = Role::create($arr);
        if($res){
            return $this->datacode("true","00000","添加成功","/admin/role/index");
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
        $role_id = request()->get("id");
        $role = Role::where(["role_id"=>$role_id,"role_status"=>1])->first();
        return view("admin.role.upd",compact("role"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //修改执行
    public function updDo(){
        $arr = request()->all();
        // dd($arr);
        if(empty($arr["role_name"])){
            return $this->datacode("false","00001","角色名称不能为空");
        }
        $role = Role::where("role_id",$arr["role_id"])->value("role_name");
        if($role!=$arr["role_name"]){
            $isres = Role::where("role_name",$arr["role_name"])->first();
            if($isres){
                return $this->datacode("false","00001","角色名称已存在");
            }
        }else{
            return $this->datacode("true","00000","修改成功","/admin/role/index");
        }
        $arr["add_time"] = time();
        // dd($arr);
        $res = Role::where("role_id",$arr["role_id"])->update($arr);
        if($res){
            return $this->datacode("true","00000","修改成功","/admin/role/index");
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
            $role_id = explode(",",$id);
            $res = Role::whereIn("role_id",$role_id)->update(["role_status"=>0]);
            if($res){
                return $this->datacode("true","00000","修改成功");
            }
        }
        $res = Role::where("role_id",$id)->update(["role_status"=>0]);
        if($res){
            return redirect('/admin/role/index');
        }
    }

    //管理员赋角色
    public function role(){
        $admin_id = request()->get("id");
        $admin_role = Admin_role::where(["admin_id"=>$admin_id,"is_del"=>1])->pluck("role_id");
        $role_id = $admin_role ? $admin_role->toArray() : [];
        $admin_name = Admin::where("admin_id",$admin_id)->value("admin_name");
        $role = Role::where("role_status",1)->get();
        return view("admin.role.role",compact("role","admin_name","admin_id","role_id"));

    }

    //赋权限执行
    public function roleDo(){
        $arr = request()->all();
        $admin_id = Admin::where(["admin_id"=>$arr["admin_id"],"admin_status"=>1])->value("admin_id");
        if($admin_id){
            $role_id = explode(",",$arr["role_id"]);
            if($role_id){
                Admin_role::where("admin_id",$arr["admin_id"])->delete();
                $add = [];
                foreach($role_id as $k=>$v){
                    $add[] = [
                        "admin_id"=>$admin_id,
                        "role_id"=>$v,
                        "add_time"=>time()
                    ];
                }
                // dd($add);
                $res = Admin_role::insert($add);
                if($res){
                    return $this->datacode("true","00000","赋权成功");
                }else{
                    return $this->datacode("false","00001","赋权失败");
                }
            }else{
                return $this->datacode("false","00001","请选择角色");
            }
        }
    }

    //角色提示信息
    public function datacode($status="",$code=1,$msg="",$result=""){
        $message = [];
        $message["status"] = $status;
        $message["code"] = $code;
        $message["msg"] = $msg;
        $message["result"] = $result;
        return $message;
    }
}
