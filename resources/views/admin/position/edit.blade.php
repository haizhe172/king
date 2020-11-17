<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
                <form action="{{url('/admin/position/update/'.$position->position_id)}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="box-body">

                    <!--tab页-->
                    <div class="nav-tabs-custom">

                        <!--tab头-->
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#home" data-toggle="tab">广告位基本信息修改</a>
                            </li>
                        </ul>
                        <!--tab头/-->
                        

                        <!--tab内容-->
                        <div class="tab-content">

                            <!--表单内容-->
                            <div class="tab-pane active" id="home">
                                <div class="row data-type">
		                           <div class="col-md-2 title">广告位名称</div>
		                           <div class="col-md-5 data">
		                               <input type="text" class="form-control" value="{{$position->position_name}}"  name="position_name"  placeholder="广告位名称">
		                           </div>
                                </div>
                                <div class="row data-type">
		                           <div class="col-md-2 title">广告位宽度</div>
		                           <div class="col-md-5 data">
		                               <input type="text" class="form-control" value="{{$position->position_width}}"  name="position_width"  placeholder="广告位宽度">
		                           </div>
                                </div>
                                <div class="row data-type">
		                           <div class="col-md-2 title">广告位高度</div>
		                           <div class="col-md-5 data">
		                               <input type="text" class="form-control" value="{{$position->position_height}}"  name="position_height"  placeholder="广告位高度">
		                           </div>
                                </div>
                                <div class="row data-type">
		                           <div class="col-md-2 title" style="height:70px;">广告位描述</div>
		                           <div class="col-md-5 data" style="height:70px;">
		                               <textarea class="form-control"  name="position_desc"  placeholder="广告位描述">{{$position->position_desc}}</textarea>
		                           </div>
                                </div>

                                <div class="row data-type">
                                    <div class="col-md-2 title">广告位模板</div>
                                    <div class="col-md-5 data">
                                        <select name="template_id" id="" class="form-control" >
                                        <option value="">--请选择--</option>
                                            @foreach($template as $v)
                                            <option value="{{$v->template_id}}" {{$v->template_id==$position->template_id ? "selected" : ""}}>{{$v->template_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!--tab内容/-->
						<!--表单内容/-->

                    </div>




                   </div>
                  <div class="btn-toolbar list-toolbar">
				      <!-- <button class="btn btn-primary" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>添加</button> -->
                      <button class="btn btn-primary" type="submit">修改</button>
				      <button class="btn btn-default" ng-click="goListPage()"  type="reset">清除</button>
				  </div>
                  </form>

            </section>
<script type="text/javascript">
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="content"]', {
			allowFileManager : true
		});
	});

</script>

</body>

</html>