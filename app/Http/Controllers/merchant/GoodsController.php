<?php
namespace App\Http\Controllers\merchant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GoodsController extends Controller
{
    public function goods(){
    	return view("merchant.goods.goods");
    }
    public function type(){
    	return view("merchant.goods.type");

    }
    public function dotype(){

    }


    public function upload() {
        $file = Request()->file("file");
        //dd($file);
        $disk='public';
        // 1.是否上传成功
        if (! $file->isValid()) {
            return false;
        }

        // 2.是否符合文件类型 getClientOriginalExtension 获得文件后缀名
        $fileExtension = $file->getClientOriginalExtension();
        if(!in_array($fileExtension, ['png', 'jpg', 'gif','jpeg'])) {
            return false;
        }

        // 3.判断大小是否符合 2M
        $tmpFile = $file->getRealPath();
        if (filesize($tmpFile) >= 2048000) {
            return false;
        }

        // 4.是否是通过http请求表单提交的文件
        if (! is_uploaded_file($tmpFile)) {
            return false;
        }
        // 5.每天一个文件夹,分开存储, 生成一个随机文件名
        $fileName = date('Y_m_d').'/'.md5(time()) .mt_rand(0,9999).'.'. $fileExtension;
        if (Storage::disk($disk)->put($fileName, file_get_contents($tmpFile)) ){
            $data =[
                'code'=>0,
                'msg'=>'成功',
            	'msg'=>'文件上传成功',
                'data'=>[
                    'src'=>env("UPLOADS_URL")."upload/".$fileName,
                    'title'=>'图片'

                ]
            ];
            return json_encode($data);
        }
    }
    public function bibi($a =array(),$b=array()){

    	
    }   
}