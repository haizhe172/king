<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <link rel="stylesheet" href="/index/css/index.css">
    <script type="text/javascript" src="/index/js/jquery.min.js"></script>
    <!--轮播图js-->
    <script type="text/javascript" src="/index/js/script.js"></script>
    <!--轮播图js end-->
</head>
<body>

<!--header-->
@include("layout.index.head");
<!--hearder end!-->

<!--main-->
<div class="main-box">
    <div class="main">
        <!--main left-->
<div class="main-left">
    <!--左侧菜单-->
@include("layout.index.left")
</div>
<!--main left-->
        <div class="main-center">
<!--轮播图-->
            <div id="flash">
                <div id="prev"><img src="/index/images/prev.png"  width="40" height="40" alt=""></div>
                <div id="next"><img src="/index/images/next.png"  width="40" height="40" alt=""></div>
                <ul id="play">
                    <li style="display: block;"><img src="/index/images/banner1.png" alt="" width="900" height="400" /></li>
                    <li><img src="/index/images/banner2.png" alt=""  width="900" height="400"/></li>
                    <li><img src="/index/images/banner1.png" alt=""  width="900" height="400"/></li>
                    <li><img src="/index/images/banner2.png" alt=""  width="900" height="400"/></li>
                    <li><img src="/index/images/banner1.png" alt=""  width="900" height="400"/></li>
                    <li><img src="/index/images/banner2.png" alt=""  width="900" height="400"/></li>
                    </ul>
                    <ul id="button">
                       <li><div style="background: #A10000;">1</div></li>
                        <li><div>2</div></li>
                        <li><div>3</div></li>
                        <li><div>4</div></li>
                        <li><div>5</div></li>
                        <li><div>6</div></li>
                    </ul>
            </div>
            <!--轮播图end-->
            <div class="main-bottom">
<ul>
    <li><a href=""><img src="/index/images/1.jpg" title="健康防护"></a></li>
    <li><a href=""><img src="/index/images/2.jpg" title="趣味家居"></a></li>
    <li><a href=""><img src="/index/images/3.jpg" title="美味生活"></a></li>

</ul>

            </div>
            <div class="main-bottom-case">
                <ul>
                    <li><a href=""><img src="/index/images/pinpai.png" alt=""></a></li>
                    <li><a href=""><img src="/index/images/vi.png" alt=""></a></li>
                    <li><a href=""><img src="/index/images/dingzhi.jpg" alt=""></a></li>
                    <li><a href=""><img src="/index/images/kucun.png" alt=""></a></li>
                </ul>
            </div>

        </div>

        <div class="login-box">
 <div class="login-title">
<span class="log-img"><img src="/index/images/log.png" width="50" height="50" alt=""></span>
     <span class="log-text">
<ul>
    <li><a href="">亲，下午好！</a></li>
    <li><a href="">新人福利领取~</a></li>
</ul></span>

     <div class="log-main">
         <ul>
             <li><img src="/index/images/log2.png" width="25" height="25" alt="">&nbsp;<input type="text" class="log-int"></li>
             <li><img src="/index/images/psw.png" width="25" height="25" alt="">&nbsp;<input type="password" class="log-int"></li>
             <li><button type="submit" class="log-go">登录</button></li>
             <li><button type="submit" class="log-go">注册</button></li>
         </ul>
         <div class="log-list">
             <ul>
                 <li class="li1"><a href="">
                     <img  class="icon" src="/index/images/icon/liwu.png" alt="" width="14" height="14">
<span>新人福利</span></a>
                 </li>
                 <li class="li2"><a href="">
                     <img  class="icon" src="/index/images/icon/vip.png" alt="" width="14" height="14">
                     <span>会员权利</span></a>
                 </li>
                 <li class="li3"><a href="">
                     <img  class="icon" src="/index/images/icon/tuijian.png" alt="" width="14" height="14">
                     <span>推荐有奖</span></a></li>
                 <li class="li4"><a href="">
                     <img  class="icon" src="/index/images/icon/huiyuan.png" alt="" width="14" height="14">
                     <span>会员中心</span></a></li>
                 <li class="li5"><a href="">
                     <img  class="icon" src="/index/images/icon/order.png" alt="" width="15" height="15">
                     <span>订单查询</span></a></li>
                 <li class="li6"><a href="">
                     <img  class="icon" src="/index/images/vip.png" alt="" width="15" height="15">
                     <span>我的积分</span></a></li>
             </ul>

         </div>
     </div>


 </div>

        </div>

        <div class="msg-box">

            <div id="tab">
                <h3 class="active" id="two1" onmouseover="setContentTab(&#39;two&#39;,1,3)">公告</h3>
                <h3 id="two2" onmouseover="setContentTab(&#39;two&#39;,2,3)">规则</h3>
                <h3 id="two3" onmouseover="setContentTab(&#39;two&#39;,3,3)">新手入门</h3>

                <div class="content" id="con_two_1">
                    <ul class="tab-margin">
                        <li><a href="">安骏DS官网隆重上线!&nbsp<span>2020-5-9</span></a></li>
                        <li><a href="" title="安骏DS官网隆重上线！">安骏DS官网隆重上线！&nbsp<span>2020-5-9</span></a></li>
                        <li><a href="">安骏DS官网隆重上线！&nbsp<span>2020-5-9</span></a></li>
                        <li><a href="">安骏DS官网隆重上线！&nbsp<span>2020-5-9</span></a></li>
                        <li><a href="">安骏DS官网隆重上线！&nbsp<span>2020-5-9</span></a></li>
                        <li><a href="">安骏DS官网隆重上线！&nbsp<span>2020-5-9</span></a></li>

                    </ul>
                </div>

                <div id="con_two_2">
                    <ul class="tab-margin">
                        <li><a href="">新手入门22</a></li>
                        <li><a href="">新手入门2</a></li>
                        <li><a href="">新手入门2</a></li>
                        <li><a href="">新手入门2</a></li>
                    </ul></div>
                <div id="con_two_3">
                    <ul class="tab-margin">
                        <li><a href="">新手入门3</a></li>
                        <li><a href="">新手入门3</a></li>
                        <li><a href="">新手入门3</a></li>
                        <li><a href="">新手入门3</a></li>
                    </ul></div>


            </div>

        </div>



    </div>

    <div class="solid"></div>
    <!--main products-->

    <div class="products-box">
<div class="products-title">
<span class="rq">人气推荐<img src="/index/images/icon/tuijian.png" alt="" width="30" height="30"></span>
    <span class="tishi">温馨提示：根据您的浏览为您推荐</span>
    <span class="all-title"><a href="">查看全部</a></span>
</div>

        <!--循环products-->
        <div class="products">
<div class="products-img">
    <a href="products_show.html" title="耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~"><img src="/index/images/products1.jpg" alt=""></a>
    <span class="hot-label"><img src="/index/images/hot.png" alt=""></span>
</div>
            <div class="products-title2">
                <a href="products_show.html">荣耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~</a>
            </div>
            <div class="products-title3">
                <ul>
                <li><a class="procuts-label" title="包邮">包邮</a></li>
                    <li><a class="procuts-label" title="支持花呗">支持花呗</a></li>
                    <li><a class="procuts-label" title="满100减">满100元减</a></li>
                </ul>
            </div>
            <div class="products-piece">
                <span class="piece" title="￥1499.00">￥1499.00</span>
                <span class="count" title="已售99件">已售99件</span>
            </div>


        </div>
<!--循环products-->

        <!--循环products-->
        <div class="products">
            <div class="products-img">
                <a href="products_show.html" title="耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~"><img src="/index/images/products1.jpg" alt=""></a>
                <span class="hot-label"><img src="/index/images/hot.png" alt=""></span>
            </div>
            <div class="products-title2">
                <a href="products_show.html">荣耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~</a>
            </div>
            <div class="products-title3">
                <ul>
                    <li><a class="procuts-label" title="包邮">包邮</a></li>
                    <li><a class="procuts-label" title="支持花呗">支持花呗</a></li>
                    <li><a class="procuts-label" title="满100减">满100元减</a></li>
                </ul>
            </div>
            <div class="products-piece">
                <span class="piece" title="￥1499.00">￥1499.00</span>
                <span class="count" title="已售99件">已售99件</span>
            </div>


        </div>
        <!--循环products-->

        <!--循环products-->
        <div class="products">
            <div class="products-img">
                <a href="products_show.html" title="耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~"><img src="/index/images/products1.jpg" alt=""></a>
                <span class="hot-label"><img src="/index/images/hot.png" alt=""></span>
            </div>
            <div class="products-title2">
                <a href="products_show.html">荣耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~</a>
            </div>
            <div class="products-title3">
                <ul>
                    <li><a class="procuts-label" title="包邮">包邮</a></li>
                    <li><a class="procuts-label" title="支持花呗">支持花呗</a></li>
                    <li><a class="procuts-label" title="满100减">满100元减</a></li>
                </ul>
            </div>
            <div class="products-piece">
                <span class="piece" title="￥1499.00">￥1499.00</span>
                <span class="count" title="已售99件">已售99件</span>
            </div>


        </div>
        <!--循环products-->

        <!--循环products-->
        <div class="products">
            <div class="products-img">
                <a href="products_show.html" title="耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~"><img src="/index/images/products1.jpg" alt=""></a>
                <span class="hot-label"><img src="/index/images/hot.png" alt=""></span>
            </div>
            <div class="products-title2">
                <a href="products_show.html">荣耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~</a>
            </div>
            <div class="products-title3">
                <ul>
                    <li><a class="procuts-label" title="包邮">包邮</a></li>
                    <li><a class="procuts-label" title="支持花呗">支持花呗</a></li>
                    <li><a class="procuts-label" title="满100减">满100元减</a></li>
                </ul>
            </div>
            <div class="products-piece">
                <span class="piece" title="￥1499.00">￥1499.00</span>
                <span class="count" title="已售99件">已售99件</span>
            </div>


        </div>
        <!--循环products-->

        <!--循环products-->
        <div class="products">
            <div class="products-img">
                <a href="products_show.html" title="耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~"><img src="/index/images/products1.jpg" alt=""></a>
                <span class="hot-label"><img src="/index/images/hot.png" alt=""></span>
            </div>
            <div class="products-title2">
                <a href="products_show.html">荣耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~</a>
            </div>
            <div class="products-title3">
                <ul>
                    <li><a class="procuts-label" title="包邮">包邮</a></li>
                    <li><a class="procuts-label" title="支持花呗">支持花呗</a></li>
                    <li><a class="procuts-label" title="满100减">满100元减</a></li>
                </ul>
            </div>
            <div class="products-piece">
                <span class="piece" title="￥1499.00">￥1499.00</span>
                <span class="count" title="已售99件">已售99件</span>
            </div>


        </div>
        <!--循环products-->

        <!--循环products-->
        <div class="products">
            <div class="products-img">
                <a href="products_show.html" title="耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~"><img src="/index/images/products1.jpg" alt=""></a>
                <span class="hot-label"><img src="/index/images/hot.png" alt=""></span>
            </div>
            <div class="products-title2">
                <a href="products_show.html">荣耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~</a>
            </div>
            <div class="products-title3">
                <ul>
                    <li><a class="procuts-label" title="包邮">包邮</a></li>
                    <li><a class="procuts-label" title="支持花呗">支持花呗</a></li>
                    <li><a class="procuts-label" title="满100减">满100元减</a></li>
                </ul>
            </div>
            <div class="products-piece">
                <span class="piece" title="￥1499.00">￥1499.00</span>
                <span class="count" title="已售99件">已售99件</span>
            </div>


        </div>
        <!--循环products-->

        <!--循环products-->
        <div class="products">
            <div class="products-img">
                <a href="products_show.html" title="耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~"><img src="/index/images/products1.jpg" alt=""></a>
                <span class="hot-label"><img src="/index/images/hot.png" alt=""></span>
            </div>
            <div class="products-title2">
                <a href="products_show.html">荣耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~</a>
            </div>
            <div class="products-title3">
                <ul>
                    <li><a class="procuts-label" title="包邮">包邮</a></li>
                    <li><a class="procuts-label" title="支持花呗">支持花呗</a></li>
                    <li><a class="procuts-label" title="满100减">满100元减</a></li>
                </ul>
            </div>
            <div class="products-piece">
                <span class="piece" title="￥1499.00">￥1499.00</span>
                <span class="count" title="已售99件">已售99件</span>
            </div>


        </div>
        <!--循环products-->

        <!--循环products-->
        <div class="products">
            <div class="products-img">
                <a href="products_show.html" title="耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~"><img src="/index/images/products1.jpg" alt=""></a>
                <span class="hot-label"><img src="/index/images/hot.png" alt=""></span>
            </div>
            <div class="products-title2">
                <a href="products_show.html">荣耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~</a>
            </div>
            <div class="products-title3">
                <ul>
                    <li><a class="procuts-label" title="包邮">包邮</a></li>
                    <li><a class="procuts-label" title="支持花呗">支持花呗</a></li>
                    <li><a class="procuts-label" title="满100减">满100元减</a></li>
                </ul>
            </div>
            <div class="products-piece">
                <span class="piece" title="￥1499.00">￥1499.00</span>
                <span class="count" title="已售99件">已售99件</span>
            </div>


        </div>
        <!--循环products-->

        <!--循环products-->
        <div class="products">
            <div class="products-img">
                <a href="products_show.html" title="耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~"><img src="/index/images/products1.jpg" alt=""></a>
                <span class="hot-label"><img src="/index/images/hot.png" alt=""></span>
            </div>
            <div class="products-title2">
                <a href="products_show.html">荣耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~</a>
            </div>
            <div class="products-title3">
                <ul>
                    <li><a class="procuts-label" title="包邮">包邮</a></li>
                    <li><a class="procuts-label" title="支持花呗">支持花呗</a></li>
                    <li><a class="procuts-label" title="满100减">满100元减</a></li>
                </ul>
            </div>
            <div class="products-piece">
                <span class="piece" title="￥1499.00">￥1499.00</span>
                <span class="count" title="已售99件">已售99件</span>
            </div>


        </div>
        <!--循环products-->

        <!--循环products-->
        <div class="products">
            <div class="products-img">
                <a href="products_show.html" title="耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~"><img src="/index/images/products1.jpg" alt=""></a>
                <span class="hot-label"><img src="/index/images/hot.png" alt=""></span>
            </div>
            <div class="products-title2">
                <a href="products_show.html">荣耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~</a>
            </div>
            <div class="products-title3">
                <ul>
                    <li><a class="procuts-label" title="包邮">包邮</a></li>
                    <li><a class="procuts-label" title="支持花呗">支持花呗</a></li>
                    <li><a class="procuts-label" title="满100减">满100元减</a></li>
                </ul>
            </div>
            <div class="products-piece">
                <span class="piece" title="￥1499.00">￥1499.00</span>
                <span class="count" title="已售99件">已售99件</span>
            </div>


        </div>
        <!--循环products-->






    </div>
    <!--main products end!-->

</div>
<!--main end!-->

<!--优惠活动-->
<div class="youhui-products-box">
    <div class="youhui">
    <div class="products-title">
        <span class="rq">优惠活动<img src="/index/images/icon/tuijian.png" alt="" width="30" height="30"></span>
        <span class="tishi">温馨提示：根据您的浏览为您推荐</span>
        <span class="all-title"><a href="">查看全部</a></span>
    </div>

    <!--循环products-->
    <div class="products">
        <div class="products-img">
            <a href="products_show.html" title="耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~"><img src="/index/images/products1.jpg" alt=""></a>
            <span class="hot-label"><img src="/index/images/hot.png" alt=""></span>
        </div>
        <div class="products-title2">
            <a href="products_show.html">荣耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~</a>
        </div>
        <div class="products-title3">
            <ul>
                <li><a class="procuts-label" title="包邮">包邮</a></li>
                <li><a class="procuts-label" title="支持花呗">支持花呗</a></li>
                <li><a class="procuts-label" title="满100减">满100元减</a></li>
            </ul>
        </div>
        <div class="products-piece">
            <span class="piece" title="￥1499.00">￥1499.00</span>
            <span class="count" title="已售99件">已售99件</span>
        </div>


    </div>
    <!--循环products-->

        <!--循环products-->
        <div class="products">
            <div class="products-img">
                <a href="products_show.html" title="耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~"><img src="/index/images/products1.jpg" alt=""></a>
                <span class="hot-label"><img src="/index/images/hot.png" alt=""></span>
            </div>
            <div class="products-title2">
                <a href="products_show.html">荣耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~</a>
            </div>
            <div class="products-title3">
                <ul>
                    <li><a class="procuts-label" title="包邮">包邮</a></li>
                    <li><a class="procuts-label" title="支持花呗">支持花呗</a></li>
                    <li><a class="procuts-label" title="满100减">满100元减</a></li>
                </ul>
            </div>
            <div class="products-piece">
                <span class="piece" title="￥1499.00">￥1499.00</span>
                <span class="count" title="已售99件">已售99件</span>
            </div>


        </div>
        <!--循环products-->

        <!--循环products-->
        <div class="products">
            <div class="products-img">
                <a href="products_show.html" title="耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~"><img src="/index/images/products1.jpg" alt=""></a>
                <span class="hot-label"><img src="/index/images/hot.png" alt=""></span>
            </div>
            <div class="products-title2">
                <a href="products_show.html">荣耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~</a>
            </div>
            <div class="products-title3">
                <ul>
                    <li><a class="procuts-label" title="包邮">包邮</a></li>
                    <li><a class="procuts-label" title="支持花呗">支持花呗</a></li>
                    <li><a class="procuts-label" title="满100减">满100元减</a></li>
                </ul>
            </div>
            <div class="products-piece">
                <span class="piece" title="￥1499.00">￥1499.00</span>
                <span class="count" title="已售99件">已售99件</span>
            </div>


        </div>
        <!--循环products-->

        <!--循环products-->
        <div class="products">
            <div class="products-img">
                <a href="products_show.html" title="耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~"><img src="/index/images/products1.jpg" alt=""></a>
                <span class="hot-label"><img src="/index/images/hot.png" alt=""></span>
            </div>
            <div class="products-title2">
                <a href="products_show.html">荣耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~</a>
            </div>
            <div class="products-title3">
                <ul>
                    <li><a class="procuts-label" title="包邮">包邮</a></li>
                    <li><a class="procuts-label" title="支持花呗">支持花呗</a></li>
                    <li><a class="procuts-label" title="满100减">满100元减</a></li>
                </ul>
            </div>
            <div class="products-piece">
                <span class="piece" title="￥1499.00">￥1499.00</span>
                <span class="count" title="已售99件">已售99件</span>
            </div>


        </div>
        <!--循环products-->

        <!--循环products-->
        <div class="products">
            <div class="products-img">
                <a href="products_show.html" title="耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~"><img src="/index/images/products1.jpg" alt=""></a>
                <span class="hot-label"><img src="/index/images/hot.png" alt=""></span>
            </div>
            <div class="products-title2">
                <a href="products_show.html">荣耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~</a>
            </div>
            <div class="products-title3">
                <ul>
                    <li><a class="procuts-label" title="包邮">包邮</a></li>
                    <li><a class="procuts-label" title="支持花呗">支持花呗</a></li>
                    <li><a class="procuts-label" title="满100减">满100元减</a></li>
                </ul>
            </div>
            <div class="products-piece">
                <span class="piece" title="￥1499.00">￥1499.00</span>
                <span class="count" title="已售99件">已售99件</span>
            </div>


        </div>
        <!--循环products-->

        <!--循环products-->
        <div class="products">
            <div class="products-img">
                <a href="products_show.html" title="耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~"><img src="/index/images/products1.jpg" alt=""></a>
                <span class="hot-label"><img src="/index/images/hot.png" alt=""></span>
            </div>
            <div class="products-title2">
                <a href="products_show.html">荣耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~</a>
            </div>
            <div class="products-title3">
                <ul>
                    <li><a class="procuts-label" title="包邮">包邮</a></li>
                    <li><a class="procuts-label" title="支持花呗">支持花呗</a></li>
                    <li><a class="procuts-label" title="满100减">满100元减</a></li>
                </ul>
            </div>
            <div class="products-piece">
                <span class="piece" title="￥1499.00">￥1499.00</span>
                <span class="count" title="已售99件">已售99件</span>
            </div>


        </div>
        <!--循环products-->

        <!--循环products-->
        <div class="products">
            <div class="products-img">
                <a href="products_show.html" title="耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~"><img src="/index/images/products1.jpg" alt=""></a>
                <span class="hot-label"><img src="/index/images/hot.png" alt=""></span>
            </div>
            <div class="products-title2">
                <a href="products_show.html">荣耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~</a>
            </div>
            <div class="products-title3">
                <ul>
                    <li><a class="procuts-label" title="包邮">包邮</a></li>
                    <li><a class="procuts-label" title="支持花呗">支持花呗</a></li>
                    <li><a class="procuts-label" title="满100减">满100元减</a></li>
                </ul>
            </div>
            <div class="products-piece">
                <span class="piece" title="￥1499.00">￥1499.00</span>
                <span class="count" title="已售99件">已售99件</span>
            </div>


        </div>
        <!--循环products-->

        <!--循环products-->
        <div class="products">
            <div class="products-img">
                <a href="products_show.html" title="耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~"><img src="/index/images/products1.jpg" alt=""></a>
                <span class="hot-label"><img src="/index/images/hot.png" alt=""></span>
            </div>
            <div class="products-title2">
                <a href="products_show.html">荣耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~</a>
            </div>
            <div class="products-title3">
                <ul>
                    <li><a class="procuts-label" title="包邮">包邮</a></li>
                    <li><a class="procuts-label" title="支持花呗">支持花呗</a></li>
                    <li><a class="procuts-label" title="满100减">满100元减</a></li>
                </ul>
            </div>
            <div class="products-piece">
                <span class="piece" title="￥1499.00">￥1499.00</span>
                <span class="count" title="已售99件">已售99件</span>
            </div>


        </div>
        <!--循环products-->

        <!--循环products-->
        <div class="products">
            <div class="products-img">
                <a href="products_show.html" title="耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~"><img src="/index/images/products1.jpg" alt=""></a>
                <span class="hot-label"><img src="/index/images/hot.png" alt=""></span>
            </div>
            <div class="products-title2">
                <a href="products_show.html">荣耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~</a>
            </div>
            <div class="products-title3">
                <ul>
                    <li><a class="procuts-label" title="包邮">包邮</a></li>
                    <li><a class="procuts-label" title="支持花呗">支持花呗</a></li>
                    <li><a class="procuts-label" title="满100减">满100元减</a></li>
                </ul>
            </div>
            <div class="products-piece">
                <span class="piece" title="￥1499.00">￥1499.00</span>
                <span class="count" title="已售99件">已售99件</span>
            </div>


        </div>
        <!--循环products-->

        <!--循环products-->
        <div class="products">
            <div class="products-img">
                <a href="products_show.html" title="耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~"><img src="/index/images/products1.jpg" alt=""></a>
                <span class="hot-label"><img src="/index/images/hot.png" alt=""></span>
            </div>
            <div class="products-title2">
                <a href="products_show.html">荣耀V11现货，特价出手，新人在免200元，赶快来抢购吧~~~~~</a>
            </div>
            <div class="products-title3">
                <ul>
                    <li><a class="procuts-label" title="包邮">包邮</a></li>
                    <li><a class="procuts-label" title="支持花呗">支持花呗</a></li>
                    <li><a class="procuts-label" title="满100减">满100元减</a></li>
                </ul>
            </div>
            <div class="products-piece">
                <span class="piece" title="￥1499.00">￥1499.00</span>
                <span class="count" title="已售99件">已售99件</span>
            </div>


        </div>
        <!--循环products-->

    </div>
</div>
<!--优惠活动end-->



<!--流程-->

<div class="liucheng-box">
<div class="liucheng">

<div class="liucheng-content">
<div class="liucheng-title"><span><img src="/index/images/icon/zhinan2.png" alt="" width="50" height="50">&nbsp;新手指南</span></div>
<div class="liucheng-message">安骏DS官网是做什么的?怎么加入会员，怎么注册帐号?怎么入驻?我是新手,怎么使用安骏的DS仓储系统?</div>
    <div class="liaojie-btn"><a href="">查看详情</a></div>
</div>

    <div class="liucheng-content">
        <div class="liucheng-title"><span><img src="/index/images/icon/cangku.png" alt="" width="50" height="50">&nbsp;供应商入驻</span></div>
        <div class="liucheng-message">入驻平台轻松获得源源不断的靠谱订单，降低市场开拓成本,作为核心企业供应商，获得全业务场景曝光</div>
        <div class="liaojie-btn"><a href="">查看详情</a></div>
    </div>

    <div class="liucheng-content">
        <div class="liucheng-title"><span><img src="/index/images/icon/zhifu2.png" alt="" width="50" height="50">&nbsp;支付方式</span></div>
        <div class="liucheng-message">安骏DS官网支付方式支持多个平台，微信，支付宝，银联，前海支付，信用卡等多种方式,满足广大客户需求。</div>
        <div class="liaojie-btn"><a href="">查看详情</a></div>
    </div>

    <div class="liucheng-content">
        <div class="liucheng-title"><span><img src="/index/images/icon/daifa.png" alt="" width="50" height="50">&nbsp;一件代发</span></div>
        <div class="liucheng-message">安骏提供仓储系统，提供一件代发，为客户解决积压货物烦恼，为客户节省更多开支~！</div>
        <div class="liaojie-btn"><a href="">查看详情</a></div>
    </div>

    <div class="liucheng-content">
        <div class="liucheng-title"><span><img src="/index/images/icon/yunshu.png" alt="" width="50" height="50">&nbsp;运输方案</span></div>
        <div class="liucheng-message">安骏自身拥有多年跨境经验，可为客户提供多种运输渠道方案，快速，安全，价格透明。</div>
        <div class="liaojie-btn"><a href="">查看详情</a></div>
    </div>

</div>

</div>
<!--流程end-->
<!--footer-->
@include("layout.index.foot");
<!--footer end!-->

<!--左侧导航JS-->
<script type="text/javascript">
    $(function() {
        var $top = $('.sec-mainNav').offset().top + $('.sec-mainNav').height()
        //左侧导航动画
        $('.sec-mainNav li').on('mouseenter', function() {
            var $height = $(this).offset().top + $(this).find('.menu-panel').outerHeight();
            $(this).find('.menu-panel').show();
            if($height - $top >= 0) {
                $(this).find('.menu-panel').css({
                    top: -($height - $top) + 'px'
                })
            };
        });
        $('.sec-mainNav li').on('mouseleave', function() {
            $(this).find('.menu-panel').hide();
        });
    });
</script>
<!--选项卡js-->
<script type="text/javascript">
    function setContentTab(name, curr, n) {
        for (i = 1; i <= n; i++) {
            var menu = document.getElementById(name + i);
            var cont = document.getElementById("con_" + name + "_" + i);
            menu.className = i == curr ? "active" : "";
            if (i == curr) {
                cont.style.display = "block";
            } else {
                cont.style.display = "none";
            }
        }
    }
</script>


</body>
</html>