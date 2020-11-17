<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
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

            <!-- 正文区域 -->
            <section class="content">
                <form action="" method="post">
                @csrf
                <div class="box-body">

                    <!--tab页-->
                    <div class="nav-tabs-custom">

                        <!--tab头-->
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#home" data-toggle="tab">赋角色</a>
                            </li>
                        </ul>
                        <!--tab头/-->

                        <!--tab内容-->
                        <div class="tab-content">

                            <!--表单内容-->
                            <div class="tab-pane active" id="home" count="{{count($menu)}}">
		                               <input type="hidden" class="form-control" name="role_id" id="role_id" role_id="{{$role_id}}"   placeholder="权限名称" disabled value="{{$role_id}}">
		                           
                                <tr>
                                <td><input type="checkbox" id="boxall"></td>
                                <td>全选</td>
                                </tr>
                                @foreach($menu as $v)
                                <div>
                                <tr>
                                    <td><input type="checkbox" class="priv_{{$v->menu_id}} check" p_id="{{$v->p_id}}" name="menu_id"  value="{{$v->menu_id}}" @if(in_array($v->menu_id,$menu_id)) checked @endif></td>
                                    <td>{{str_repeat("|——",$v->level)}}{{$v->menu_name}}</td>
                                </tr>
                                </div>
                                @endforeach
                            </div>


                   </div>
                  <div class="btn-toolbar list-toolbar">
				      <button type="button" class="btn btn-primary" id="but" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>赋权限</button>
				  </div>
                  </form>

            </section>
<script src="/admin/js/jquery.js"></script>
<script>
$(function(){
        var box = $(".check:checked").length;
        var count = $("#home").attr("count");
        if(box==count){
            $("#boxall").prop("checked",true);
        }else{
            $("#boxall").prop("checked",false);
        }
    //全选
    $(document).on("click","#boxall",function(){
        var checkbox = $(this).prop("checked");
                if(checkbox==true){
                    $(".check").prop("checked",true);
                }else{
                    $(".check").prop("checked",false);
        }

    })
    $(document).on("click",".check",function(){
        var val = $(this).val();
        var checkedval = $(this).prop("checked");
        $("input[p_id='"+val+"']").prop("checked",checkedval);

        var p_id = $(this).attr("p_id");
        // alert(p_id);
        var ass = $("input[class='priv_"+p_id+"']").prop("checked",checkedval);
        var box = $(".check:checked").length;
        var count = $("#home").attr("count");
        if(box==count){
            $("#boxall").prop("checked",true);
        }else{
            $("#boxall").prop("checked",false);
        }
    })
    $(document).on("click","#but",function(){
        var role_id = $("#role_id").attr("role_id");
        var box = $("input[name='menu_id']:checked");
        if(box.lenght<0){
            alert("请选择一个角色");
            return false;
        }
        var menu_id='';
        box.each(function(){
            menu_id+=$(this).val()+',';
        })
        menu_id=menu_id.substr(0,menu_id.length-1);
        $.get("/admin/menu/menuDo",{role_id:role_id,menu_id:menu_id},function(res){
            // console.log(res);
            if(res["status"]=="false"){
                alert(res["msg"]);
                return false;
            }else{
                alert(res["msg"]);
                location.href="/admin/role/index"
            }
        })
    })
})
</script>
