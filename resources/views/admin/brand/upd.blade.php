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
                <form action="/admin/brand/updDo?id={{$date['brand_id']}}"  enctype="multipart/form-data" method='post'>
                @csrf

                <div class="box-body">

                    <!--tab页-->
                    <div class="nav-tabs-custom">

                        <!--tab头-->
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#home" data-toggle="tab">品牌基本信息</a>
                            </li>
                        </ul>
                        <!--tab头/-->

                        <!--tab内容-->
                        <div class="tab-content">

                            <!--表单内容-->
                            <div class="tab-pane active" id="home">
                                <div class="row data-type">
		                           <div class="col-md-2 title">品牌名称</div>
		                           <div class="col-md-5 data">
		                               <input type="text" class="form-control"  name="brand_name"  placeholder="品牌名称" value="{{$date['brand_name']}}">
		                           </div>
                                </div>

                                <div class="row data-type">
                                    <div class="col-md-2 title">品牌图片</div>
                                    <div class="col-md-5 data">
                                        <input type="file" class="form-control" name="brand_url" id="file">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--tab内容/-->
						<!--表单内容/-->
                    </div>
                   </div>
                  <div class="btn-toolbar list-toolbar">
				      <button class="btn btn-primary" ><i class="fa fa-save"></i>修改</button>
				      <button class="btn btn-default" >返回列表</button>
				  </div>
                  </form>
            </section>
<script type="text/javascript">
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="content"]', {
			allowFileManager:true;		
            });
	});
</script>
</body>