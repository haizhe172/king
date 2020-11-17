<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin_Goods;
use App\Models\Seckill;

class SeckillController extends Controller
{
    // 添加视图
    public function create(){
        $admin_goods=Admin_Goods::get();
        return view('admin.seckill.create',['admin_goods'=>$admin_goods]);
    }
    // 执行添加
    public function store(){
        $post=request()->except('_token');
        // 转换时间戳int类型  strtotime()内置时间函数
        $post['start_time']=strtotime($post['start_time']);
        $post['end_time']=strtotime($post['end_time']);
        $post['create_time']=time();
        $res=Seckill::create($post);
        if($res){
            return redirect('admin/seckill/index');
        }
    }
    // 列表页
    public function indexs(){
        // dd(123);
        $admin_goods=Admin_Goods::get();
        $seckill=Seckill::leftjoin('admin_goods','seckill.goods_id','=','admin_goods.goods_id')
                        ->where('seckill.is_del',1)
                        ->orderBy('seckill.seckill_id','desc')
                        ->paginate(2);
        // dd($seckill);

        if(request()->ajax()){
            return view('admin.seckill.ajaxpage',['admin_goods'=>$admin_goods,'seckill'=>$seckill]);
        }
        return view('admin.seckill.index',['admin_goods'=>$admin_goods,'seckill'=>$seckill]);
    }
    // 删除
    public function destroy($id=0){
        $id = request()->get("id");
        $res=Seckill::where('seckill_id',$id)->update(['is_del'=>2]);
        if(request()->ajax()){
            return json_encode(['code'=>00000,'msg'=>'删除成功']);
        }
        if($res){
            return redirect('admin/seckill/index');
        }
    }
}
