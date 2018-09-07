<?php
  include_once '_config.php';
  if($_GET['do']=='getDate'){
    $sql="SELECT `ondate`,datediff(`ondate`,curdate()) as diff from `vv` WHERE id='{$_POST['id']}'";
    $vv=myArr($sql)[0];
    if($vv){
      if($vv['diff']<0){
        for($i=0;$i<3+$vv['diff'];$i++){
          $op=date('Y-m-d',strtotime("+{$i} day"));
          ?><option value="<?=$op?>"><?=$op?></option><?php
        }
      }else{
        for($i=0;$i<3;$i++){
          $op=date('Y-m-d',strtotime($vv['ondate']."+{$i} day"));
          ?><option value="<?=$op?>"><?=$op?></option><?php
        }
      }
    }
  }
  if($_GET['do']=='getSess'){
    $sql="SELECT * FROM `ticket` WHERE `mid`='{$_POST['id']}' and `date`='{$_POST['date']}' ";
    $od=myArr($sql);
    $t=array(0,0,0,0,0);
    foreach($od as $r){
      $r['sess']=="14:00~16:00"?$t[0]+=1:$t[0];
      $r['sess']=="16:00~18:00"?$t[1]+=1:$t[1];
      $r['sess']=="18:00~20:00"?$t[2]+=1:$t[2];
      $r['sess']=="20:00~22:00"?$t[3]+=1:$t[3];
      $r['sess']=="22:00~24:00"?$t[4]+=1:$t[4];
    }
    for($i=0;$i<5;$i++){
      if($_POST['date']>date("Y-m-d")){
        ?><option value="<?=$i*2+14?>:00~<?=$i*2+16?>:00"><?=$i*2+14?>:00~<?=$i*2+16?>:00 剩餘座位 <?=20-$t[$i]?></option><?php
      }else{
        if($i*2+14>date('H')){
          ?><option value="<?=$i*2+14?>:00~<?=$i*2+16?>:00"><?=$i*2+14?>:00~<?=$i*2+16?>:00 剩餘座位 <?=20-$t[$i]?></option><?php
        }
      }      
    }
    // print_r($t);
  }
?>
