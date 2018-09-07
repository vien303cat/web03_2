<?php
include_once "_config.php";
$mid="";
if(isset($_GET['id'])){
  $mid = $_GET['id'];
}
$sql = "SELECT * FROM `vv` WHERE ondate+3 > curdate()";
$vvArr = myArr($sql);
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
  <form id="form1" name="form1" method="post" action="">
    <table width="50%" border="0">
      <tr>
        <td width="21%">電影</td>
        <td width="79%">
        <select name="id" id="mvId" onchange="get_mvDate()">
        <option value="">請選擇</option>
        <?php
          for($i=0;$i<count($vvArr);$i++){
            ?><option value="<?=$vvArr[$i]['id']?>" <?=$vvArr[$i]['id']==$mid?'selected':'';?>><?=$vvArr[$i]['name']?></option><?php
          }
        ?>          
        </select></td>
      </tr>
      <tr>
        <td>日期</td>
        <td><select name="date" id="mvDate"  onchange="get_mvSess()">
          <!-- <option>請選擇</option> -->
        </select></td>
      </tr>
      <tr>
        <td>場次</td>
        <td><select name="sess" id="mvSess">
          <!-- <option>請選擇</option> -->
        </select></td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" name="button" id="button" value="確定" />
          <input type="reset" name="button2" id="button2" value="重置" />
        </td>
        </tr>
    </table>
  </form>
  </div>
  <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
</div>
</body>
</html>
<script>
  var mvid="",mvdate="",mvsess="";
  function get_mvDate(){
    $('#mvDate').html("<option value=''>請選擇日期</option>");
    mvid=$('#mvId').val();
    if(mvid!=''){
      $.post('api.php',{'do':'get_mvDate','id':mvid},function(aa){
        $('#mvDate').append(aa);
      });
    }
  }
  function get_mvSess(){
    $('#mvSess').html("<option value=''>請選擇場次</option>");
    mvdate=$('#mvDate').val();
    if(mvdate!=''){
      $.post('api.php',{'do':'get_mvSess','date':mvdate,'id':mvid},function(bb){
        $('#mvSess').append(bb);
        // alert(bb);
      });
    }
  }
  get_mvDate();
</script>
