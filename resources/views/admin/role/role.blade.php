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
                            <div class="tab-pane active" id="home">
                                <div class="row data-type">

		                           <div class="col-md-2 title">管理员名称</div>
		                           <div class="col-md-10 data">
		                               <input type="text" class="form-control" name="admin_id" id="admin_id" admin_id="{{$admin_id}}"   placeholder="管理员名称" disabled value="{{$admin_name}}">
		                           </div>
                                       <b><span id="span_name" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>
                                </div>
                                
                                <div class="row data-type">

		                           <div class="col-md-2 title">角色</div>
		                           <div class="col-md-10 data">
		                               @foreach($role as $v)
                                       <input type="checkbox" name="role_id" value="{{$v->role_id}}" @if(in_array($v->role_id,$role_id)) checked @endif>{{$v->role_name}}
                                       @endforeach
		                           </div>
                                </div>
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
    $(document).on("click","#but",function(){
        var admin_id = $("#admin_id").attr("admin_id");
        var box = $("input[name='role_id']:checked");
        if(box.lenght<0){
            alert("请选择一个角色");
            return false;
        }
        var role_id='';
        box.each(function(){
            role_id+=$(this).val()+',';
        })
        role_id=role_id.substr(0,role_id.length-1);
        // console.log(role_id);
        $.get("/admin/role/roleDo",{admin_id:admin_id,role_id:role_id},function(res){
            // console.log(res);
            if(res["status"]=="false"){
                alert(res["msg"]);
                return false;
            }else{
                alert(res["msg"]);
                location.href="/admin/admin/index"
            }
        })
    })
})
</script>