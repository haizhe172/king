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
                        <h3 class="box-title">商品类型管理</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">

                            <div class="box-tools pull-right">
                                <div class="has-feedback">
                                    <form action="/admin/goodstype/index">
							                  商品类型名称：<input type="text" name="cat_name" value="{{$cat_name??''}}">
									<button type="submit" class="btn btn-default" >查询</button>
                                    </form>
                                </div>
                            </div>

			                  <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
								<button class="btn btn-default dels">批量删除</button>
			                      <thead>
			                          <tr>
			                              <th class="" style="padding-right:0px">
			                                  <input id="selall" type="checkbox" class="icheckbox_square-blue">
			                              </th>
										  <th class="sorting_asc">商品类型ID</th>
									      <th class="sorting">商品类型名称</th>
									      <th class="sorting">添加时间</th>
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
                                      @foreach($res as $itme)
			                          <tr>
                                          <td><input  type="checkbox" class="che" value="{{$itme->type_id}}"></td>
				                          <td>{{$itme->type_id}}</td>
									      <td cat_name="{{$itme->cat_name}}" fined="cat_name" id="{{$itme->type_id}}">
                                            <span class="span_name">{{$itme->cat_name}}</span>
                                          </td>
									      <td>{{date("Y-m-d H:i:s",$itme->add_time)}}</td>
		                                  <td class="text-center">
		                                 	  <a href="/admin/goodstype/upd?id={{$itme->type_id}}" class="btn bg-olive btn-xs">修改</a>
		                                 	  <a href="/admin/goodstype/del?id={{$itme->type_id}}" class="btn bg-olive btn-xs">删除</a>
											  <button class="btn btn-default" ng-click="goListPage()"><a href="/admin/goodstype/attr?id={{$itme->type_id}}">查看属性</a></button>
		                                   </td>
			                          </tr>
                                      @endforeach
                                      <tr><td colspan="7">{{$res->appends(["cat_name"=>$cat_name])->links()}}</td></tr>
			                      </tbody>
			                  </table>
			                  <!--数据列表/-->


                        </div>
                        <!-- 数据表格 /-->


                     </div>
                    <!-- /.box-body -->

</body>

</html>
<script src="/admin/js/jquery.js"></script>
<script>
    $(function(){
        $(document).on("click",".span_name",function(){
            var name = $(this).text();
            // console.log(name);
            $(this).parent().html('<input type="text" class="input_name" value='+name+'> <b><span id="span_names" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>');
            $(".input_name").focus();
        })
        $(document).on("blur",".input_name",function(){
            // alert("123");
            var obj = $(this);
            var new_name = $(this).val();
            var cat_name = $(this).parent().attr("cat_name");
            var fined = $(this).parent().attr("fined");
            var id = $(this).parent().attr("id");
            if(new_name==cat_name){
                 obj.parent().html('<span class="span_name">'+cat_name+'</span>');
                 return false;
            }
            if(new_name==""){
                 obj.parent().html('<span class="span_name">'+cat_name+'</span>');
                 return false;
            }

            // console.log(data);
            if(new_name==""){
                // alert("123");
                $(this).next().children().text("商品类型名称不能为空");
                return false;
            }else{
                $.get(
                    "/admin/goodstype/ajaxNames",
                    {new_name:new_name,fined:fined,id:id},
                    function(res){
                        // console.log(res);
                        if (res["status"]=="false") {
                            obj.next().children().text(res["msg"]);
                            return false;
                        }else{
                                obj.parent().html('<span class="span_name">'+new_name+'</span>');
                                $(this).html(new_name);
                            }
                                
                            });
                        }
                    }
                )
            $(document).on("click","#selall",function(){
                var checkbox = $(this).prop("checked");
                if(checkbox==true){
                    $(".che").prop("checked",true);
                }else{
                    $(".che").prop("checked",false);
                }


            })

            //批量删除
            $(document).on("click",".dels",function(){
                var box=$('.che:checked');
                if(box.length<1){
                    alert('没有内容删除');
                    return false;
                }
                var type_id='';
                box.each(function(){
                    type_id+=$(this).val()+',';
                })
                type_id=type_id.substr(0,type_id.length-1);

                if(window.confirm('是否确定删除？')){
			$.ajax({
				type:"get",
				url:"/admin/goodstype/del",
				data:{id:type_id},
				async:false,
				dataType:"json",
				success:function(res){
                    if(res["status"]=="true"){
                        location.reload();
                    }
				}
			})
		}
            })
        })
</script>
