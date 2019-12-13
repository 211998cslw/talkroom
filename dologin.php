<?php
session_start();
$username = htmlspecialchars($_POST['name']);
//var_dump($username);die;
$pwd = htmlspecialchars($_POST['pwd']);
//var_dump($pwd);die;
$conn = mysqli_connect('127.0.0.1','root','cslw1314','talkroom');
$sql = "select * from user where name='$username'";
$res = mysqli_query($conn,$sql);
$user = mysqli_fetch_assoc($res);
//var_dump($user);die;
if (!$user){
    echo "<script>alert('账号不存在');history.go(-1);</script>";die;
}elseif($user['pwd'] != $pwd){
    echo "<script>alert('密码不正确');history.go(-1);</script>";die;
}else{
    $id = 'user'.$user['id']; 
    $_SESSION[$id] = $username;
    echo "<script>alert('登录成功');location.href='talkroom.php?id=".$id."';</script>";die;
}         