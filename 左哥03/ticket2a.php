<?php
include_once "_config.php";
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
<style>
#coverr
{
	width:70%;
	min-width:300px;
	max-width:800px;
	height:70%;
	min-height:300px;
	position:absolute;
	z-index:5;
	background:#ffffff;
	top:0px;
	left:0px;
	right:0px;
	bottom:0px;
	margin:auto;
	overflow:auto;
}
</style>
<div id="cover" style="display:none; ">
	<div id="coverr">
    	<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover')">X</a>
        <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
    </div>
</div>
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
    <form id="form1" name="form1" method="post" action="">
    <table width="100%" border="0">
  <tr>
    <td width="15%">電影</td>
    <td width="85%"><select name="mvid" id="mvid" onchange='getDate()'>
      <option value="">請選擇</option>
      <?php
        $mvid="";
        if(isset($_GET['id'])){
          $mvid=$_GET['id'];
        }
        $sql="SELECT * FROM `vv` WHERE ondate+3 > curdate() and display=1";
        $vv=myArr($sql);
        for($i=0;$i<count($vv);$i++){
          ?><option value="<?=$vv[$i]['id']?>" <?=$vv[$i]['id']==$mvid?'selected':'';?>><?=$vv[$i]['name']?></option><?php
        }
      ?>
    </select></td>
  </tr>
  <tr>
    <td>日期</td>
    <td><select name="mvdate" id="mvdate" onchange='getSess()'>
      <!-- <option value="">請選擇</option> -->
    </select></td>
  </tr>
  <tr>
    <td>場次</td>
    <td><select name="mvsess" id="mvsess">
      <!-- <option value="">請選擇</option> -->
    </select></td>
  </tr>
  <tr>
    <td colspan="2">
      <input type="button" name="button" id="button" value="確定" onclick="op('#cover','#cvr','ticket2b.php')"/>
      <input type="reset" name="button2" id="button2" value="重設" /></td>
    </tr>
</table>
    </form>

  </div>
  <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
</div>
</body>
</html>
<script>
  var mvid="",mvdate="",mvsess="",mvname="";
  function getDate(){
    $('#mvdate').html('<option value="">請選擇</option>');
    $('#mvsess').html('<option value="">請選擇</option>');
    mvid=$('#mvid').val();
    $.post('ajax.php?do=getDate',{'id':mvid},function(aa){
      $('#mvdate').append(aa);
    });
  }
  function getSess(){
    $('#mvsess').html('<option value="">請選擇</option>');
    mvdate=$('#mvdate').val();
    $.post('ajax.php?do=getSess',{'id':mvid,'date':mvdate},function(bb){
      $('#mvsess').append(bb);
    });
  }
  getDate();
  function op(x,y,url)
  {
    mvsess=$('#mvsess').val();
    mvname=$('#mvid').find(':selected').text();
    if(mvsess==""){
      alert('不可為空');
      return false;
    }
    $(x).fadeIn()
    if(y)
    $(y).fadeIn()
    if(y&&url)
    $(y).load(url+"?mvid="+mvid+"&mvdate="+mvdate+"&mvsess="+mvsess+"&mvname="+mvname)
  }
  function cl(x)
  {
    $(x).fadeOut();
  }
</script>
