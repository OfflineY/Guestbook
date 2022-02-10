<?php
require_once 'config.php';

$t = $_GET["t"];
$n = $_GET["n"];
$time = date("Y-m-d H:i",time());

//插入语句
$sql = "INSERT INTO LYB_001 (id,name,text,time) VALUES (null,'$n','$t','$time')";

//执行sql的添加代码
$conn->query($sql);
//回到首页
header("Location:index.php");
?>