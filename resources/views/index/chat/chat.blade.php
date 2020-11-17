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
<body lang="zh">
    <img style="width:100%;height:100%" src="https://wallpaperm.cmcm.com/2d64f9b1d09b9c519b301d4d721adc0c.jpg">
    <div class="abs cover contaniner">
        <div class="abs cover pnl">
            <div class="pnl-head">
                <b style="margin-left: 430px;">{{$data_name}}</b>
                <input type="type" value="{{$send_alone}}">
                <input type="type" value="{{$take_alone}}">
            </div>
            <div class="abs cover pnl-body" id="pnlBody">
                <div class="abs cover">
                    <div class="abs cover pnl-msgs scroll" id="show">
                        <div class="msg min time" id="histStart">请勿聊钱多多客服小姐姐</div>

                        <div class="pnl-list" id="hists">
                            <!-- 历史消息 -->
                        </div>
                        <div class="pnl-list" id="msgs">  
                            <div class="msg robot">
                                <b style="margin-left: 850px;">小龙</b>
                                <div class="msg-right">
                                    <div class="msg-host photo" style="background-image: url(https://dss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=1194131577,2954769920&fm=26&gp=0.jpg)"></div>
                                    <div class="msg-ball" title="今天 17:52:06">你好，我是只能打字的聊天机器人<br><br>您是想要了解哪些方面呢？</div>
                                </div>
                            </div>
                            <div class="msg robot">
                                <b style="margin-left: 10px;">小白</b>
                                <div class="msg-left">
                                    <div class="msg-host photo" style="background-image: url(https://dss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=3123765718,3071569660&fm=111&gp=0.jpg8)"></div>
                                    <div class="msg-ball">
                                        {{date("Y-m-d h:i:s",time())}}
                                        <br>你好
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
                        <div class="abs br pnl-btn" id="submit" style="background-color: rgb(32, 196, 202); color: rgb(255, 255, 255);" @click="SendMsg()">发送</div>
                        <div class="pnl-support" id="copyright"><a href="#">版权什么的</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>     
</div>
</html>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    var ws = new WebSocket("ws://127.0.0.1:7272");
    var send = "{{$send_alone}}";
    var take = "{{$take_alone}}";
    var app = new Vue({
        el:"#app",
        data:{
            messages:[],
            content:"",
            send:"",
            take:"",
        },
        created:function(){
            ws.onmessage = function(e){
                console.log(e.data);
                let data =JSON.parse(e.data);
                let type = data.type || "";
                switch(type){
                    case 'init':
                    axios.post("/chat/init",{client_id:data.client_id});
                    break;
                }
            }.bind(this);
        },
        methods:{
            SendMsg:function(){
                axios.post("/chat/say",{content:this.content,send_alone:send,take_alone:take});
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