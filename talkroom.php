<?php 
session_start();
$uid=$_GET['uid'];
// echo $_SESSION['$uid'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<div style="border:1px solid black; width:300px;height:200px;" id="message"></div>
<div>
	<input type="text"  id="content">
	<input type="button" value="发送" id="btn">
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    if(window.WebSocket){
        var ws =new WebSocket('ws://39.105.42.250:9501');
        ws.onopen=function(event){
            var username="<?php echo $_SESSION[$uid];?>";
            // alert(username);
            var json="{'type':'login','content':'"+username+"'}";
            console.log(json);
            ws.send(json);
        }
        ws.onmessage =function(event){
            var msg=event.data;
            console.log(msg);
            $("#message").append("<p>"+msg+"</p >");
        }
        $(document).on('click',"#btn",function(){
            var content = $('#content').val();
            var json ="{'content':"+content+"}";
            // alert(json);
            ws.send(content);
        })


    }


</script>
</body>
</html>