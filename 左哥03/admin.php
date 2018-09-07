<?php
  include_once '_config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0055)?do=admin -->
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
  <div id="top" style=" background:#999 center; background-size:cover; " title="替代文字">
    <h1>ABC影城</h1>
  </div>
  <div id="top2"> <a href="index1.php">首頁</a> <a href="ticket.php">線上訂票</a> <a href="#">會員系統</a> <a href="admin.php">管理系統</a> </div>
  <div id="text"> <span class="ct">最新活動</span>
    <marquee direction="right">
    ABC影城票價全面八折優惠1個月
    </marquee>
  </div>
  <div id="mm">
  <?php
    if(isset($_SESSION['admin'])){
?>
  
    <div class="ct a rb" style="position:relative; width:101.5%; left:-1%; padding:3px; top:-9px;">
     <a href="?do=admin&redo=tit">網站標題管理</a>
     | <a href="?do=admin&redo=go">動態文字管理</a>
     | <a href="?do=admin&redo=arr">預告片海報管理</a>
     | <a href="?do=admin&redo=avv">院線片管理</a>
     | <a href="?do=admin&redo=aorder">電影訂票管理</a> </div>
    
<?php
      if(isset($_GET['redo'])){
        include_once $_GET['redo'].'.php';
      }else{
        ?>
          <div class="rb tab">
            <h2 class="ct">請選擇所需功能</h2>
          </div>      
        <?php
      }
    }else{
      include_once 'login.php';
    }    
  ?>
  </div>
  <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
</div>
</body>
</html>
