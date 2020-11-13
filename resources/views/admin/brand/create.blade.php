@extends('layout.admin.layout')
@section('title',"运维")
@section('content')
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>品牌编辑</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">





</head>

<body class="hold-transition skin-red sidebar-mini" >

            <!-- 正文区域 -->
            <section class="content">
                <form action="{{url('/admin/brand/createDo')}}" method="post" enctype="multipart/form-data">
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
		                           <div class="col-md-2 title">品牌姓名</div>
		                           <div class="col-md-5 data">
		                               <input type="text" class="form-control"  name="brand_name"  placeholder="品牌姓名" value="">
		                           </div>
                                </div>

                                    <div class="row data-type">
                                       <div class="col-md-2 title">品牌图片</div>
                                       <div class="col-md-5 data">
                                           <input type="file" class="form-control" name="brand_img" value="">
                                       </div>
                                    </div>
                            </div>


                        </div>
                        <!--tab内容/-->
						<!--表单内容/-->

                    </div>




                   </div>
                  <div class="btn-toolbar list-toolbar">
				      <button class="btn btn-primary" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>添加</button>
				      <button class="btn btn-default" ng-click="goListPage()">返回列表</button>
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
@endsection