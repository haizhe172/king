<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin_news;

class NewsController extends Controller
{
    public function createdo(Request $request){
       $array=$request->except('_token');
        $array['add_time']=time();
        $att=$request->validate([
           'title'=>'required',
           'desc'=>'required'
        ],[
            'title.required'=>'请填写快报标题',
            'desc.required'=>'请填写快报内容'
        ]);

        $res=Admin_news::insert($array);
        if ($att){
            return ['code'=>200,'message'=>'添加成功'];
        }else{
            return ['code'=>10007,'message'=>'系统错误'];
        }
//        dd($array);
    }


    public function index(Request $request){
        $arr=$request->all();
        $where=[];
        $title=$arr['title']?? '';
        if($title){
            $where[]=['title','like',"%$title%"];
        }
        $res=Admin_news::where($where)->paginate(2);
//        dd($res);
        return view('admin.news.index',['daa'=>$res,'key'=>$title]);
    }


    public  function del($id){
//        dd($id);

            $frist=Admin_news::where(['n_id'=>$id])->first();

            if(!isset($frist)){
                echo "<script>alert('数据不存在');location.href='/admin/news/index'</script>";
            }else{
                if($frist->is_del == 1){
                    $res=Admin_news::where('n_id',$id)->update(['is_del'=>0]);
                }else{
                    $res=Admin_news::where('n_id',$id)->update(['is_del'=>1]);
                }

                if($res){
                    echo "<script>alert('已修改');location.href='/admin/news/index'</script>";
                }else{
                    echo "<script>alert('数据不存在');location.href='/admin/news/index'</script>";
                }
            }
        }


    public function upd($id){
//        dd($id);
        $frist=Admin_news::where('n_id',$id)->first();
        return view('admin.news.updata',['data'=>$frist]);
    }

    public function updo(Request $request){
//        dd($request->except('_token'));
        $att=$request->validate([
            'title'=>'required',
            'desc'=>'required'
        ],[
            'title.required'=>'请填写快报标题',
            'desc.required'=>'请填写快报内容'
        ]);
        $array=$request->except('_token');
        $data=$request->except('_token','n_id');
        $res=Admin_news::where('n_id',$array['n_id'])->update($data);
        if($res){
            return ['code'=>200,'message'=>'修改成功'];
        }else{
            return ['code'=>10007,'message'=>'系统错误'];
        }
    }
}
