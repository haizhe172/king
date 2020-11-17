<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;
use App\Models\Ad;
use App\Models\Template;
class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 搜索条件
        $ad_name=request()->get('ad_name');
        $where=[];
        if($ad_name){
            $where[]=['ad_name','like',"%$ad_name%"];
        }

        $template=Template::get();
        $position=Position::get();
        $ad=Ad::leftjoin('template','ad.template_id','=','template.template_id')
                ->join('position','ad.position_id','=','position.position_id')
                ->where('ad.is_del',1)
                ->where($where)
                ->orderBy('ad_id','desc')
                ->paginate(2);
        // dd($ad);
        
        // ajax分页
        if(request()->ajax()){
            return view('admin.ad.ajaxpage',['template'=>$template,'position'=>$position,'ad'=>$ad,'ad_name'=>$ad_name]);
        }
        return view('admin.ad.index',['template'=>$template,'position'=>$position,'ad'=>$ad,'ad_name'=>$ad_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $template=Template::get();
        $position=Position::get();
        // dd($position);
        return view("admin.ad.create",['template'=>$template,'position'=>$position]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=$request->except('_token');
        if ($request->hasFile('ad_image') && $request->file('ad_image')->isValid()) {
            $photo = $request->file('ad_image');
            $post['ad_image'] = env('UPLOADS_URL').'/'.$photo->store('upload');
            // dd();
        }
        $res=Ad::create($post);
        if($res){
            return redirect('admin/ad/index');
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
    public function edit()
    {
        $id = request()->get("id");
        $template=Template::get();
        $position=Position::get();
        $ad=Ad::where('ad_id',$id)->first();
        
        return view("admin.ad.edit",['template'=>$template,'position'=>$position,'ad'=>$ad]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = request()->get("id");
        $post=$request->except('_token');
        $res=Ad::where('ad_id',$id)->update($post);
        if($res!==false){
            return redirect('admin/ad/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        // 单删
        $id = request()->get("id");
        $res=Ad::where('ad_id',$id)->update(['is_del'=>2]);
        if(request()->ajax()){
            return json_encode(['code'=>00000,'msg'=>'删除成功']);
        }
        // dd($res);
        if($res){
            return redirect('admin/ad/index');
        }
    }
}
