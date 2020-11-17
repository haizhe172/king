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
                                <a href="#home" data-toggle="tab">权限信息</a>
                            </li>
                        </ul>
                        <!--tab头/-->

                        <!--tab内容-->
                        <div class="tab-content">

                            <!--表单内容-->
                            <div class="tab-pane active" id="home">
                                <div class="row data-type">

		                           <div class="col-md-2 title">权限名称</div>
		                           <div class="col-md-10 data">
		                               <input type="text" class="form-control" name="menu_name" id="menu_name" menu_id="{{$res->menu_id}}"   placeholder="权限名称" value="{{$res->menu_name}}">
		                           </div>
                                       <b><span id="span_name" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>
                                </div>
                                
                                <div class="row data-type">

		                           <div class="col-md-2 title">权限路由</div>
		                           <div class="col-md-10 data">
		                               <input type="text" class="form-control" name="menu_url" id="menu_url"   placeholder="权限路由" value="{{$res->menu_url}}">
		                           </div>
                                       <b><span id="span_name" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>
                                </div>
                                <div class="row data-type">

		                           <div class="col-md-2 title">权限别名</div>
		                           <div class="col-md-10 data">
		                               <input type="text" class="form-control" name="menu_as" id="menu_as"   placeholder="权限别名" value="{{$res->menu_as}}">
		                           </div>
                                       <b><span id="span_name" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>
                                </div>
                                <div class="row data-type">
                                <div class="col-md-2 title">是否显示</div>
                                <div class="col-md-10 data">
                                   <input type="radio" name="is_show" value="1" {{$res->is_show=="1" ? "checked" : ""}}>是
                                   <input type="radio" name="is_show" value="0" {{$res->is_show=="0" ? "checked" : ""}}>否
                                </div>
                                </div>
                                <div class="row data-type">
                                <div class="col-md-2 title">所属模块</div>
                                <div class="col-md-10 data">
                                   <select class="form-control" name="p_id" id="p_id">
                                       <option value="0">--顶级分类--</option>
                                       @foreach($menu as $v)
                                       <option value="{{$v->menu_id}}" {{$res->p_id==$v->menu_id ? "selected" : ""}}>{{str_repeat("|——",$v->level)}}{{$v->menu_name}}</option>
                                       @endforeach
                                   </select>
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
        // alert("123");
        //权限名称
        $(document).on("blur","#menu_name",function(){
            // alert(123);
            var menu_name = $(this).val();
            var menu_id = $(this).attr("menu_id");
            // alert(menu_name);
            if(menu_name==""){
                $("#span_name").text("权限名称不能为空");
            }else{
                $.ajax({
                    url: "/admin/menu/ajaxuniq",
                    type: "get",
                    data: {
                        menu_name:menu_name,
                        menu_id:menu_id
                    },
                    success: function(res) {
                        // console.log(res);
                        if (res == 'no') {
                            $("#span_name").text("权限名称已存在");
                        } else {
                            $("#span_name").html("<font color='green'>√</font>");
                        }
                    }
                })
            }
        })

        //权限阻止提交
        $(document).on("click","#but",function(){
            // alert(12);
            var nameflag = true;
            //阻止权限名称
            var menu_name = $("#menu_name").val();
            var menu_url = $("#menu_url").val();
            var menu_as = $("#menu_as").val();
            var is_show = $("input[name='is_show']:checked").val();
            var p_id = $("#p_id option:selected").val();
            var menu_id = $("#menu_name").attr("menu_id");
            // alert(menu_name);
            if(menu_name==""){
                $("#span_name").text("权限名称不能为空");
                return false;
            }else{
                // alert(123);
                $.ajax({
                    url: "/admin/menu/ajaxuniq",
                    type: "get",
                    sync:false,
                    data: {
                        menu_name:menu_name,
                        menu_id:menu_id
                    },
                    success: function(res) {
                        // alert(123);
                        // console.log(res);
                        if (res == 'no') {
                            $("#span_name").text("权限名称已存在");
                            return  false;
                        }
                    }
                })
                if(!nameflag){
                    return false;
                }
            }
                $.ajax({
                    url: "/admin/menu/updDo",
                    type: "post",
                    sync:false,
                    data: {
                        menu_name:menu_name,
                        menu_url:menu_url,
                        menu_as:menu_as,
                        is_show:is_show,
                        p_id:p_id,
                        menu_id:menu_id
                    },
                    dataType:"json",
                    success: function(res) {
                        // alert(123);
                        // console.log(res);
                        if(res.status=="true"){
                            alert(res.msg);
                            window.location.href=res.result;
                        }else{
                            alert(res.msg);
                        }

                    }
                })
            
        })
    })
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

</script>

</html>

</html>