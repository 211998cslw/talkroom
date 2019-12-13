<?php 
session_start();
$username=htmlspecialchars($_POST['username']);
$pwd=htmlspecialchars($_POST['password']);
//连接数据库 判断登录成功
$uid='user1';
if(true){
	$_SESSION[$uid]=$username;
	header("localtion:talkroom.php?uid=".$uid);
}

 ?>