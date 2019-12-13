<?php
session_start();
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>直播</title>
</head>
<style>


    font{
        background: linear-gradient(to right, red, blue);
        -webkit-background-clip: text;
        color: transparent;
</style>
<body>
<marquee><font size=+3 color=red>仙女聊天室</font></marquee>
<div style="border:1px solid black;width:700px;height:600px;overflow-y: auto" id="message"></div>
<div>
    <input type="text" name="content" id="content">
    <input type="button" value="发送" id="btn">
</div>
</body>
<script src="jquery-3.3.1.js"></script>
<script>
    if(window.WebSocket){
        var ws = new WebSocket('ws://39.105.42.250:9501');
        ws.onopen =function(event){
            var username ="<?php echo $_SESSION[$uid];?>";
            console.log(username);
            var json = '{"type":"login","content":"'+name+'"}';
            ws.send(json);
        }
        ws.onmessage = function(event){
            var msg = event.data;
            $("#message").append(msg);
        }
        $(document).on('click',"#btn",function(){
            var content = $('#content').val();
            var json = '{"type":"talk","content":"'+content+'"}';
            ws.send(json);
        })
    }
</script>
</html>