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
                                <a href="#home" data-toggle="tab">角色信息</a>
                            </li>
                        </ul>
                        <!--tab头/-->

                        <!--tab内容-->
                        <div class="tab-content">

                            <!--表单内容-->
                            <div class="tab-pane active" id="home">
                                <div class="row data-type">

		                           <div class="col-md-2 title">角色名称</div>
		                           <div class="col-md-10 data">
		                               <input type="text" class="form-control" role_id="{{$role->role_id}}" name="role_name" id="role_name"   placeholder="角色名称" value="{{$role->role_name}}">
		                           </div>
                                       <b><span id="span_name" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>
                                </div>
                                
                                <div class="row data-type">

		                           <div class="col-md-2 title" style="height:70px;">角色介绍</div>
		                           <div class="col-md-10 data">
		                               <textarea type="text" class="form-control" name="role_desc" id="role_desc"   placeholder="劫色介绍" style="height:70px;">{{$role->role_desc}}</textarea>
		                           </div>
                                       <b><span id="span_name" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>
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
        //角色名称
        $(document).on("blur","#role_name",function(){
            // alert(123);
            var role_name = $(this).val();
            var role_id = $(this).attr("role_id");
            // alert(role_name);
            if(role_name==""){
                $("#span_name").text("角色名称不能为空");
            }else{
                $.ajax({
                    url: "/admin/role/ajaxuniq",
                    type: "get",
                    data: {
                        role_name:role_name,
                        role_id:role_id
                    },
                    success: function(res) {
                        // console.log(res);
                        if (res == 'no') {
                            $("#span_name").text("角色名称已存在");
                        } else {
                            $("#span_name").html("<font color='green'>√</font>");
                        }
                    }
                })
            }
        })
        //角色阻止提交
        $(document).on("click","#but",function(){
            // alert(12);
            var nameflag = true;
            //阻止角色名称
            var role_name = $("#role_name").val();
            var role_id = $("#role_name").attr("role_id");
            var role_desc = $("#role_desc").val();
            // alert(role_name);
            if(role_name==""){
                $("#span_name").text("角色名称不能为空");
                return false;
            }else{
                // alert(123);
                $.ajax({
                    url: "/admin/role/ajaxuniq",
                    type: "get",
                    sync:false,
                    data: {
                        role_name:role_name,
                        role_id:role_id
                    },
                    success: function(res) {
                        // alert(123);
                        // console.log(res);
                        if (res == 'no') {
                            $("#span_name").text("角色名称已存在");
                            return  false;
                        }
                    }
                })
                if(!nameflag){
                    return false;
                }
            }
            
                $.ajax({
                    url: "/admin/role/updDo",
                    type: "post",
                    sync:false,
                    data: {
                        role_name:role_name,
                        role_id:role_id,
                        role_desc:role_desc
                    },
                    dataType:"json",
                    success: function(res) {
                        // alert(123);
                        console.log(res);
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