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
                        <h3 class="box-title">广告位列表</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">

                            <div class="box-tools pull-right">
                                <div class="has-feedback">
                                    <form action="/admin/position/index" method="get">
							            <input type="text" placeholder="请输入广告位名称..." name="position_name" value="{{$position_name??''}}">
									<button type="submit" class="btn btn-default" >搜索</button>
                                    </form>
                                </div>
                            </div>

			                  <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
			                              <th class="" style="padding-right:0px">
			                                  <input id="selall" type="checkbox" class="icheckbox_square-blue">
			                              </th>
										  <th class="sorting_asc">广告位id</th>
									      <th class="sorting">广告位名称</th>
									      <th class="sorting">广告位宽度</th>
                                          <th class="sorting">广告位高度</th>
									      <th class="sorting">广告位描述</th>
                                          <th class="sorting">广告位模板</th>
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
                                      @foreach($position as $v)
			                          <tr>
                                          <td><input name="selall[]"  type="checkbox" value="{{$v->position_id}}"></td>
				                          <td>{{$v->position_id}}</td>
									      <td attr_id="{{$v->position_id}}">
                                            <span class="span_name">{{$v->position_name}}</span>
                                          </td>
                                          <td attr_id="{{$v->position_width}}">
                                            <span class="span_name">{{$v->position_width}}</span>
                                          </td>
                                          <td attr_id="{{$v->position_height}}">
                                            <span class="span_name">{{$v->position_height}}</span>
                                          </td>
                                          <td attr_id="{{$v->position_desc}}">
                                            <span class="span_name">{{$v->position_desc}}</span>
                                          </td>
                                          <td attr_id="{{$v->template}}">
                                            <span class="span_name">@if($v->template_id==1)图片 @elseif ($v->template_id==2)文字 @endif</span>
                                          </td>
		                                  <td class="text-center">
		                                 	  <a href="/admin/position/edit?id={{$v->position_id}}" class="btn bg-olive btn-xs">修改</a>
		                                 	  <a href="javascript:;" class="btn bg-olive btn-xs" onclick="DeleteGetId({{$v->position_id}},this)">删除</a>
											  <!-- <button class="btn btn-default" ng-click="goListPage()"><a href="#">添加广告</a></button> -->
                                              <a href="/admin/position/show?id={{$v->position_id}}" class="btn bg-olive btn-xs">查看广告</a>
                                              <a href="/admin/position/make?id={{$v->position_id}}" class="btn bg-olive btn-xs">生成广告</a>
		                                   </td>
			                          </tr>
                                      @endforeach
                                      <tr>
                                        <button type="button" class="btn bg-olive btn-xs delall">批量删除</button>
                                        <td colspan="8" align="center">{{$position->appends(['position_name'=>$position_name])->links()}}</td>
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
        $.get('/admin/position/del?id='+id,function(res){
            if(res.code==00000){
                alert(res.msg);
                location.reload();
            }
        },'json')
    }

    // 全选反选
    $('#selall:eq(0)').click(function(){
        // alert(123)
        var checkval = $("#selall").prop('checked');
        // alert(checkval);
        $('input[name="selall[]"]').prop('checked',checkval);
        // if(checkval){
        //     $('input[name="selall[]"]').addClass('checked');
        // }else{
        //     $('input[name="selall[]"]').removeClass('checked');
        // }
    })
    // 全删
    $('.delall').click(function(){
        // alert(123);
        var ids=new Array();
        $('input[name="selall[]"]:checked').each(function(i,k){
            ids.push($(this).val())
        });
        if(ids.length<1){
            alert('没有内容删除');
            return;
        }
        // alert(ids);
        if(confirm('确认要删除吗?')){
            $.get('/admin/position/del/',{id:ids},function(res){
                alert(res.msg);
                location.reload();
            },'json')
        }
    })
</script>
