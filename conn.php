
<?php
    // 连接数据库(地址,用户名,密码,数据库名)
    $servername="localhost";
    $username="root";
    $password="071104yY";
    $dbname="sql_001";
    // 创建链接
    $conn = new mysqli($servername,$username,$password,$dbname);
    // 检测链接
    if($conn->connect_error){
        die("连接失败：".$conn->connect_error);
    }
?>