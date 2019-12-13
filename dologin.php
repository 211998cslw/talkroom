<?php 
session_start();
$username=htmlspecialchars($_POST['username']);
$pwd=htmlspecialchars($_POST['password']);
//连接数据库 判断登录成功
$uid=1;
if(true){
	$_SESSION[$uid]=$username;
}

 ?>