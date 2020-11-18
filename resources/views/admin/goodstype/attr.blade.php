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
                        <h3 class="box-title">商品属性管理</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">

			                  <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
								<button class="btn btn-default"> <a href="/admin/goodsattr/create?id={{$id}}">属性添加</a></button>
			                      <thead>
			                          <tr>
			                              <th class="" style="padding-right:0px">
			                                  <input id="selall" type="checkbox" class="icheckbox_square-blue">
			                              </th>
										  <th class="sorting_asc">属性ID</th>
									      <th class="sorting">属性名称</th>
									      <th class="sorting">商品类型</th>
									      <th class="sorting">属性选择</th>
									      <th class="sorting">录入方式</th>
									      <th class="sorting">可选值列表</th>
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
                                      @foreach($res as $itme)
			                          <tr>
                                          <td><input  type="checkbox" class="che" value="{{$itme->attr_id}}"></td>
				                          <td>{{$itme->attr_id}}</td>
									      <td attr_name="{{$itme->attr_name}}" fined="attr_name" id="{{$itme->attr_id}}">
                                            <span class="span_name">{{$itme->attr_name}}</span>
                                          </td>
									      <td>{{$itme->cat_name}}</td>
									      <td>{{$itme->attr_type=="0" ? "属性" : "规格"}}</td>
									      <td>{{$itme->attr_input_type=="0" ? "手工录入" : "从下面的列表中选择(一行代表一个值)"}}</td>
									      <td>{{$itme->attr_values}}</td>
		                                  <td class="text-center">
		                                 	  <a href="/admin/goodsattr/upd?id={{$itme->attr_id}}" class="btn bg-olive btn-xs">修改</a>
		                                 	  <a href="/admin/goodsattr/del?id={{$itme->attr_id}}" class="btn bg-olive btn-xs">删除</a>
		                                   </td>
			                          </tr>
                                      @endforeach
                                      <tr><td colspan="7">{{$res->links()}}</td></tr>
			                      </tbody>
			                  </table>
			                  <!--数据列表/-->


                        </div>
                        <!-- 数据表格 /-->


                     </div>
                    <!-- /.box-body -->

</body>

</html>
