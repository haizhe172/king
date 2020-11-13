<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta name="full-screen" content="yes">
    <meta content="default" name="apple-mobile-web-app-status-bar-style">
    <meta name="screen-orientation" content="portrait">
    <meta name="browsermode" content="application">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="x5-orientation" content="portrait">
    <meta name="x5-fullscreen" content="true">
    <meta name="x5-page-mode" content="app">
    <base target="_blank">
    <title>会话_聊天机器人</title>
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/index/chat/chat.css">
    <script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
    <script src="/index/chat/chat.js"></script>
</head>
<div id="app">
<form @submit.prevent="onSubmit">
<body lang="zh">
    <img style="width:100%;height:100%" src="https://wallpaperm.cmcm.com/2d64f9b1d09b9c519b301d4d721adc0c.jpg">
    <div class="abs cover contaniner">
        <div class="abs cover pnl">
            <div class="top pnl-head"></div>
            <div class="abs cover pnl-body" id="pnlBody">
                <div class="abs cover pnl-left">
                    <div class="abs cover pnl-msgs scroll" id="show">
                        <div class="msg min time" id="histStart">加载历史消息</div>
                        <div class="msg min time">@{{sta}}</div>

                        <div class="pnl-list" id="hists">
                            <!-- 历史消息 -->
                        </div>
                        <div class="pnl-list" id="msgs">  
                            <div class="msg robot">
                                <b style="margin-left: 550px;">小龙</b>
                                <div class="msg-right">
                                    <div class="msg-host photo" style="background-image: url(https://dss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=1194131577,2954769920&fm=26&gp=0.jpg)"></div>
                                    <div class="msg-ball" title="今天 17:52:06">你好，我是只能打字的聊天机器人<br><br>您是想要了解哪些方面呢？</div>
                                </div>
                            </div>
                            <div class="msg robot" v-for = "message in messages">
                                <b style="margin-left: 20px;">@{{message.user_id}}</b>
                                <div class="msg-left">
                                    <div class="msg-host photo" style="background-image: url(https://dss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=3123765718,3071569660&fm=111&gp=0.jpg8)"></div>
                                    <div class="msg-ball">
                                        {{date("Y-m-d h:i:s",time())}}
                                        <br>@{{message.message}}
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="pnl-list hide" id="unreadLine">
                            <div class="msg min time unread">未读消息</div>
                        </div>
                    </div>
                    <div class="abs bottom pnl-text">
                        <div class="abs top pnl-warn" id="pnlWarn">
                            <div class="fl btns rel pnl-warn-free">
                            <!--<img src="../Images/icon/Smile.png" class="kh warn-btn" title="表情" id="emojiBtn" />
                                <img src="../Images/icon/pic.png" class="kh warn-btn" title="截屏" id="emojiBtn" />
                                <img src="../Images/icon/camera.png" class="kh warn-btn" title="图片" id="emojiBtn" />
                                <img src="../Images/icon/edit.png" class="kh warn-btn" title="保存" id="emojiBtn" /> -->
                            </div>
                        </div>
                        <div class="abs cover pnl-input">
                            <textarea class="scroll" id="text" wrap="hard" placeholder="在此输入文字信息..." v-model="content"></textarea>
                            <div class="abs atcom-pnl scroll hide" id="atcomPnl">
                                <ul class="atcom" id="atcom"></ul>
                            </div>
                        </div>
                        <div class="abs br pnl-btn" id="submit" style="background-color: rgb(32, 196, 202); color: rgb(255, 255, 255);" οnclick="SendMsg()"><button type="submin">发送</button></div>
                        <div class="pnl-support" id="copyright"><a href="#">版权什么的</a></div>
                    </div>
                </div>
                <div class="abs right pnl-right">
                    <div class="slider-container hide"></div>
                    <div class="pnl-right-content">
                        <div class="pnl-tabs">
                            <div class="tab-btn active" id="hot-tab">常见问题</div>
                            <div class="tab-btn" id="rel-tab">相关问题</div>
                        </div>
                        <div class="pnl-hot">
                            <ul class="rel-list unselect" id="hots">
                                <!-- <li class="rel-item">这是一个问题，这是一个问题？</li> -->
                            </ul>
                        </div>
                        <div class="pnl-rel" style="display: none;">
                            <ul class="rel-list unselect" id="rels">
                                <!-- <li class="rel-item">这是一个问题，这是一个问题？</li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>     
</form>   
</div>
</html>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
<script>
    var ws = new WebSocket("ws://127.0.0.1:7272");
    var app = new Vue({
        el:"#app",
        data:{
            messages:[],
            content:"",
            sta:""
        },
        created:function(){
            ws.onmessage = function(e){
                console.log(e.data);
                var status = isJSON(e.data);
                if(status){
                    this.messages.push(JSON.parse(e.data));
                }else{
                    this.sta = e.data;
                } 
                this.content="";
            }.bind(this);
        },
        methods:{
            onSubmit:function(){
                console.log(this.messages);
                ws.send(this.content);
                test();
            }
        }
    }) ;
function isJSON(str) {
    if (typeof str == 'string') {
        try {
            JSON.parse(str);
            return true;
        } catch(e) {
            console.log(e);
            return false;
        }
    }
    console.log('It is not a string!')    
}
</script>