<?php 
session_start();
$link = mysqli_connect("localhost","root","","db03_2");
mysqli_query($link,"SET NAMES UTF8");
$strtime = strtotime("+6hour");
$nowday = date("Y-m-d");
$nowtime = date("Y-m-d H:i:s");
?>