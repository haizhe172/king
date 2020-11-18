@extends('layout.admin.layout')
@section('title',"运维")
@section('content')




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
        <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.js"></script>
        <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">


        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style type="text/css">
            .jq22-header{margin-bottom: 15px;font-family: "Segoe UI", "Lucida Grande", Helvetica, Arial, "Microsoft YaHei", FreeSans, Arimo, "Droid Sans", "wenquanyi micro hei", "Hiragino Sans GB", "Hiragino Sans GB W3", "FontAwesome", sans-serif;}
            .jq22-icon{color: #fff;}
        </style>
        <script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>

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
                {{--<div class="has-feedback">--}}
                    {{--<form action="/admin/news/index">--}}
                        {{--<input type="text" name="title" value="{{$key}}" placeholder="请输入要搜索的快报标题">--}}
                        {{--<button type="submit" class="btn btn-default" >查询</button>--}}
                    {{--</form>--}}
                {{--</div>--}}
            </div>

            <!--数据列表-->
            <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                {{--<tr>--}}
                    {{--<th class="sorting_asc">排序</th>--}}
                    {{--<th class="sorting">分类名称</th>--}}
                    {{--<th class="sorting">是否显示</th>--}}
                    {{--<th class="sorting">是否在导航栏展示</th>--}}
                    {{--<th class="text-center">操作</th>--}}
                {{--</tr>--}}
                <tr>

                    <th>分类id</th>
                    <th>分类名称</th>
                    <th>父级分类名称</th>
                    <th>是否展示</th>
                    <th>是否在导航栏展示</th>
                    <th>操作</th>
                </tr>

                </thead>
                <tbody>

                @foreach($data as $k=>$v)
                    <tr style="display:none;" pid="{{$v->pid}}" cate_id="{{$v->cate_id}}">
                        <td>  <a href="javascript:;" class='showHide' style="color:red;text-decoration:none;">+</a>    {{$k+1}} </td>
                        <td>  {{str_repeat('|——',$v->level)}}{{$v->cate_name}}     </td>
                        <td> @if($v->pid ==0) 顶级分类 @else 子分类 @endif</td>
                        <td field="cate_show" class="changeValue" value="{{$v->cate_show}}">   @if($v->cate_show == 1) 显示√ @else 隐藏× @endif   </td>
                        <td field="cate_nav_show" class="changeValue" value="{{$v->cate_nav_show}}">    @if($v->cate_nav_show == 1) 显示√ @else 隐藏× @endif  </td>
                        <td>
                            <a href="{{url('/admin/cate/del/'.$v->cate_id)}}" class="btn bg-olive btn-xs">分类状态</a>
                            <a href="{{url('/admin/cate/del/'.$v->cate_id)}}" class="btn bg-olive btn-xs">修改</a>
                        </td>
            </tr>
            @endforeach
                {{--@foreach($data as $k=>$cate)--}}
                    {{--<tr>--}}
                        {{--<td a="{{$cate['cate_id']}}"><b class="cate">+</b>{{$k+1}}</td>--}}
                        {{--<td>{{$cate['cate_name']}}</td>--}}
                        {{--<td>@if($cate['cate_show']  == 1) 展示 @else 隐藏 @endif</td>--}}
                        {{--<td>@if($cate['cate_nav_show']  == 1) 展示 @else 隐藏 @endif</td>--}}
                        {{--<td>--}}
                            {{--<a href="" class="btn bg-olive btn-xs">修改</a>--}}
                            {{--<a href="{{url('/admin/cate/del/'.$cate['cate_id'])}}" class="btn bg-olive btn-xs">分类状态</a>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}




                {{--<input type="hidden" id="data" value="{{$data}}">--}}



                <div class="row">
                    <div class="col-sm-12">

                        <div id="treeview1" class=""></div>
                    </div>

                </div>

                {{--<script src="/admin/plugins/treeview/bootstrap-treeview.js"></script>--}}
                {{--<script type="text/javascript">--}}

                    {{--$(function() {--}}
                        {{--var data=$("#data").val();--}}
                        {{--console.log(data);--}}


                        {{--var defaultData =[--}}
                            {{--// $.each(data,function (i,val) {--}}
                                    {{--{--}}
                                        {{--text: 'val.cate_name',--}}
                                        {{--name:'efaefef',--}}
                                        {{--href: '#parent1',--}}
                                        {{--tags: ['4'],--}}
                                        {{--nodes: [--}}
                                            {{--{--}}
                                                {{--text: 'Child 1',--}}
                                                {{--href: '#child1',--}}
                                                {{--tags: ['2'],--}}
                                                {{--nodes: [--}}
                                                    {{--{--}}
                                                        {{--text: 'Grandchild 1',--}}
                                                        {{--href: '#grandchild1',--}}
                                                        {{--tags: ['0']--}}
                                                    {{--}--}}

                                                {{--]--}}
                                            {{--}--}}

                                        {{--]--}}
                                    {{--}--}}

                        {{--// });--}}
                    {{--];--}}

                            {{--// {--}}
                            {{--//     text: 'Parent 2',--}}
                            {{--//     href: '#parent2',--}}
                            {{--//     tags: ['0']--}}
                            {{--// },--}}
                            {{--// {--}}
                            {{--//     text: 'Parent 3',--}}
                            {{--//     href: '#parent3',--}}
                            {{--//     tags: ['0']--}}
                            {{--// },--}}
                            {{--// {--}}
                            {{--//     text: 'Parent 4',--}}
                            {{--//     href: '#parent4',--}}
                            {{--//     tags: ['0']--}}
                            {{--// },--}}
                            {{--// {--}}
                            {{--//     text: 'Parent 5',--}}
                            {{--//     href: '#parent5'  ,--}}
                            {{--//     tags: ['0']--}}
                            {{--// }--}}


                        {{--var alternateData = [--}}
                            {{--{--}}
                                {{--text: 'Parent 1',--}}
                                {{--tags: ['2'],--}}
                                {{--nodes: [--}}
                                    {{--{--}}
                                        {{--text: 'Child 1',--}}
                                        {{--tags: ['3'],--}}
                                        {{--nodes: [--}}
                                            {{--{--}}
                                                {{--text: 'Grandchild 1',--}}
                                                {{--tags: ['6']--}}
                                            {{--},--}}
                                            {{--{--}}
                                                {{--text: 'Grandchild 2',--}}
                                                {{--tags: ['3']--}}
                                            {{--}--}}
                                        {{--]--}}
                                    {{--},--}}
                                    {{--{--}}
                                        {{--text: 'Child 2',--}}
                                        {{--tags: ['3']--}}
                                    {{--}--}}
                                {{--]--}}
                            {{--},--}}
                            {{--{--}}
                                {{--text: 'Parent 2',--}}
                                {{--tags: ['7']--}}
                            {{--},--}}
                            {{--{--}}
                                {{--text: 'Parent 3',--}}
                                {{--icon: 'glyphicon glyphicon-earphone',--}}
                                {{--href: '#demo',--}}
                                {{--tags: ['11']--}}
                            {{--},--}}
                            {{--{--}}
                                {{--text: 'Parent 4',--}}
                                {{--icon: 'glyphicon glyphicon-cloud-download',--}}
                                {{--href: '/demo.html',--}}
                                {{--tags: ['19'],--}}
                                {{--selected: true--}}
                            {{--},--}}
                            {{--{--}}
                                {{--text: 'Parent 5',--}}
                                {{--icon: 'glyphicon glyphicon-certificate',--}}
                                {{--color: 'pink',--}}
                                {{--backColor: 'red',--}}
                                {{--href: 'http://www.tesco.com',--}}
                                {{--tags: ['available','0']--}}
                            {{--}--}}
                        {{--];--}}

                        {{--var json = '[' +--}}
                            {{--'{' +--}}
                            {{--'"text": "Parent 1",' +--}}
                            {{--'"nodes": [' +--}}
                            {{--'{' +--}}
                            {{--'"text": "Child 1",' +--}}
                            {{--'"nodes": [' +--}}
                            {{--'{' +--}}
                            {{--'"text": "Grandchild 1"' +--}}
                            {{--'},' +--}}
                            {{--'{' +--}}
                            {{--'"text": "Grandchild 2"' +--}}
                            {{--'}' +--}}
                            {{--']' +--}}
                            {{--'},' +--}}
                            {{--'{' +--}}
                            {{--'"text": "Child 2"' +--}}
                            {{--'}' +--}}
                            {{--']' +--}}
                            {{--'},' +--}}
                            {{--'{' +--}}
                            {{--'"text": "Parent 2"' +--}}
                            {{--'},' +--}}
                            {{--'{' +--}}
                            {{--'"text": "Parent 3"' +--}}
                            {{--'},' +--}}
                            {{--'{' +--}}
                            {{--'"text": "Parent 4"' +--}}
                            {{--'},' +--}}
                            {{--'{' +--}}
                            {{--'"text": "Parent 5"' +--}}
                            {{--'}' +--}}
                            {{--']';--}}


                        {{--$('#treeview1').treeview({--}}
                            {{--data: defaultData--}}
                        {{--});--}}
                    {{--});--}}
                {{--</script>--}}


                {{--<ul id="browser" class="filetree treeview-famfamfam">--}}
                    {{--@foreach($data as $k=>$cate)--}}
                        {{--@if(count($cate['son']))--}}
                            {{--<li><span class="folder"> {{$cate['cate_name']}} 操作：<a href="" class="btn bg-olive btn-xs">修改</a>--}}
                                    {{--<a href="{{url('/admin/cate/del/'.$cate['cate_id'])}}" class="btn bg-olive btn-xs">分类状态</a></span>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                        {{--<ul>--}}
                            {{--@foreach($cate['son'] as $k=>$val)--}}


                                {{--@if(count($val['son']))--}}
                                    {{--<li><span class="folder">{{$val['cate_name']}}  分类是否展示：@if($val['cate_show']  == 1) 展示 @else 隐藏 @endif 导航栏展示： @if($val['cate_nav_show']  == 1) 展示 @else 隐藏 @endif   操作：<a href="" class="btn bg-olive btn-xs">修改</a>--}}
                                {{--<a href="{{url('/admin/cate/del/'.$val['cate_id'])}}" class="btn bg-olive btn-xs">分类状态</a></span>--}}
                                    {{--</li>--}}
                                    {{--@foreach($val['son'] as $k=>$data)--}}
                                        {{--<li><span class="file">{{$data['cate_name']}} 分类是否展示：@if($data['cate_show']  == 1) 展示 @else 隐藏 @endif  导航栏展示：@if($data['cate_nav_show']  == 1) 展示 @else 隐藏 @endif  操作：<a href="" class="btn bg-olive btn-xs">修改</a>--}}
                                {{--<a href="{{url('/admin/cate/del/'.$data['cate_id'])}}" class="btn bg-olive btn-xs">分类状态</a></span></li>--}}

                                    {{--@endforeach--}}

                                {{--@else--}}
                                    {{--<li><span class="file">{{$val['cate_name']}}  分类是否展示：@if($val['cate_show']  == 1) 展示 @else 隐藏 @endif 导航栏展示： @if($val['cate_nav_show']  == 1) 展示 @else 隐藏 @endif   操作：<a href="" class="btn bg-olive btn-xs">修改</a>--}}
                                {{--<a href="{{url('/admin/cate/del/'.$val['cate_id'])}}" class="btn bg-olive btn-xs">分类状态</a></span>--}}
                                    {{--</li>--}}
                                {{--@endif--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}







                {{--<tr><td colspan="6">{{ $daa->links() }}</td></tr>--}}
                </tbody>
            </table>
            <!--数据列表/-->


        </div>
        <!-- 数据表格 /-->


    </div>
    <!-- /.box-body -->

    </body>

    </html>
    {{--<script type="text/javascript">--}}
        {{--$(document).ready(function(){--}}
            {{--$("#browser").treeview({--}}
                {{--toggle: function() {--}}
                    {{--console.log("%s was toggled.", $(this).find(">span").text());--}}
                {{--}--}}
            {{--});--}}

            {{--$("#add").click(function() {--}}
                {{--var branches = $("<li><span class='folder'>New Sublist</span><ul>" +--}}
                    {{--"<li><span class='file'>Item1</span></li>" +--}}
                    {{--"<li><span class='file'>Item2</span></li></ul></li>").appendTo("#browser");--}}
                {{--$("#browser").treeview({--}}
                    {{--add: branches--}}
                {{--});--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            {{--$('.cate').click(function () {--}}
                {{--var cate_id=$(this).parent().attr("a");--}}
                {{--// console.log(cate_id);--}}
                {{--$.ajax({--}}
                    {{--url:'/admin/cate/cateindex',--}}
                    {{--method:'post',--}}
                    {{--async:false,--}}
                    {{--data:{cate_id:cate_id}--}}
                {{--}).done(function (msg) {--}}
                    {{--console.log(msg);--}}


                    {{--$.each(msg,function (i,val) {--}}
                        {{--// alert(val);--}}
                        {{--$(this).parents("tr").after("<tr><td a='+val.cate_id+'><b class='cate'>+</b></td><td>"+val.cate_name+"</td><td>@if("+val.cate_show ==1+") 展示 @else 隐藏 @endif</td><td>@if("+val.cate_nav_show ==1+") 展示 @else 隐藏 @endif</td><td><a class='btn bg-olive btn-xs'>修改</a><a href='{{url('/admin/cate/del/'."+val.cate_id+")}}' class='btn bg-olive btn-xs'>分类状态</a></td></tr>");--}}
                    {{--})--}}
                {{--})--}}
            {{--})--}}
            $("tr[pid='0']").show();

// 给+绑定点击事件
            $('.showHide').click(function(){
                // 获取点击+的这个对象
                var _this=$(this);
                // console.log(_this);
                // 获取纯文本
                var sign=_this.text();
                // console.log(sign);
                var cate_id=_this.parents("tr").attr('cate_id');
                // console.log('cate_id');
                if(sign=='+'){
                    var child=$("tr[pid='"+cate_id+"']");
                    // console.log(child.length);
                    if(child.length>0){
                        child.show();
                        _this.text("-");
                    }
                    // _this.text("-");
                }else{
                    $("tr[pid='"+cate_id+"']").hide();
                    _this.text("+");
                }
            })
        })
    </script>




@endsection