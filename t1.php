<?php
include_once("head.php");

$sql = "select movie_date from movie where movie_seq = '".$_POST["s1"]."'";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
$movday = $c2["movie_date"];

$d1 = strtotime($movday);
$d2 = strtotime($movday."+1day");
$d3 = strtotime($movday."+2day");
$ud1 = date("Y-m-d",$d1);
$ud2 = date("Y-m-d",$d2);
$ud3 = date("Y-m-d",$d3);

if($strtime < $d2){
    $op1 = "<option value=".$ud1.">".$ud1."</option>";
}
if($strtime <= $d2){
    $op2 = "<option value=".$ud2.">".$ud2."</option>";
}
if($strtime <= $d3){
    $op3 = "<option value=".$ud3.">".$ud3."</option>";
}
?>

<select id="sel2" onchange="se2()">
<option>請選擇日期</option>
<?=$op1?>
<?=$op2?>
<?=$op3?>
</slect>