<?php
session_start();
$username = htmlspecialchars($_POST['name']);
$pwd = htmlspecialchars($_POST['pwd']);
$conn = mysqli_connect('127.0.0.1','root','','1812');
$sql = "select * from user where name='$username'";
$res = mysqli_query($conn,$sql);
$user = mysqli_fetch_assoc($res);
if (!$user){
    echo "<script>alert('账号不存在');history.go(-1);</script>";die;
}elseif($user['pwd'] != $pwd){
    echo "<script>alert('密码不正确');history.go(-1);</script>";die;
}else{
    $key = 'user'.$user['id'];
    $_SESSION[$key] = $user;
    echo "<script>alert('登录成功');location.href='sever.php?id=".$key."';</script>";die;
}