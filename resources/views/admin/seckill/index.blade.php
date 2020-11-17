@extends('layout.admin.layout')
@section('content')
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品管理</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/admin/css/style.css">
	<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>

</head>



<body class="hold-transition skin-red sidebar-mini" >
  <!-- .box-body -->

                    <div class="box-header with-border">
                        <h3 class="box-title">秒杀商品信息列表</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">

                            <!-- <div class="box-tools pull-right">
                                <div class="has-feedback">
                                    <form action="/admin/seckill/index" method="get">
							            <input type="text" placeholder="请输入广告名称..." name="ad_name" value="{{$ad_name??''}}">
									<button type="submit" class="btn btn-default" >搜索</button>
                                    </form>
                                </div>
                            </div> -->

			                  <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
			                              <th class="" style="padding-right:0px">
			                                  <input id="selall" type="checkbox" class="icheckbox_square-blue">
			                              </th>
                                          <th class="sorting_asc">id</th>
                                          <th class="sorting">秒杀活动名称</th>
                                          <th class="sorting">商品id</th>
                                          <th class="sorting">商品库存</th>
									                        <th class="sorting">开始时间</th>
                                          <th class="sorting">结束时间</th>
                                          <th class="sorting">创建时间</th>
                                          <th class="sorting">秒杀活动介绍</th>
                                          <th class="sorting">是否开启</th>
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
                                      @foreach($seckill as $v)
			                          <tr>
                                          <td><input name="selall[]"  type="checkbox"></td>
                                          <td>{{$v->seckill_id}}</td>
                                          <td attr_id="{{$v->seckill_name}}">
                                            <span class="span_name">{{$v->seckill_name}}</span>
                                          </td>
                                          <td attr_id="{{$v->goods_id}}">
                                            <span class="span_name">{{$v->goods_name}}</span>
                                          </td>
                                          <td attr_id="{{$v->goods_num}}">
                                            <span class="span_name">{{$v->goods_num}}</span>
                                          </td>
                                          <td attr_id="{{$v->start_time}}">
                                            <span class="span_name">{{date('Y-m-d',$v->start_time)}}</span>
                                          </td>
                                          <td attr_id="{{$v->end_time}}">
                                            <span class="span_name">{{date('Y-m-d',$v->end_time)}}</span>
                                          </td>
                                          <td attr_id="{{$v->create_time}}">
                                            <span class="span_name">{{date('Y-m-d',$v->create_time)}}</span>
                                          </td>
                                          <td attr_id="{{$v->seckill_desc}}">
                                            <span class="span_name">{{$v->seckill_desc}}</span>
                                          </td>
                                          <td attr_id="{{$v->is_on}}">
                                            <span class="span_name">@if($v->is_on==1)开启 @elseif ($v->is_on==2)关闭 @endif</span>
                                          </td>
                                          
		                                  <td class="text-center">
		                                 	  <a href="{{url('/admin/seckill/edit/'.$v->seckill_id)}}" class="btn bg-olive btn-xs">修改</a>
		                                 	  <a href="javascript:;" class="btn bg-olive btn-xs" onclick="DeleteGetId({{$v->seckill_id}},this)">删除</a>
											  <!-- <button class="btn btn-default" ng-click="goListPage()"><a href="#">添加广告</a></button> -->
		                                   </td>
			                          </tr>
                                      @endforeach
                                      <tr>
                                        <button type="button" class="btn bg-olive btn-xs delall">批量删除</button>
                                        <td colspan="12" align="center">{{$seckill->links()}}</td>
                                      </tr>
			                      </tbody>
			                  </table>
			                  <!--数据列表/-->


                        </div>
                        <!-- 数据表格 /-->


                     </div>
                    <!-- /.box-body -->

</body>

</html>

<script>
    // ajax无刷新分页
    $(document).on('click','.page-item a',function(){
        // alert(123);
        var url = $(this).attr('href');
        // alert(url);
        $.get(url,function(res){
            $('tbody').html(res);
        });
        return false;
  })
  
    //ajax删除
    function DeleteGetId(id,obj){
        // alert(id)
        $.get('/admin/seckill/del/'+id,function(res){
            if(res.code==00000){
                alert(res.msg);
                location.reload();
            }
        },'json')
    }

//     // 全选反选
//     $('#selall:eq(0)').click(function(){
//         // alert(123)
//         var checkval = $("#selall").prop('checked');
//         // alert(checkval);
//         $('input[name="selall[]"]').prop('checked',checkval);
//         // if(checkval){
//         //     $('input[name="selall[]"]').addClass('checked');
//         // }else{
//         //     $('input[name="selall[]"]').removeClass('checked');
//         // }
//     })
//     // 全删
//     $('.delall').click(function(){
//         // alert(123);
//         var ids=new Array();
//         $('input[name="selall[]"]:checked').each(function(i,k){
//             ids.push($(this).val())
//         });
//         // alert(ids);
//         if(confirm('确认要删除吗?')){
//             $.get('/admin/position/del/',{id:ids},function(res){
//                 alert(res.msg);
//                 location.reload();
//             },'json')
//         }
//     })
</script>
@endsection
