<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2019/12/13
 * Time: 10:59
 */
$username = htmlspecialchars($_POST['name']);
$pwd = htmlspecialchars($_POST['pwd']);
//var_dump($pwd);die;
$con =mysqli_connect("127.0.0.1","root","cslw1314","talkroom");
//var_dump($con);die;

$sql="insert into `user`(`name`,`pwd`) values('$username','$pwd')";
//var_dump($sql);die;
$res=mysqli_query($con,$sql);
//var_dump($res);die;

if (!$res) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
if($res){
    echo "<script>alert('注册成功');location.href='index.php';</script>";die;
}else{
    echo "<script>alert('注册失败');location.href='index.php';</script>";die;
}
~ 