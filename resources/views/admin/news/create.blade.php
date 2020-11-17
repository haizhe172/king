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
        {{--<form action="{{url('/admin/news/create/do')}}" method="post">--}}


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif



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
                                <div class="col-md-2 title">快报标题</div>
                                <div class="col-md-5 data">
                                    <input type="text" class="form-control"  name="title"  placeholder="请填写快报标题" value="">
                                </div>
                            </div>

                            <div class="row data-type">
                                <div class="col-md-2 title" style="height:70px;">内容</div>
                                <div class="col-md-5 data" style="height:70px;">
                                    <textarea type="text" class="form-control"  name="desc"  placeholder="请输入内容" value=""></textarea>
                                </div>
                            </div>

                            <div class="row data-type">
                                <div class="col-md-2 title">分类：</div>
                                <div class="col-md-10 data">
                                    <select id="notice" class="form-control" name="notice">
                                        <option value="0">公告</option>
                                        <option value="1">特惠</option>
                                        <option value="2">热议</option>
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
                <button id="add" class="btn btn-primary" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>添加</button>
                <button id="index" class="btn btn-default" ng-click="goListPage()"><a href="{{url('/admin/news/index')}}">返回列表</a></button>
            </div>
        {{--</form>--}}

    </section>
    {{--<script type="text/javascript">--}}
        {{--var editor;--}}
        {{--KindEditor.ready(function(K) {--}}
            {{--editor = K.create('textarea[name="content"]', {--}}
                {{--allowFileManager : true--}}
            {{--});--}}
        {{--});--}}
        {{--$(function(){--}}
            {{--$("#submit").click(function(){--}}
                {{--var  title=$("input[name='title']").val();--}}
                {{--console.log(title);--}}
                {{--return false;--}}
            {{--});--}}
        {{--});--}}

    {{--</script>--}}

    </body>

    </html>
    <script>
        $(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

                $("input[name='title']").blur(function(){
                    $(this).next().remove();
                    var title=$(this).val();
                    if (title == ''){
                        alert("请填写快报标题名称");
                        // $(this).after("");
                        return false;
                    }
                })

            $("textarea[name='desc']").blur(function(){
                // $(this).next().remove();
                var desc=$(this).val();
                // alert(desc);
                    if (desc == ''){
                    alert("请填写快报内容");
                    // $(this).after("");
                    return false;
                }
            })
                $("#add").click(function(){
                    // alert(1);
                   var title=$("input[name='title']").val();
                   var desc=$("textarea[name='desc']").val();
                   var notice=$("#notice option:selected").val();
                   // console.log(notice);
                    if (title == ''){
                        alert("请填写快报标题名称");
                        return false;
                    }
                    if (desc == ''){
                        alert("请填写快报内容");
                        return false;
                    }
                    $.ajax({
                        url:'/admin/news/create/do',
                        method:'post',
                        async:false,
                        data:{title:title,desc:desc,notice:notice}
                    }).done(function(msg){
                        // alert(msg);
                        console.log(msg);
                        if(msg.code == 200){
                            alert(msg.message);
                            location.href='/admin/news/index';
                        }else{
                            alert(msg.message);
                            return false;
                        }
                    });
                   // return false;
                });


        });
    </script>


