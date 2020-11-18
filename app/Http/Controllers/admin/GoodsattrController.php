<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goodstype;
use App\Models\Goodsattr;

class GoodsattrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = request()->get("id");
        // dd($id);
        $res = Goodstype::where("is_del",1)->get();
        // dd($res);
        return view("admin.goodsattr.create",compact("id","res"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arr = $request->except("_token");
        $res = Goodsattr::create($arr);
        if($res){
            return redirect("/admin/goodstype/attr");
        }else{
            return redirect("/admin/goodsattr/create");
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
        $res = Goodstype::where("is_del",1)->get();
        $data = Goodsattr::where("attr_id",$id)->first();
        return view("admin.goodsattr.upd",compact("res","data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updDo(Request $request)
    {
        $arr = $request->except("_token");
        $id = request()->get("id");
        unset($arr["id"]);
        $res = Goodsattr::where("attr_id",$id)->update($arr);
        if($res){
            return redirect("/admin/goodstype/attr");
        }else{
            return redirect("/admin/goodstype/attr");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del()
    {
        $id = request()->get("id");
        $res = Goodsattr::where("attr_id",$id)->update(["is_del"=>0]);
        if($res){
            return redirect("/admin/goodstype/attr");
        }else{
            return redirect("/admin/goodstype/attr");
        }
    }
}
