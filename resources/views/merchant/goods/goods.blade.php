<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="/merchant/css/css.css" />
<link rel="stylesheet" href="/admin/layui/css/layui.css"  media="all">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="text/javascript" src="/merchant/js/jquery.min.js"></script>	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页-有点</title>
</head>
@include("layout.merchant.head");
@include("layout.merchant.left");
<style type="text/css">
.option-card {
            width: 100%;
            display: block;
        }

        .option-card>ul {
            display: block;
            width: 100%;
            height: 50px;
            list-style: none;
            border-bottom: solid 1px #a0a0a0;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .option-card>ul>li {
            display: inline-block;
            margin: 0;
        }

        .option-card>ul>li>a {
            display: block;
            text-decoration: none;
            color: #000;
            text-align: center;
            width: 100px;
            border: solid 1px #a0a0a0;
            border-bottom: none;
            margin: 0;
            line-height: 50px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            background-color: bisque;
        }

        .active-card {
            background-color: #fff !important;
        }

        .sub-page {
            display: none;
        }

        .show-page {
            display: block !important;
        }
</style>
</head>
<body>
<!-- HTML页面布局 -->
    <div class="option-card">
        <ul>
            <li>
                <a href="#" class="active-card card" onclick="clickCard(this,'page1')">商品添加</a>
            </li>
            <li>
                <a href="#" class="card" onclick="clickCard(this,'page2')">商品详情</a>
            </li>
            <li>
                <a href="#" class="card" onclick="clickCard(this,'page3')">商品属性</a>
            </li>
            <li>
                <a href="#" class="card" onclick="clickCard(this,'page4')">商品图片</a>
            </li>
        </ul>
    </div>

        <div id="page1" class="sub-page show-page" align="center">
           	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>上传广告</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						链接名称：<input type="text" class="input1" />
					</div>
					<div class="bbD">
						链接地址：<input type="text" class="input1" />
					</div>
					<div class="bbD">
						上传图片：
						<div class="bbDd">
							<div class="bbDImg">+</div>
							<input type="file" class="file" /> <a class="bbDDel" href="#">删除</a>
						</div>
					</div>
					<div class="bbD">
						是否显示：<label><input type="radio" checked="checked" />是</label> <label><input
							type="radio" />否</label>
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：<input class="input2"
							type="text" />
					</div>
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" href="#">提交</button>
							<a class="btn_ok btn_no" href="#">取消</a>
						</p>
					</div>
				</div>
			</div>

			<!-- 上传广告页面样式end -->
		</div>
	</div>

        </div>
        <div id="page2" class="sub-page" align="center">
        <!-- 加载编辑器的容器 -->
        <textarea class="layui-textarea" id="LAY_demo1" style="display: none">  
        </textarea>         
        <!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
        </div>

        <div id="page3" class="sub-page" align="center">
        <div class="bbD" align="center">
        类型：<select class="input3"><option>1年以内</option></select>
        </div>
        </div>




        <div id="page4" class="sub-page" align="center">
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
              <legend>上传多张图片</legend>
            </fieldset>
            <div class="layui-upload">
              <button type="button" class="layui-btn" id="test2">多图片上传</button> 
              <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                预览图：
                <div class="layui-upload-list" id="demo2"></div>
             </blockquote>
            </div>
        </div>



<script src="/admin/layui/layui.js" charset="utf-8"></script>
<script>
layui.use('upload', function(){
  var $ = layui.jquery
  ,upload = layui.upload;
  upload.render({
    elem: '#test2'
    ,url: 'http://www.king.com/merchant/goods/upload' //改成您自己的上传接口
    ,multiple: true
    ,before: function(obj){
      //预读本地文件示例，不支持ie8
      obj.preview(function(index, file, result){
        $('#demo2').append('<img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img">')
      });
    }
    ,done: function(res){
      //上传完毕
    }
  });
  


  
});
</script>
<script>

    function clickCard(e, id) {
        var arr = document.getElementsByClassName("card");
        for (var i = 0; i < arr.length; i++) {
            arr[i].classList.remove("active-card");
        }
        e.classList.add("active-card");

        var arr = document.getElementsByClassName("sub-page");
        for (var i = 0; i < arr.length; i++) {
            arr[i].classList.remove("show-page");
        }
        document.getElementById(id).classList.add("show-page");
    }
</script>
<script>
layui.use('layedit', function(){
  var layedit = layui.layedit
  ,$ = layui.jquery;
  
  //构建一个默认的编辑器
  var index = layedit.build('LAY_demo1');
  
  //编辑器外部操作
  var active = {
    content: function(){
      alert(layedit.getContent(index)); //获取编辑器内容
    }
    ,text: function(){
      alert(layedit.getText(index)); //获取编辑器纯文本内容
    }
    ,selection: function(){
      alert(layedit.getSelection(index));
    }
  };
  
  $('.site-demo-layedit').on('click', function(){
    var type = $(this).data('type');
    active[type] ? active[type].call(this) : '';
  });
  
});
</script>
</html>