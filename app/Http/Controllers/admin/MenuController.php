<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Role_menu;
use App\Models\Role;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_name = request()->get("menu_name");
        $where = [];
        if($menu_name){
            $where[] = ["menu_name","like","%".$menu_name."%"];
        }
        $menus = Menu::where("is_del",1)->where($where)->get();
        $menu = $this->getCateInfo($menus);
        // dd($menu);
        return view("admin.menu.index",compact("menu","menu_name"));
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
        $res = Menu::where("menu_id",$arr["id"])->update([$arr["fined"]=>$arr["new_name"]]);
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
        $menus = Menu::where("is_del",1)->get();
        $menu = $this->getCateInfo($menus);
        return view("admin.menu.create",compact("menu"));
    }

    //无限极分类
    function getCateInfo($cate,$pid=0,$level=0){
        // dd($cate);
        //判断接受的分类信息是否为空
        if(!$cate){
            //如为空则停止执行
            return;
        }
        // 3.定义个静态的空数组
        static $cateArray=[];
        //1.循环分类信息
        foreach($cate as $v){
            // dump($v);
            //2.判断循环后的分类信息是否等于定义的pid
            if($v->p_id==$pid){
                // dump($v);
                //自定义个level存进$v中
                $v->level = $level;
                //4.将循环后的信息存进数组中
                $cateArray[] = $v;
                //再次调用方法的自己本身
                $this->getCateInfo($cate,$v->menu_id,$level+1);
            }
        }
        // exit;
        //将数组中的信息返回
        return $cateArray;
    }

    //唯一
    public function ajaxuniq(Request $request){
        $menu_id = $request->get("menu_id") ? $request->get("menu_id") : [];
        $menu_name = request()->get("menu_name");
        // dd($menu_id);
        if($menu_id==[]){
            $res = Menu::where("menu_name",$menu_name)->first();
        }else{
            $menu = Menu::where("menu_id",$menu_id)->value("menu_name");
            if($menu!=$menu_name){
                $res = Menu::where("menu_name",$menu_name)->first();
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
        $arr = $request->all();
        // dd($arr);
        if(empty($arr["menu_name"])){
            return $this->datacode("false","00001","权限名称不能为空");
        }
        $menu_name = Menu::where("menu_name",$arr["menu_name"])->first();
        if($menu_name){
            return $this->datacode("false","00001","权限名称已存在");
        }
        $arr["add_time"] = time();
        // dd($arr);
        $res = Menu::create($arr);
        if($res){
            return $this->datacode("true","00000","添加成功","/admin/menu/index");
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
        $res = Menu::where(["is_del"=>1,"menu_id"=>$id])->first();
        $menus = Menu::where("is_del",1)->get();
        $menu = $this->getCateInfo($menus);
        return view("admin.menu.upd",compact("menu","res"));
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
        if(empty($arr["menu_name"])){
            return $this->datacode("false","00001","权限名称不能为空");
        }
        $menu = Menu::where("menu_id",$arr["menu_id"])->value("menu_name");
        // dd($menu);
        if($menu!=$arr["menu_name"]){
            $isres = Menu::where("menu_name",$arr["menu_name"])->first();
            if($isres){
                return $this->datacode("false","00001","权限名称已存在");
            }
        }else{
            return $this->datacode("true","00000","修改成功","/admin/menu/index");
        }
        $arr["add_time"] = time();
        // dd($arr);
        $res = Menu::where("menu_id",$arr["menu_id"])->update($arr);
        if($res){
            return $this->datacode("true","00000","修改成功","/admin/menu/index");
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
            $menu_id = explode(",",$id);
            $res = Menu::whereIn("menu_id",$menu_id)->update(["is_del"=>0]);
            if($res){
                return $this->datacode("true","00000","修改成功");
            }
        }
        $res = Menu::where("menu_id",$id)->update(["is_del"=>0]);
        if($res){
            return redirect('/admin/menu/index');
        }
    }

    //赋权限
    public function menu(){
        $role_id = request()->get("id");
        // dd($role_id);
        $role_menu = Role_menu::where("role_id",$role_id)->pluck("menu_id");
        $menu_id = $role_menu ? $role_menu->toArray() : [];
        $where[] = ["is_del","=","1"];
        $menus = Menu::where($where)->get();
        $menu = $this->getCateInfo($menus);
        return view("/admin/menu/menu",compact("menu","role_id","menu_id"));
    }

    //赋权限执行
    public function menuDo(){
        $arr = request()->all();
        $role_id = Role::where(["role_id"=>$arr["role_id"],"role_status"=>1])->value("role_id");
        if($role_id){
            $menu_id = explode(",",$arr["menu_id"]);
            // dd($menu_id);
            if($menu_id){
                Role_menu::where("role_id",$arr["role_id"])->delete();
                $add = [];
                foreach($menu_id as $k=>$v){
                    $add[] = [
                        "role_id"=>$role_id,
                        "menu_id"=>$v
                    ];
                }
                // dd($add);
                $res = Role_menu::insert($add);
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

     //权限提示信息
     public function datacode($status="",$code=1,$msg="",$result=""){
        $message = [];
        $message["status"] = $status;
        $message["code"] = $code;
        $message["msg"] = $msg;
        $message["result"] = $result;
        return $message;
    }
}
