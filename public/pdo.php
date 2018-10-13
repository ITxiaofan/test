<?php
$host= "127.0.0.1 ";
$user= "root ";
$dbname = "product";
$password= "123456 ";

$conn=mysql_connect($host,$user,$dbname,$password)
or die( "连接服务器失败！ ");
$selectdb=mysql_select_db( "db1 ")
or die( "选择数据库失败！ ");
?>