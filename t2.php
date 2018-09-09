<?php
include_once("head.php");

for($i=1;$i<=5;$i++){
    $sql = "select * from tick where tick_movieseq = '".$_POST["s1"]."' and tick_date = '".$_POST["s2"]."' and tick_site = '$i'";
    $c1  = mysqli_query($link,$sql);
    $c2 = mysqli_fetch_assoc($c1);
    $row = mysqli_num_rows($c1);
    $chair[$i] = 20 - $row ;
}
$H = date("H",$strtime);
if($_POST["s2"] != $nowday){ ?>
<select id="sel3">
<option value="1">14:00~16:00 剩餘座位:<?=$chair[1]?></option>
<option value="2">16:00~18:00 剩餘座位:<?=$chair[2]?></option>
<option value="3">18:00~20:00 剩餘座位:<?=$chair[3]?></option>
<option value="4">20:00~22:00 剩餘座位:<?=$chair[4]?></option>
<option value="5">22:00~24:00 剩餘座位:<?=$chair[5]?></option>
</select>
<?php }else{ ?>
<select id="sel3">
<?php if($H < 14){ ?> <option value="1">14:00~16:00 剩餘座位:<?=$chair[1]?></option> <?php } ?>
<?php if($H < 16){ ?> <option value="2">16:00~18:00 剩餘座位:<?=$chair[2]?></option> <?php } ?>
<?php if($H < 18){ ?> <option value="3">18:00~20:00 剩餘座位:<?=$chair[3]?></option> <?php } ?>
<?php if($H < 20){ ?> <option value="4">20:00~22:00 剩餘座位:<?=$chair[4]?></option> <?php } ?>
<?php if($H < 22){ ?> <option value="5">22:00~24:00 剩餘座位:<?=$chair[5]?></option> <?php } ?>
</select>
 <?php } ?>
