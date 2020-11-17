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
<section class="content">
        <!-- Small boxes (Stat box) -->
        <!--tab头-->
        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#home" data-toggle="tab">商品类型信息</a>
                            </li>
                        </ul>
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
                        <form class="form-horizontal" role="form"  action="{{url('/admin/goodsattr/store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">属性名称</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="attr_name" 
                                placeholder="请输入属性名称">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">商品类型</label>
                            <div class="col-sm-10">
                            <select type="text" class="form-control" name="type_id">
                            @foreach($res as $k=>$v)
                            <option value="{{$v->type_id}}" @if($id == $v->type_id) selected @endif>{{$v->cat_name}}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">属性选择</label>
                            <div class="col-sm-10">
                            <input type="radio" name="attr_type" value="0" checked>属性
                            <input type="radio" name="attr_type" value="1">规格
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">录入方式</label>
                            <div class="col-sm-10">
                            <input type="radio" name="attr_input_type" value="0" checked>手工录入
                            <input type="radio" name="attr_input_type" value="1">从下面的列表中选择(一行代表一个值)
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">可选值列表</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" rows="3" name="attr_values" disabled="disabled"></textarea>
                            </div>
                        </div>
                         <button type="submit" class="pull-right btn btn-default">
                             添加 <i class="fa fa-arrow-circle-right"></i>
                         </button>
                        </form>
                    </div>
                </div>
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
    <script src="/admin/js/jquery.js"></script>
    <script>
        $(document).on('click','input[name="attr_input_type"]',function(){
            var radio=$('input[name="attr_input_type"]:checked').val();
            if(radio == 1){
                $('textarea').removeClass('disabled="disabled"');
                $('textarea').removeAttr('disabled');
            }else{
                $('textarea').addClass(' disabled="disabled"');
                $('textarea').attr('disabled','disabled');
            }
        })
    </script>