<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>品牌管理</title>
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
                        <h3 class="box-title">品牌管理</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">

                            <div class="box-tools pull-right">
                                <div class="has-feedback">
                                    <form action="/admin/admin/index">
							                  品牌名称：<input type="text" name="admin_name" value="{{$admin_name??''}}">
									<button type="submit" class="btn btn-default" >查询</button>
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
										  <th class="sorting_asc">品牌ID</th>
									      <th class="sorting">品牌名称</th>
									      <th class="sorting">品牌图片</th>
									      <th class="sorting">添加时间</th>
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
                                    @foreach ($date as $v)
			                          <tr>
                                        <td><input  type="checkbox"></td>
                                        <td>{{$v['brand_id']}}</td>
                                        <td>{{$v['brand_name']}}</td>
                                        <td>@if($v->brand_url)<img src="{{$v->brand_url}}" width="60"> @endif</td>
                                        <td>{{date("Y-m-d H:i:s",$v['create_brand_time'])}}</td>
                                        <td class="text-center">
                                            <a href="/admin/brand/upd?id={{$v['brand_id']}}" class="btn bg-olive btn-xs">修改</a>
                                            <a href="/admin/brand/del?id={{$v['brand_id']}}" class="btn bg-olive btn-xs">删除</a>
                                            <button class="btn btn-default" ng-click="goListPage()"><a href="create">添加品牌</a></button>
                                        </td>  
			                          </tr>
                                    @endforeach
			                      </tbody>
			                  </table>
			                  <!--数据列表/-->


                        </div>
                        <!-- 数据表格 /-->


                     </div>
                    <!-- /.box-body -->

</body>

</html>