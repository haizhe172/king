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
                                <a href="#home" data-toggle="tab">商品类型信息</a>
                            </li>
                        </ul>
                        <!--tab头/-->

                        <!--tab内容-->
                        <div class="tab-content">

                            <!--表单内容-->
                            <div class="tab-pane active" id="home">
                                <div class="row data-type">

		                           <div class="col-md-2 title">商品类型名称</div>
		                           <div class="col-md-10 data">
		                               <input type="text" class="form-control" name="cat_name" id="cat_name"   placeholder="商品类型名称" value="{{$res->cat_name}}">
		                           </div>
                                       <b><span id="span_name" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>
                                </div>
                                
                            </div>


                   </div>
                  <div class="btn-toolbar list-toolbar">
				      <button type="button" class="btn btn-primary" id="but" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>修改</button>
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
        //商品类型名称
        $(document).on("blur","#cat_name",function(){
            // alert(123);
            var cat_name = $(this).val();
            // alert(cat_name);
            if(cat_name==""){
                $("#span_name").text("商品类型名称不能为空");
            }else{
                $.ajax({
                    url: "/admin/goodstype/ajaxuniq",
                    type: "get",
                    data: {
                        cat_name:cat_name
                    },
                    success: function(res) {
                        // console.log(res);
                        if (res == 'no') {
                            $("#span_name").text("商品类型名称已存在");
                        } else {
                            $("#span_name").html("<font color='green'>√</font>");
                        }
                    }
                })
            }
        })

        //商品类型阻止提交
        $(document).on("click","#but",function(){
            // alert(12);
            var nameflag = true;
            //阻止商品类型名称
            var cat_name = $("#cat_name").val();
            var type_id = {{$res->type_id}};
            // alert(cat_name);
            if(cat_name==""){
                $("#span_name").text("商品类型名称不能为空");
                return false;
            }else{
                // alert(123);
                $.ajax({
                    url: "/admin/goodstype/ajaxuniq",
                    type: "get",
                    sync:false,
                    data: {
                        cat_name:cat_name,
                        type_id:type_id
                    },
                    success: function(res) {
                        // alert(123);
                        // console.log(res);
                        if (res == 'no') {
                            $("#span_name").text("商品类型名称已存在");
                            return  false;
                        }
                    }
                })
                if(!nameflag){
                    return false;
                }
            }
                $.ajax({
                    url: "/admin/goodstype/updDo",
                    type: "post",
                    sync:false,
                    data: {
                        cat_name:cat_name,
                        type_id:type_id
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