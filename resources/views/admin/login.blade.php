<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台登录</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<style>
body{height:100%;background:#16a085;overflow:hidden;}
canvas{z-index:-1;position:absolute;}
</style>
<script src="js/jquery.js"></script>
<script src="js/verificationNumbers.js"></script>
<script src="js/Particleground.js"></script>
<script>
$(document).ready(function() {
  //粒子背景特效
  $('body').particleground({
    dotColor: '#5cbdaa',
    lineColor: '#5cbdaa'
  });
  //验证码
  createCode();
  //测试提交，对接程序删除即可
  $(".submit_btn").click(function(){
	  location.href="index.html";
	  });
});
</script>
</head>
<body>
<dl class="admin_login">
 <dt>
  <strong>站点后台管理系统</strong>
  <em>Management System</em>
 </dt>
 <dd class="user_icon">
  <input type="text" placeholder="账号" class="login_txtbx" id="admin_name"/>
 </dd>
 <dd class="pwd_icon">
  <input type="password" placeholder="密码" class="login_txtbx" id="admin_pwd"/>
 </dd>
 <dd>
  <input type="button" value="立即登陆" id="but" class="submit_btn"/>
 </dd>
 <dd>
  <p>© 2015-2016 DeathGhost 版权所有</p>
  <p>陕B2-20080224-1</p>
 </dd>
</dl>
</body>
</html>
<script src="/admin/js/jquery.js"></script>
<script>
$(function(){
    $(document).on("click","#but",function(){
        var admin_name = $("#admin_name").val();
        var admin_pwd = $("#admin_pwd").val();
        $.get("/admin/loginis",{admin_name:admin_name,admin_pwd:admin_pwd},function(res){
            // console.log(res);
            if(res["status"]=="true"){
                // alert(123);
                location.href="/admin"
            }else{
                alert(res["msg"]);
            }
        })
    })
})
</script>
