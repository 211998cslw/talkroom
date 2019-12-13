<?php 
$username=htmlspecialchars($_POST['name']);
$password=htmlspecialchars($_POST['pwd']);
//var_dump($username);die;
$conn = mysqli_connect('127.0.0.1','root','cslw1314','talkroom');
//var_dump($conn);die;
$sql = "insert into user(name,pwd) values ('$username','$password')";
//var_dump($sql);die;
$res = mysqli_query($conn,$sql);
echo "<script>alert('注册成功');location.href='talkroom.php';</script>";die;

 ?>