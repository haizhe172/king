<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin_cate;

class CateController extends Controller
{
    /**
     * 添加导航栏数据
     */
//循环遍历
    function getinfo($res,$pid=0){
        $info=[];
        foreach($res as $k=>$v){
            if($v['pid']==$pid){
                $show=$this->getinfo($res,$v['cate_id']);
                $v['nodes']=$show;
                        $info[]=$v;
            }
        }
        return $info;
    }
    //循环遍历
    function CreateTree($res,$pid=0,$level = 1){
        if(!count($res)){
            return [];
        }
        static $info=[];
        foreach($res as $k=>$v){
            if($v['pid']==$pid){
                $v['level']=$level;
                $info[]=$v;
                $this->CreateTree($res,$v['cate_id'],$level+1);
            }
        }
        return $info;
    }

    public function create(){
//        dd(1111);
        $data=Admin_cate::get();
//        dd($data[0]['cate_show']);
//        $arr=[];
//        foreach ($data as $value){
//                $arr[$value['cate_id']]=$value;
//                $arr[$value['cate_id']]['children']=array();
//            foreach ($arr as $k=>$v){
//                if ($value['pid'] != 0){
//                    $arr[$value['cate_id']]['children'][]=&$arr[$k];
//                }
//            }
//        }
        $arr=$this->CreateTree($data);
//       dd($arr);
        $att=json_decode(json_encode($arr),true);
//        dd($att);
        return view('admin.cate.create',['cate'=>$att]);
    }
    //添加分类
    public function createdo(Request $request){
        $data=$request->except('_token');
        $att=$request->validate([
            'cate_name'=>'required',
        ],[
            'cate_name.required'=>'请填写分类名称',
        ]);
//        dd($data);
        $res=Admin_cate::insert($data);
//        dd($res);

        if($res){
            return ['code'=>200,'message'=>'添加成功'];
        }else{
            return ['code'=>10008,'message'=>'系统错误'];
        }
    }

    /**
     * 分类展示
     */

    public function index(){
        $data=Admin_cate::get();
        $arr=$this->CreateTree($data);
//        $att=json_encode($arr,JSON_UNESCAPED_UNICODE);
//        $att=json_decode(json_encode($arr),true);
//        dd($att);
        return view('admin.cate.index',['data'=>$arr]);
    }

    /**
     * 修改展示状态
     */

    public function del(Request $request,$id){
        $data=Admin_cate::where('cate_id',$id)->first();
        if($data->cate_show === 1){
            $res=Admin_cate::where('cate_id',$id)->update(['cate_show'=>0]);
            if ($res){
                echo "<script>alert('修改成功');location.href='/admin/cate/index'</script>";
            }
        }elseif($data->cate_show === 0){
            $res=Admin_cate::where('cate_id',$id)->update(['cate_show'=>1]);
            if ($res){
                echo "<script>alert('修改成功');location.href='/admin/cate/index'</script>";
            }
        }else{
            echo "<script>alert('系统错误');location.href='/admin/cate/index'</script>";
        }
//        dd($data);
    }


    /**
     *
     * 修改
     */
    public function updata(Request $request,$id){
        $res=Admin_cate::where('cate_id',$id)->first();
        $pname=Admin_cate::where('cate_id',$res->pid)->first();
        if($res){
            $data=Admin_cate::get();
            $arr=$this->CreateTree($data);
            $att=json_decode(json_encode($arr),true);
            return view('admin.cate.updata',['first'=>$res,'cate'=>$att,'pname'=>$pname]);
        }else{
            echo "<script>alert('数据不存在');location.href='/admin/cate/index'</script>";
        }
    }

    /**
     * @param Request $request修改执行
     *
     */

    public function updatado(Request $request){
        $data=$request->except('_token','cate_id');
        $cate_id=$request->cate_id;
//        echo $cate_id;
//        dd($data);
        $res=Admin_cate::where('cate_id',$cate_id)->update($data);
        if ($res){
            return ['code'=>200,'message'=>'修改成功'];
        }else{
            return ['code'=>200,'message'=>'系统错误'];
        }
    }
}
