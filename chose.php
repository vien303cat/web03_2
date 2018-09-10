<?php include_once("head.php"); ?>

<style>
    .ding{
        width:500px;
        height:500px;
    }
</style>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0047)? -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>影城</title>
<link rel="stylesheet" href="css/css.css">
<link href="home_files/s2.css" rel="stylesheet" type="text/css">
<script src="scripts/jquery-1.9.1.min.js"></script>
</head>


<body>

<div id="main">
  <div id="top" class="ct" style=" background:#999 center; background-size:cover; " title="替代文字">
    <h1>ABC影城</h1>
  </div>
  <div id="top2"> <a href="index.php">首頁</a> <a href="tick.php">線上訂票</a> <a href="#">會員系統</a> <a href="login.php">管理系統</a> </div>
  <div id="text"> <span class="ct">最新活動</span>
    <marquee direction="right">
    ABC影城票價全面八折優惠1個月
    </marquee>
  </div>

  <div id="mm">
  <form method="post" action="tickend.php">
  <input type="hidden" value="<?=$_POST["sel1"]?>" name="movie">
  <input type="hidden" value="<?=$_POST["sel2"]?>" name="date">
  <input type="hidden" value="<?=$_POST["sel3"]?>" name="site">
  <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td align="center" height="50%" width="60%">
    <div id="ding" >
    <?php 
    for($i=1;$i<=4;$i++){
        for($j=1;$j<=5;$j++){ 
            $bb = ($i - 1)*5+ $j;
            $sql = "select * from tick where tick_movieseq = '".$_POST["sel1"]."' and tick_date = '".$_POST["sel2"]."' and tick_site = '".$_POST["sel3"]."' and tick_sit = '$bb'";
            $c1  = mysqli_query($link,$sql);
            $row = mysqli_num_rows($c1);
            if($row == 1){
            ?>
            <div style='width:130px;height:130px;float:left;'><?=$i?>排<?=$j?>號<br>
            <img src="img/03D03.png"></div>
            <?php }else{ ?>
            <div style='width:130px;height:130px;float:left;' id="ff<?=$bb?>"><?=$i?>排<?=$j?>號<br>
            <img src="img/03D02.png">
            <input type="checkbox" name="ss[]" id="ee<?=$bb?>" value="<?=$bb?>" onclick="hm(<?=$bb?>)" >
            </div>
            <?php } 
         }
    }
    ?>
    </div>
    </td>
  </tr>
  <?php 
  $sql = "select * from movie where movie_seq = '".$_POST["sel1"]."'";
  $c1  = mysqli_query($link,$sql);
  $c2  = mysqli_fetch_assoc($c1);
  ?>
  <tr>
    <td align="center" width="80%">您選擇的電影是:<?=$c2["movie_name"]?></td>
  </tr>
  <tr>
    <td align="center" width="80%">您選擇的時刻是: <?=$c2["movie_date"]?>
    <?php if($_POST["sel3"]==1){
        echo "14:00~16:00";
    }else if($_POST["sel3"]==2){
        echo "16:00~18:00";
    }else if($_POST["sel3"]==3){
        echo "18:00~20:00";
    }else if($_POST["sel3"]==4){
        echo "20:00~22:00";
    }else if($_POST["sel3"]==5){
        echo "22:00~24:00";
    } ?></td>
  </tr>
  <tr>
    <td align="center" width="80%">您已勾選<span id="zz"></span>張票，最多可以購買四張票</td>
  </tr>
  <tr>
    <td align="center" width="80%"><input type="button" value="上一步" onclick="window.close()"><input type="submit" value="訂購"></td>
  </tr>
  </form>
</table>
  </div>
  <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
</div>
</body>
</html>
<script>
var tselect = 0 ;
function hm(oo){
    pp = document.getElementById("ee"+oo).checked;
    if (pp == true){
        if(tselect >= 4){
            document.getElementById("ee"+oo).checked = false ;
        }else{
            tselect = tselect + 1;
        }
    }else{
        tselect =  tselect - 1;
    }
    document.getElementById("zz").innerHTML = tselect;
}
</script>

