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

<section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="box-header with-border">
                        <h3 class="box-title">商品类型管理</h3>
                    </div>

        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <!-- quick email widget -->
                <div class="box box-info">
                    <div class="box-body">
                    </div>
                    <div class="box-footer clearfix">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>商品ID</th>
                            <th>商品名称</th>
                            <th>商品价格</th>
                            <th>商品数量</th>
                            <th>所属分类</th>
                            <th>所属品牌</th>
                            <th>是否上架</th>
                            <th>是否热卖</th>
                            <th>商品图片</th>
                            <th>商品货号</th>
                            <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($goods as $k=>$v)
                            <tr>
                                <td>{{$v->goods_id}}</td>
                                <td>{{$v->goods_name}}</td>
                                <td>{{$v->goods_price}}</td>
                                <td>{{$v->num}}</td>
                                <td>{{$v->cate_name}}</td>
                                <td>{{$v->brand_name}}</td>
                                <td>@if($v->is_up == 0)
                                        上架
                                    @else
                                        下架
                                    @endif
                                </td>
                                <td>@if($v->is_hot == 0)
                                        热卖
                                    @else
                                        非热卖
                                    @endif
                                </td>
                                <td><img src="{{$v->goods_img}}" style="width:100px;height:80px;"></td>
                                <td>{{$v->goods_sn}}</td>
                                <td>
                                <a href="/admin/goods/del?id={{$v->goods_id}}"><button type="button" class="btn btn-danger">删除</button></a>
                                <a href="/admin/goods/edit?id={{$v->goods_id}}"><button type="button" class="btn btn-primary">修改</button></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </section>