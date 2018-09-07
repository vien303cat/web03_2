<?php
  include_once '_config.php';
  if($_POST['do']=='get_mvDate'){
    $sql="SELECT `ondate`,datediff(`ondate`,curdate()) as diff FROM `vv` WHERE id='{$_POST['id']}'";
    $arr=myArr($sql)[0];
    if($arr['diff']<0){
      for($i=0;$i<3+$arr['diff'];$i++){
        $op=date("Y-m-d",strtotime("+{$i} day"));
        ?><option value="<?=$op?>"><?=$op?></option><?php
      }
    }else{
      for($i=0;$i<3;$i++){
        $op=date("Y-m-d",strtotime($arr['ondate']."+{$i} day"));
        ?><option value="<?=$op?>"><?=$op?></option><?php
      }
    }
  }
  if($_POST['do']=='get_mvSess'){
    $sql="select * from ticket where mid='{$_POST['id']}' and date='{$_POST['date']}'";
    $arr=myArr($sql);
    $t=array(0,0,0,0,0);
    if($arr){
      foreach($arr as $r){
        $r['sess']=="14:00~16:00"?$t[0]+=1:$t[0];
        $r['sess']=="16:00~18:00"?$t[1]+=1:$t[1];
        $r['sess']=="18:00~20:00"?$t[2]+=1:$t[2];
        $r['sess']=="20:00~22:00"?$t[3]+=1:$t[3];
        $r['sess']=="22:00~24:00"?$t[4]+=1:$t[4];
      }
    }
    for($i=0;$i<5;$i++){
      ?><option value="<?=$i*2+14?>:00~<?=$i*2+16?>:00"><?=$i*2+14?>:00~<?=$i*2+16?>:00 剩餘座位<?=20-$t[$i]?></option><?php
    }
  }
?>
