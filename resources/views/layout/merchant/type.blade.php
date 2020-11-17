<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>广告-有点</title>
<link rel="stylesheet" type="text/css" href="/merchant/css/css.css" />
<script type="text/javascript" src="/merchant/js/jquery.min.js"></script>
</head>
<body>
    <div id="pageAll">
        <div class="pageTop">
            <div class="page">
                <img src="/merchant/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                    href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
            </div>
        </div>
        <div class="page ">
            <!-- 上传广告页面样式 -->
            <div class="banneradd bor">
                <div class="baTop">
                    <span>商品添加</span>
                </div>
                <div class="baBody">
                    <div class="bbD">
                        商品名字：<input type="text" class="input1" />
                    </div>
                    <div class="bbD">
                        商品价格：<input type="text" class="input1" />
                    </div>
                    <div class="bbD">
                        商品图片：
                        <div class="bbDd">
                            <div class="bbDImg">+</div>
                            <input type="file" class="file" /> <a class="bbDDel" href="#">删除</a>
                        </div>
                    </div>
                    <div class="bbD">
                    品牌：<select class="input3"><option></option></select>
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
        </div>
    </div>
    <!-- 删除弹出框 -->
    <div class="banDel">
        <div class="delete">
            <div class="close">
                <a><img src="/merchant/img/shanchu.png" /></a>
            </div>
            <p class="delP1">你确定要删除此条记录吗？</p>
            <p class="delP2">
                <a href="#" class="ok yes" onclick="del()">确定</a><a class="ok no">取消</a>
            </p>
        </div>
    </div>
    <!-- 删除弹出框  end-->
</body>

<script type="text/javascript">
// 广告弹出框
$(".delban").click(function(){
  $(".banDel").show();
});
$(".close").click(function(){
  $(".banDel").hide();
});
$(".no").click(function(){
  $(".banDel").hide();
});
// 广告弹出框 end

function del(){
    var input=document.getElementsByName("check[]");
    for(var i=input.length-1; i>=0;i--){
       if(input[i].checked==true){
           //获取td节点
           var td=input[i].parentNode;
          //获取tr节点
          var tr=td.parentNode;
          //获取table
          var table=tr.parentNode;
          //移除子节点
          table.removeChild(tr);
        }
    }     
}
</script>
</html>



