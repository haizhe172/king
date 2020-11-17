<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Goods;
use App\Models\Goodstype;
use App\Models\Goodsattr;
use App\Models\Attr;
use App\Models\Product;
use Illuminate\Support\Facades\DB; 
use Illuminate\Validation\Rule;

class GoodsController extends Controller
{
    public function create(){
        $brand = Brand::where("status",1)->get();
        $category = Category::get();
        $goods_type = Goodstype::where("is_del",1)->get();
        // dd($goods_type);
        return view("admin.goods.create",compact("brand","category","goods_type"));
    }
    public function goodsattr(){
        $type_id = request()->type_id;
     //    dd($type_id);
         $attr = Goodsattr::where('type_id',$type_id)->where('is_del',1)->get();
         return view('admin.goods.goodsattr',['attr'=>$attr]);
     }
     public function store(Request $request){
        $request->validate([
            'goods_name' => 'required|unique:admin_goods',
            'goods_price' => 'required',
            'goods_num' => 'required',
            'cate_id' => 'required',
            'brand_id' => 'required',
        ],[
            'goods_name.required'=>'商品名称不能为空',
            'goods_name.unique'=>'商品名称已存在',
            'goods_price.required'=>'商品价格不能为空',
            'goods_num.required'=>'商品数量不能为空',
            'cate_id.required'=>'商品分类不能为空',
            'brand_id.required'=>'商品品牌不能为空',
        ]);
        DB::beginTransaction();
        try{
            $attr_price_list = $request->attr_price_list;
            $attr_value_list = $request->attr_value_list;
            $attr_id_list = $request->attr_id_list;
            $data = $request->except(['_token','attr_price_list','attr_value_list','attr_id_list','type_id']);
            if(empty($goods_sn)){
                $data['goods_sn'] = 'SHOP'.time().rand(0000,9999);
            }
            //图片
            if ($request->hasFile('goods_img') && $request->file('goods_img')->isValid()) {
                // dd(123);
                $photo = $request->file('goods_img');
                $data['goods_img'] = env('UPLOADS_URL').$photo->store('upload');
            }
            // dd($data);
            // dd($request->file('goods_imgs'));
            //相册
            if($request->hasFile('goods_imgs')) {
                $file = $request->goods_imgs;
                // dd($file);
                $goods_imgs=[];
                foreach($file as $k=>$v){
                    $goods_imgs[] = env('UPLOADS_URL').$photo->store('upload');
                }
                $data['goods_imgs']=implode('|',$goods_imgs);
            }
            $data['add_time']=time();
            // dd($data);
            //$res指的是goods_id
            $goods_id = Goods::insertGetId($data);
            // dd($goods_id);
            if(!empty($goods_id)){
                if(!empty($attr_id_list)){
                    $arr = [];
                    for($i=0;$i<count($attr_id_list);$i++){
                        $arr[]=[
                            'goods_id'=>$goods_id,
                            'attr_id'=>$attr_id_list[$i],
                            'attr_value'=>$attr_value_list[$i],
                            'attr_price'=>$attr_price_list[$i] ?? 0
                        ];
                    }
                    Attr::insert($arr);  
                }
                //判断有没有规格
                $goods_specs = $this->goodsSpecs($goods_id);
                if(count($goods_specs)>0){
                    $new_goods_specs = [];
                    foreach($goods_specs as $k=>$v){
                        $new_goods_specs['attr_name'][$v['attr_id']] = $v['attr_name'];
                        $new_goods_specs['attr_values'][$v['attr_id']][$v['goods_attr_id']] = $v['attr_value'];
                    }
                    $goods = Goods::where('goods_id',$goods_id)->first(['goods_name','goods_sn','goods_id']);
                    DB::commit();
                    return view('admin.goods.product',['new_goods_specs'=>$new_goods_specs,'goods'=>$goods]);
                }              
                return redirect('/admin/goods/index');
            }
        }catch(Exception $e){
           dump($e->getMessage());
            DB::rollBack();
        }
     }

     public function goodsSpecs($goods_id){
        $data = Goods::leftjoin('merchant_goods_attr as ga','admin_goods.goods_id','=','ga.goods_id')
            ->leftjoin('merchant_attribute as ab','ga.attr_id','=','ab.attr_id')
            ->where(['ga.goods_id'=>$goods_id,'ab.attr_type'=>1])->get();
        return $data;
    }

     /**
     * 添加货品
     */
    public function product(Request $request){
        $data = $request->except('_token');
        if(count($data['attr'])>0){
            $attr = $data['attr'];
//            dump($attr);
            $firstKey = array_key_first($attr);
//            dd($attr[$firstKey]);
            $count = count($attr[$firstKey]);
//            dd($count);
            for($i=0;$i<$count;$i++){
                $arr[] = array_column($attr,$i);
            }
            $product = [];
            foreach($arr as $k=>$v){
                $product[]=[
                    'goods_id'=>$data['goods_id'],
                    'goods_attr'=>implode('|',$v),
                    'product_sn'=>$data['product_sn'][$k] ?? 'SHOP'.$data['goods_id'].time().rand(0000,9999),
                    'product_number'=>$data['product_number'][$k]
                ];
            }
//            dd($product);
           $res =  Product::insert($product);
            if($res){
                return redirect('/admin/goods/index');
            }
        }
//        dd($data);
    }
    public function index(){
        $goods = Goods::select('admin_goods.*','brand_name','cate_name')->leftjoin('admin_brand','admin_brand.brand_id','=','admin_goods.brand_id')->leftjoin('admin_cate','admin_goods.cate_id','=','admin_cate.cate_id')->where('admin_goods.is_del',1)->get();
        // dd($goods);
        return view('admin.goods.index',['goods'=>$goods]);
    }
    public function del(){
        $id=request()->get("id");
        $res = Goods::where('goods_id',$id)->update(['is_del'=>0]);
        if($res){
            Attr::where('goods_id',$id)->update(['is_del'=>0]);
            Product::where('goods_id',$id)->update(['is_del'=>0]);
            return redirect('/admin/goods/index');
        }
    }
}
