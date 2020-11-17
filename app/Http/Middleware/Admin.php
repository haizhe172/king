<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Admin_role;
use App\Models\Role_menu;
use App\Models\Menu;
use Illuminate\Support\Facades\Route;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $res = session()->get("admin");
        // dd($res->admin_name);
        if(!$res){
            return redirect("/admin/login");
        }
        $name = Route::currentRouteName();
        // dd($name);
        if($name!="admin.index" && $res->admin_name!="小梦"){
            $role_id = Admin_role::where("admin_id",$res->admin_id)->pluck("role_id");
            $menu_id = Role_menu::distinct("menu_id")->whereIn("role_id",$role_id)->pluck("menu_id");
            $menu = Menu::whereIn("menu_id",$menu_id)->get();
            // dd($menu);
            $array = [];
            foreach($menu as $k=>$v){
                $array[] = $v->menu_as;
            }
            // dd($menu);
            if(!in_array($name,$array)){
                dd("您没有权限");
            }
        }

        if($res->admin_name=="小梦"){
            $menu = Menu::where("is_show",1)->get();
            // dd($menu);
            $priv = $this->getInfoCate($menu);
        }else{
            $role_id = Admin_role::where("admin_id",$res->admin_id)->pluck("role_id");
            $menu_id = Role_menu::distinct("menu_id")->whereIn("role_id",$role_id)->pluck("menu_id");
            $menu = Menu::where("is_show",1)->whereIn("menu_id",$menu_id)->get();
            $priv = $this->getInfoCate($menu);
        }
        // dd($priv);
        if($priv){
            view()->share("priv",$priv);
            return $next($request);
        }else{
            dd(您没有权限1);
        }
    }
    public function getInfoCate($menu,$pid=0){
        if(!$menu){
            return;
        }
         $array=[];
                 foreach($menu as $k=>$v){
                     if($v->p_id==$pid){
                         $array[$k]=$v;
                         $array[$k]['son']=$this->getInfoCate($menu,$v->menu_id);
                     }
                 }
                 return $array;
    }
}
