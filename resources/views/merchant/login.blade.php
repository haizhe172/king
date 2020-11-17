<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录-有点</title>
<link rel="stylesheet" type="text/css" href="/merchant/css/public.css" />
<link rel="stylesheet" type="text/css" href="/merchant/css/page.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/public.js"></script>
</head>
<body>
	<!-- 登录页面头部 -->
	<div class="logHead">
		<img src="img/logLOGO.png" />
	</div>
	<!-- 登录页面头部结束 -->
	<!-- 登录body -->
	<div class="logDiv">
		<img class="logBanner" src="img/logBanner.png" />
		<div class="logGet">
			<!-- 头部提示信息 -->
			<div class="logD logDtip">
				<p class="p1">登录</p>
				<p class="p2">有点人员登录</p>
			</div>
			<!-- 输入框 -->
			<div class="lgD">
				<img class="img1" src="img/logName.png" /><input type="text"
					placeholder="输入用户名" name="merchant_user" />
			</div>
			<div class="lgD">
				<img class="img1" src="img/logPwd.png" /><input type="text"
					placeholder="输入用户密码" name="merchant_pwd" />
			</div>
<!-- 		<div class="lgD logD2">
				<input class="getYZM" type="text" />
				<div class="logYZM">
					<img class="yzm" src="img/logYZM.png" />
				</div>
			</div> -->
			<div class="logC">
				<button name="but">登 录</button>
			</div>
		</div>
	</div>
	<!-- 登录body  end -->

	<!-- 登录页面底部 -->
	<div class="logFoot">
		<p class="p1">版权所有：南京设易网络科技有限公司</p>
		<p class="p2">南京设易网络科技有限公司 登记序号：苏ICP备11003578号-2</p>
	</div>
	<!-- 登录页面底部end -->
</body>
</html>
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
<script>
	$(function(){
		$("button[name='but']").click(function(){
			var data = {};
			var merchant_user = $("input[name='merchant_user']").val();
			var merchant_pwd  = $("input[name='merchant_pwd']").val();
			data.merchant_user = merchant_user;
			data.merchant_pwd = merchant_pwd;
			$.ajax({
				url: '/merchant/dologin',
				type: 'get',
				dataType: 'json',
				data:data,
				success:function(msg){
					if(msg.code == 100){
						location.href="/merchant";
					}else{
						alert(msg.msg)
					}
				}
			})			

		});
	});
</script>
