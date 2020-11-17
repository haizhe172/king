<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>品牌编辑</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">

    <link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/admin/css/style.css">
	<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- 富文本编辑器 -->
	<link rel="stylesheet" href="/admin/plugins/kindeditor/themes/default/default.css" />
	<script charset="utf-8" src="/admin/plugins/kindeditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="/admin/plugins/kindeditor/lang/zh_CN.js"></script>



</head>

<body class="hold-transition skin-red sidebar-mini" >

            <!-- 正文区域 -->
            <section class="content">
                <form action="" method="post">
                @csrf
                <div class="box-body">

                    <!--tab页-->
                    <div class="nav-tabs-custom">

                        <!--tab头-->
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#home" data-toggle="tab">优惠券信息</a>
                            </li>
                        </ul>
                        <!--tab头/-->

                        <!--tab内容-->
                        <div class="tab-content">

                            <!--表单内容-->
                            <div class="tab-pane active" id="home">
                                <div class="row data-type">

		                           <div class="col-md-2 title">优惠券名称</div>
		                           <div class="col-md-10 data">
		                               <input type="text" class="form-control" name="act_name" id="act_name"   placeholder="优惠券名称" value="">
		                           </div>
                                       <b><span id="span_name" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>
                                </div>

                                <div class="row data-type">
                                <div class="col-md-2 title">开始时间</div>
                                <div class="col-md-10 data">
                                    <input  class="form-control" id="meeting" name="start_time" type="datetime-local"/>
                                </div>
                                </div>
                                <div class="row data-type">
                                <div class="col-md-2 title">结束时间</div>
                                <div class="col-md-10 data">
                                    <input  class="form-control" id="meeting" name="end_time" type="datetime-local"/>
                                </div>
                                </div>
                                <div class="row data-type xuanze" style="display:none;">

		                           <div class="col-md-2 title">选择</div>
		                           <div class="col-md-10 data add">
                                   </div>
                                </div>

                                
                                <div class="row data-type">
                                <div class="col-md-2 title">优惠范围</div>

                                <div class="col-md-10 data">
                                    <table>
                                        <tr>
                                            <td>
                                                <select class="form-control" name="act_range" id="act_range">
                                                    <option value="0">全部商品</option>
                                                    <option value="2">以下品牌</option>
                                                    <option value="1">以下分类</option>
                                                    <option value="3">以下商品</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>

                                </div>
                                </div>


                                <div class="row data-type sousuo" style="display:none;">

		                           <div class="col-md-2 title">搜索</div>
		                           <div class="col-md-10 data">
                                       <input type="text" class="form-control" name="sousuo" id="sousuo" style="width:230px;"  placeholder="搜索" value="">
				                        <button type="button" class="btn btn-primary" id="coubut" style="margin-top:-35px; margin-left:250px;" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>搜索</button>
                                   </div>
                                </div>

                                
                                <div class="row data-type act_range_sousuo" style="display:none;">
                                <div class="col-md-2 title">添加</div>

                                <div class="col-md-10 data">
                                    <table>
                                        <tr>
                                            <td>
                                                <select class="form-control" name="act_range_name" id="act_range_sousuo" style="width:230px;">
                                                    <option value="">--请选择--</option>
                                                </select>
                                                
				                        <button type="button" class="btn btn-primary" id="addbut" style="margin-top:-35px; margin-left:250px;" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>+</button>
                                            </td>
                                        </tr>
                                    </table>

                                </div>
                                </div>

                                <div class="row data-type">

                                <div class="col-md-2 title">金额下限</div>
                                <div class="col-md-10 data">
                                    <input type="text" class="form-control" name="min_amount" id="min_amount"   placeholder="金额上限" value="">
                                </div>
                                </div>


                                <div class="row data-type">

                                <div class="col-md-2 title">金额上限</div>
                                <div class="col-md-10 data">
                                    <input type="text" class="form-control" name="max_amount" id="max_amount"   placeholder="0代表没上线" value="">
                                </div>
                                </div>


                                
                                <div class="row data-type">
                                <div class="col-md-2 title">优惠方式</div>

                                <div class="col-md-10 data">
                                    <table>
                                        <tr>
                                            <td>
                                                <select class="form-control" name="act_type" id="act_type">
                                                    <option value="">--请选择--</option>
                                                    <option value="1">享受赠品</option>
                                                    <option value="2">享受现金减免</option>
                                                    <option value="3">享受价格折扣</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                       <input type="text" class="form-control" name="act_type_ext" id="act_type_ext" style="width:230px; margin-top:-35px; margin-left:150px;"  placeholder="金额" value="0">

                                </div>
                                </div>
                            </div>


                   </div>
                  <div class="btn-toolbar list-toolbar">
				      <button type="button" class="btn btn-primary" id="but" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>添加</button>
				  </div>
                  </form>

            </section>




            <!-- 正文区域 /-->
<script type="text/javascript">

	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="content"]', {
			allowFileManager : true
		});
	});

</script>

</body>

<script src="/admin/js/jquery.js"></script>
<script>
   $(function(){
       //显示
       $(document).on("change","#act_range",function(){
           $(".sousuo").show();
       })
       //搜索
       $(document).on("click","#coubut",function(){
           var _val = $("#sousuo").val();
           var act_range = $("#act_range").val();
           if(_val==""){
               alert("不能为空");
               return false;
           }else{
            $.get("/admin/coupon/sousuo",{act_range:act_range,_val:_val},function(res){
            // console.log(res);
            if(res["code"]=="00001"){
                alert(res["status"]);
            }
            if(res["code"]=="00000"){
                // console.log(res["result"]);
                var _option = "";
                        //for循环
                        for (var i in res["result"]) {
                            //将循环的值 展示option中 再赋值给空字符
                            _option += "<option value='" + res["result"][i]['id'] + "'>" + res["result"][i]['name'] + "</option>";
                        }
                        $(".act_range_sousuo").show();
                        $("#act_range_sousuo").html(_option);
                }
           })
           }
       })
       //加号
       $(document).on("click","#addbut",function(){
           $(".xuanze").show();
            var act_range_name = $("select[name='act_range_name']").text();
            var act_range_id = $("select[name='act_range_name']").val();
            //   alert(act_range_name);
            var ad = $(".ad");
            // console.log(ad);
            $(".add").prepend('<input type="checkbox" name="act_range_ext" id="act_range_ext" value="'+act_range_id+'" checked>'+act_range_name);
       })
       //添加
       $(document).on("click","#but",function(){
           var act_name = $("#act_name").val();
           var start = $("input[name='start_time']").val();
           var timeout2 = start.replace('T', ' ') +":00";     // 2017-12-07 12:12:00
                // 日期字符串 转换成 时间戳
            var start_time = new Date(Date.parse(timeout2.replace(/-/g, '/'))).getTime()/1000;
            var end = $("input[name='start_time']").val();
           var timeout3 = end.replace('T', ' ') +":00";     // 2017-12-07 12:12:00
                // 日期字符串 转换成 时间戳
            var end_time = new Date(Date.parse(timeout3.replace(/-/g, '/'))).getTime()/1000;
            var act_range = $("#act_range").val();
            var box = $("#act_range_ext:checked");
            if(box.lenght<0){
                alert("请选择范围");
                return false;
            }
            var act_range_ext='';
            box.each(function(){
                act_range_ext+=$(this).val()+',';
            })
            act_range_ext=act_range_ext.substr(0,act_range_ext.length-1);
            var min_amount = $("#min_amount").val();
            var max_amount = $("#max_amount").val();
            var act_type = $("#act_type").val();
            var act_type_ext = $("#act_type_ext").val();
            if(act_name==""){
                alert("优惠名称不能为空");
                return false;
            }
            if(start_time==""){
                alert("开始时间不能为空");
                return false;
            }
            if(end_time==""){
                alert("结束时间不能为空");
                return false;
            }
            if(act_range==""){
                alert("范围不能为空");
                return false;
            }
            if(act_range_ext==""){
                alert("范围值不能为空");
                return false;
            }
            if(min_amount==""){
                alert("下限不能为空");
                return false;
            }
            if(max_amount==""){
                alert("上限不能为空");
                return false;
            }
            if(act_type==""){
                alert("优惠方式不能为空");
                return false;
            }
            if(act_type_ext==""){
                alert("优惠金额不能为空");
                return false;
            }
            var data = {};
            data.act_name = act_name;
            data.start_time = start_time;
            data.end_time = end_time;
            data.act_range = act_range;
            data.act_range_ext = act_range_ext;
            data.min_amount = min_amount;
            data.max_amount = max_amount;
            data.act_type = act_type;
            data.act_type_ext = act_type_ext;
            $.post("/admin/coupon/store",{data:data},function(res){
                // console.log(res);
                if(res["status"]=="false"){
                    alert(res["msg"]);
                }else{
                    location.href="/admin/coupon/index"
                }
            });
       })
   })
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

</script>

</html>
