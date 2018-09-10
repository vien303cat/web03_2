<?php include_once("head.php"); ?>
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
<div id="cover" style="display:none; ">
	<div id="coverr" style="	width:70%;
	height:70%;
	position:absolute;
	background:#ffffff;
	top:0px;
	left:0px;
	right:0px;
	bottom:0px;
	margin:auto;
	overflow:auto;">
    	<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover')">X</a>
        <div id="cvr" style="position:absolute; margin:auto; z-index:9898;"></div>
    </div>
</div>
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
<?php 
    $sql = "select * from movie ";
    $c1  = mysqli_query($link,$sql);
    $c2  = mysqli_fetch_assoc($c1);
    $row = mysqli_num_rows($c1);
    ?>
    <form method="post">
<table width="80%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td align="left">電影:
        <select id="sel1" onchange="se1()">
            <?php do{ ?>
            <option value="<?=$c2["movie_seq"]?>" <?php if(!empty($_GET["seq"])&& $c2["movie_seq"] == $_GET["seq"]){ echo "selected"; } ?> ><?=$c2["movie_name"]?></option>
            <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>
        </select>
    </td>
  </tr>
  <tr>
    <td align="left">日期:<div id="date"></div></td>
  </tr>
  <tr>
    <td align="left">場次:<div id="site"></div></td>
  </tr>
  <tr>
    <td align="left"><input type="button" value="訂購" onclick="gogo()"><input type="reset" value="重置"></td>
  </tr>
</table>
</form>
  </div>
  <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
</div>
</body>
</html>
<script>
    <?php if(!empty($_GET["seq"])){ ?> se1(); <?php } ?>
function se1(){
    var s1 = document.getElementById("sel1").value;
    $.post("t1.php",{s1},function(dd){
        document.getElementById("date").innerHTML = dd;
    });
}
function se2(){
    var s1 = document.getElementById("sel1").value;
    var s2 = document.getElementById("sel2").value;
    $.post("t2.php",{s1,s2},function(cc){
        document.getElementById("site").innerHTML = cc;
    });
}
function gogo(){
    var s1 = document.getElementById("sel1").value;
    var s2 = document.getElementById("sel2").value;
    var s3 = document.getElementById("sel3").value;
    op('#cover','#cvr','chose.php?seq='+s1+'&date='+s2+'&site='+s3);
}

function lo(x)
{
	location.replace(x)
}
function op(x,y,url)
{
	$(x).fadeIn()
	if(y)
	$(y).fadeIn()
	if(y&&url)
	$(y).load(url)
}
function cl(x)
{
	$(x).fadeOut();
}
</script>
