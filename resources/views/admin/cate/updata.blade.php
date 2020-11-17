@extends('layout.admin.layout')
@section('title',"运维")
@section('content')




    <head>
        <!-- 页面meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>商品编辑</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">

        <link rel="stylesheet" href="/plugins/bootstrap//css/bootstrap.min.css">
        <link rel="stylesheet" href="/plugins/adminLTE//css/AdminLTE.css">
        <link rel="stylesheet" href="/plugins/adminLTE//css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="/css/style.css">
        <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- 富文本编辑器 -->
        <link rel="stylesheet" href="/plugins/kindeditor/themes/default/default.css" />
        <script charset="utf-8" src="/plugins/kindeditor/kindeditor-min.js"></script>
        <script charset="utf-8" src="/plugins/kindeditor/lang/zh_CN.js"></script>
        <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.js"></script>




    </head>

    <body class="hold-transition skin-red sidebar-mini" >

    <!-- 正文区域 -->
    <section class="content">
        {{--<form action="" method="post">--}}
        {{--@csrf--}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

    <!--tab页-->
        <div class="nav-tabs-custom">

            <!--tab头-->
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#home" data-toggle="tab">分类基本信息</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">
                <input type="hidden" name="cate_id" value="{{$first->cate_id}}">
                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                        <div class="col-md-2 title">分类名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" name="cate_name" id="cate_name"   placeholder="分类名称" value="{{$first->cate_name}}">
                        </div>
                        <b><span id="span_name" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>
                    </div>
                    <div class="row data-type">
                        <div class="col-md-2 title">父级分类</div>
                        <div class="col-md-10 data">
                            <select class="form-control" name="p_id">
                                <option value="0">--顶级分类--</option>
                                <option value="{{$first['pid']}}" selected>{{$pname['cate_name']}}</option>
                                @foreach ($cate as $v)
                                    {{--@if($first['cate_id'] == $v['cate_id'])--}}

                                    {{--@endif--}}
                                        <option value="{{$v['cate_id']}}">{{str_repeat('——',$v['level'])}}{{$v['cate_name']}}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row data-type">
                        <div class="col-md-2 title">是否显示</div>
                        <div class="col-md-10 data">
                            @if($first['cate_show'] == 1)
                                <input type="radio" name="cate_show" value="1" checked>是
                                <input type="radio" name="cate_show" value="0">否
                            @elseif($first['cate_show'] == 0)
                                <input type="radio" name="cate_show" value="1">是
                                <input type="radio" name="cate_show" value="0" checked>否
                            @endif
                        </div>
                    </div>

                    <div class="row data-type">
                        <div class="col-md-2 title">导航栏显示</div>
                        <div class="col-md-10 data">
                            @if($first['cate_nav_show'] == 1)
                                <input type="radio" name="cate_nav_show" value="1" checked>是
                                <input type="radio" name="cate_nav_show" value="0">否
                            @elseif($first['cate_nav_show'] == 0)
                                <input type="radio" name="cate_nav_show" value="1">是
                                <input type="radio" name="cate_nav_show" value="0" checked>否
                            @endif
                        </div>
                    </div>
                </div>


            </div>
            <div class="btn-toolbar list-toolbar">
                <button type="button" class="btn btn-primary" id="but" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>修改</button>
            </div>
        </div>
        </form>

    </section>


    <!-- 正文区域 /-->


    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#but").click(function () {
                // alert(111);
                var cate_id=$("input[name='cate_id']").val();
                var cate_name=$("#cate_name").val();
                var p_id=$("select[name='p_id']").val();
                var cate_show=$("input[name='cate_show']:checked").val();
                var cate_nav_show=$("input[name='cate_nav_show']:checked").val();
                if(cate_name ==''){
                    alert('分类名不能为空');
                    // cate_name.after("<b style='color: red'>分类名不能为空</b>");
                    return false;
                }
                console.log(cate_id);
                console.log(cate_name);
                console.log(p_id);
                console.log(cate_show);
                console.log(cate_nav_show);
                $.ajax({
                    url:'/admin/cate/upda/do',
                    method:'post',
                    async:false,
                    data:{cate_id:cate_id,cate_name:cate_name,pid:p_id,cate_show:cate_show,cate_nav_show:cate_nav_show}
                }).done(function (msg) {
                    if(msg.code ==200){
                        alert(msg.message);
                        location.href='/admin/cate/index';
                    }else{
                        alert(msg.message);
                    }
                })
            })

        })

    </script>
@endsection