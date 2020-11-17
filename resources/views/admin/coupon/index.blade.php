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
                        <h3 class="box-title">优惠券管理</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">

                            <div class="box-tools pull-right">
                                <div class="has-feedback">
                                    <form action="/admin/coupon/index">
							                  优惠券名称：<input type="text" name="act_name" value="{{$act_name??''}}">
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
										  <th class="sorting_asc">优惠券ID</th>
									      <th class="sorting">优惠券名称</th>
									      <th class="sorting">开始时间</th>
									      <th class="sorting">结束时间</th>
									      <th class="sorting">优惠范围</th>
									      <th class="sorting">优惠范围值</th>
									      <th class="sorting">金额下限</th>
									      <th class="sorting">金额上限</th>
									      <th class="sorting">优惠方式</th>
									      <th class="sorting">金额</th>
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
                                      @foreach($res as $itme)
			                          <tr>
                                          <td><input  type="checkbox" class="che" value="{{$itme->act_id}}"></td>
				                          <td>{{$itme->act_id}}</td>
									      <td act_name="{{$itme->act_name}}" fined="act_name" id="{{$itme->act_id}}">
                                            <span class="span_name">{{$itme->act_name}}</span>
                                          </td>
									      <td>{{date("Y-m-d H:i:s",$itme->start_time)}}</td>
									      <td>{{date("Y-m-d H:i:s",$itme->end_time)}}</td>
									      <td>@if($itme->act_range=="0") 全部商品 @elseif($itme->act_range=="1") 以下分类 @elseif($itme->act_range=="2") 以下品牌 @else 以下商品 @endif</td>
									      <td>{{$itme->act_range_ext}}</td>
									      <td>{{$itme->min_amount}}</td>
									      <td>{{$itme->max_amount}}</td>
									      <td>@if($itme->act_type=="1") 享受赠品 @elseif($itme->act_type=="2") 享受现金减免 @else 享受价格折扣 @endif</td>
                                          <td>{{$itme->act_type_ext}}</td>
		                                  <td class="text-center">
		                                 	  <a href="/admin/coupon/upd?id={{$itme->act_id}}" class="btn bg-olive btn-xs">修改</a>
		                                 	  <a href="/admin/coupon/del?id={{$itme->act_id}}" class="btn bg-olive btn-xs">删除</a>
		                                   </td>
			                          </tr>
                                      @endforeach
                                      <tr><td colspan="7">{{$res->appends(["act_name"=>$act_name])->links()}}</td></tr>
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
        })
        $(document).on("blur",".input_name",function(){
            // alert("123");
            var obj = $(this);
            var new_name = $(this).val();
            var act_name = $(this).parent().attr("act_name");
            var fined = $(this).parent().attr("fined");
            var id = $(this).parent().attr("id");
            if(new_name==act_name){
                 obj.parent().html('<span class="span_name">'+act_name+'</span>');
                 return false;
            }
            if(new_name==""){
                 obj.parent().html('<span class="span_name">'+act_name+'</span>');
                 return false;
            }

            // console.log(data);
            if(new_name==""){
                // alert("123");
                $(this).next().children().text("优惠券名称不能为空");
                return false;
            }else{
                $.get(
                    "/admin/coupon/ajaxNames",
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
                var act_id='';
                box.each(function(){
                    act_id+=$(this).val()+',';
                })
                act_id=act_id.substr(0,act_id.length-1);

                if(window.confirm('是否确定删除？')){
			$.ajax({
				type:"get",
				url:"/admin/coupon/del",
				data:{id:act_id},
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
