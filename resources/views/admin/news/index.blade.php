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
        <h3 class="box-title">管理员管理</h3>
    </div>

    <div class="box-body">

        <!-- 数据表格 -->
        <div class="table-box">

            <div class="box-tools pull-right">
                <div class="has-feedback">
                    <form action="/admin/news/index">
                        <input type="text" name="title" value="{{$key}}" placeholder="请输入要搜索的快报标题">
                        <button type="submit" class="btn btn-default" >查询</button>
                    </form>
                </div>
            </div>

            <!--数据列表-->
            <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                <tr>
                    <th class="sorting_asc">id</th>
                    <th class="sorting">快报标题</th>
                    <th class="sorting">快报类型</th>
                    <th class="sorting">内容</th>
                    <th class="sorting">添加时间</th>
                    <th class="text-center">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($daa as $data)
                    <tr>
                        <td>{{$data->n_id}}</td>
                        <td>{{$data->title}}</td>
                        <td>【@if($data->notice == 0) 公告 @elseif($data->notice == 1) 特惠 @else 热议  @endif】</td>
                        <td ><?php echo mb_substr($data->desc, 0, 50, 'utf-8'); ?></td>
                        <td>{{date("Y-m-d H:i:s",$data->add_time)}}</td>
                        <td class="text-center">
                            <a href="/admin/news/upd?id={{$data->n_id}}" class="btn bg-olive btn-xs">修改</a>
                            @if($data->is_del == 1) <a href="/admin/news/del?id={{$data->n_id}}" class="btn bg-olive btn-xs">隐藏</a> @else <a href="{{url('/admin/news/del/'.$data->n_id)}}" class="btn bg-olive btn-xs">恢复</a> @endif
                        </td>
                    </tr>
                @endforeach
                <tr><td colspan="6">{{ $daa->links() }}</td></tr>
                </tbody>
            </table>
            <!--数据列表/-->


        </div>
        <!-- 数据表格 /-->


    </div>
    <!-- /.box-body -->

    </body>

    </html>



