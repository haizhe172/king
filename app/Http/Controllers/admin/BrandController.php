<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandModel;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $date=BrandModel::all();
        // dd($date);
        return view('admin/brand/index',['date' => $date]);
        // return view('admin/brand/index');   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view("admin.brand.create");
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $file=$request->all('brand_url');
        // $date['brand_url']=$request->file('brand_url');
        // dd($date);
        // var_dump($file);
        // dd($file);

        // if ($file['type'] == "image/jpg" or $file['type'] == "text/plain"){
        //     echo '失败--类型不符';
        //     die(); 
        // }

        // $file = $_FILES['brand_url'];
        // $date=$request->file('/admin/path')->store('brand_url');
        // dd($file);
        // $path = $request->file('brand_url')->implode(1,$file);

        // return $path;
        // dd($file.$path);
        
        // dd($file);
        // die;



        // if ($_FILES["brand_url"]["error"] > 0){
        //     echo "错误: " . $_FILES["brand_url"]["error"] . "<br />";
        // }else{
        //     echo "文件名: " . $_FILES["brand_url"]["name"] . "<br />";
        //     echo "类型: " . $_FILES["brand_url"]["type"] . "<br />";
        //     echo "大小: " . ($_FILES["brand_url"]["size"] / 1024) . " Kb<br />";
        //     echo "文件临时位置: " . $_FILES["brand_url"]["tmp_name"];
        // }

        // die;
        // $name=$request->input('brand_name');//文本框
        // $img=$request->input('brand_url');//图片
        // $create_brand_time=time();
        // $time=time();
        // dd($name,$img);
        // $a->insert();
        
        $date=$request->except('_token');
        $date['create_brand_time']=time();
        if ($request->hasFile('brand_url') && $request->file('brand_url')->isValid()) {
            $photo = $request->file('brand_url');
            $date['brand_url'] = env('UPLOADS_URL').$photo->store('upload');
        }
        

        // dd($date);
        $res=BrandModel::insert($date);
        // dd($res);
        if($res){
            echo "<script>alert('添加成功');location.href='/admin/brand/index'</script>";
        }
        // echo"插入成功";  
    }

    public function Upload($img){
        //判断过程中是否有错误
        if(request()->file($img)->isValid()){
            //文件上传
            $file = request()->file($img);
            //将图片保存到文件里
             $store_result = $file->store("/uploads");
            //将最后的文件信息返回
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');
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
        // dd($id);
        // dd($res);
        // print_r($id);die;
        $date=BrandModel::where('brand_id','=',$id)->first();
        // $user = BrandModel::find($id);
        // dd($sql);die;
        if ($date) {
            return view('admin/brand/upd',['date' => $date]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updDo(Request $request)//X
    {
        $arr = request()->except("_token");
        // dd($id);
        $arr["create_brand_time"] = time();
        $arr["brand_id"] = $arr["id"];
        unset($arr["id"]);
        // dd($arr);
        
        $res=BrandModel::where('brand_id','=',$arr["brand_id"])->update($arr);
        // echo $res;
        // // die;
        // // update('brand_name','=',$date);
        // $res=$date->update();
        // dd($res);
        if(!$res){
            return redirect("/admin/brand/index");
        }else{
            return redirect("/admin/brand/index");
        }
    }

    public function del(Request $request){
        $id = $request->get("id");
        // dd($id);
        $res = BrandModel::where('brand_id','=',$id)->delete();
        if($res){
            echo "<script>alert('删除成功');location.href='/admin/brand/index'</script>";
        }
    }
}

