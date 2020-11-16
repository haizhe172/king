<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;
use App\Models\Template;
use App\Http\Requests\StorePosition;
class PositionController extends Controller
{
    // 添加视图
    public function create(){
        $template=Template::get();
        // dd($template);
        return view('admin.position.create',['template'=>$template]);
    }
    // 执行添加
    public function store(StorePosition $request){
        $post=request()->except('_token');
        // dd($post);
        $res=Position::create($post);
        if($res){
            return redirect('admin/position/index');
        }
    }
    // 列表
    public function index(){
        $position_name=request()->get('position_name');
        $where=[];
        if($position_name){
            $where[]=['position_name','like',"%$position_name%"];
        }
        $position=Position::where($where)->where('is_del',1)->paginate(2);
        // dd($position);
        if(request()->ajax()){
            return view('admin.position.ajaxpage',['position'=>$position,'position_name'=>$position_name]);
        }
        return view('admin.position.index',['position'=>$position,'position_name'=>$position_name]);
    }
    // 删除
    public function destroy($id=0){
        // dd($id);
        // 全删
        $id=request()->id?:$id;  
        if(!$id){
            return;
        }
        // 单删
        $res=Position::where('position_id',$id)->update(['is_del'=>2]);
        if(request()->ajax()){
            return json_encode(['code'=>00000,'msg'=>'删除成功']);
        }
        // dd($res);
        if($res){
            return redirect('admin/position/index');
        }
    }
    // 修改视图
    public function edit($id){
        $template=Template::get();
        $position=Position::where('position_id',$id)->first();
        return view('admin.position.edit',['position'=>$position,'template'=>$template]);
    }
    // 执行修改
    public function update($id){
        $post=request()->except('_token');
        // dd($post);
        $res=Position::where('position_id',$id)->update($post);
        if($res!==false){
            return redirect('admin/position/index');
        }
    }
}
