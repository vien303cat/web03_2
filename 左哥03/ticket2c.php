<?php
  if(isset($_POST['chkout'])){
    include_once '_config.php';
    // print_r($_POST);
    foreach($_POST as $key=>$value){
      $$key=$value;      
    }
    $sql="SELECT * FROM `ticket` WHERE `date`='{$mvdate}'";
    $cnt=myAff($sql);
    $no=date("Ymd",strtotime($mvdate)).str_pad($cnt+1,4,'0',STR_PAD_LEFT);
    foreach($_POST['chair'] as $r){
      $sql="INSERT INTO `ticket` VALUES (null,'{$no}','{$mvid}','{$mvname}','{$mvdate}','{$mvsess}','{$r}')";
      myAff($sql);
    }
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0047)? -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>影城</title>
<link rel="stylesheet" href="assets/css.css">
<link href="assets/s2.css" rel="stylesheet" type="text/css">
<script src="assets/jquery-1.9.1.min.js"></script>
</head>

<body>
<div id="main">
  <div id="top" class="ct" style=" background:#999 center; background-size:cover; " title="替代文字">
    <h1>ABC影城</h1>
  </div>
  <div id="top2"> <a href="index1.php">首頁</a> <a href="ticket2a.php">線上訂票</a> <a href="#">會員系統</a> <a href="admin.php">管理系統</a> </div>
  <div id="text"> <span class="ct">最新活動</span>
    <marquee direction="right">
    ABC影城票價全面八折優惠1個月
    </marquee>
  </div>
  <div id="mm">
<table width="100%" border="1">
  <tr>
    <td colspan="2">感謝您的訂購，訂單編號:<?=$no?></td>
    </tr>
  <tr>
    <td width="16%">電影名稱</td>
    <td width="84%"><?=$mvname?></td>
  </tr>
  <tr>
    <td>觀看日期</td>
    <td><?=$mvdate?></td>
  </tr>
  <tr>
    <td>場次時間</td>
    <td><?=$mvsess?></td>
  </tr>
  <tr>
    <td colspan="2">
    <p>座位</p>
      <p>
      <?php
          $qt=0;
          foreach($_POST['chair'] as $r){
            ?><?=$r[0]?>排<?=$r[1]?>號<br><?php
            $qt++;
          }
      ?>
      </p>
      <p>共<?=$qt?>票</p>
      </td>
    </tr>
  <tr>
    <td colspan="2">
    <a href="index1.php"><input type="button" name="button" id="button" value="確認" /></a>
    </td>
    </tr>
</table>
  </div>
  <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
</div>
</body>
</html>
