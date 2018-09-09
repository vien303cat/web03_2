
<style>
.rr{
  width:200px;
  height:200px;
  float:left;
  background-color:#F00;
  margin:3px;
}
    </style>
<?php 
$sql = "select * from movie where movie_display = '1' order by movie_desc";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
$row = mysqli_num_rows($c1);

if(!empty($_GET["page"])){
  $nowpage = $_GET["page"];
}else{ $nowpage = 1 ;}
$addpage = 4 ;
$openpage = ($nowpage -1) * $addpage;
$allpage = ceil($row/$addpage);
if($nowpage == 1){
  $fp = 1 ;
  $np = $nowpage + 1 ;
}else if($nowpage == $allpage){
  $fp = $nowpage - 1 ;
  $np = $allpage;
}else{
  $fp = $nowpage - 1 ;
  $np = $nowpage + 1 ;
}


$sql = "select * from movie where movie_display = '1' order by movie_desc limit $openpage,$addpage";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
?>

<div class="rb tab" style="width:95%;height:420px;">
    <?php do{ ?>
      <div class="rr">
    <table width="80%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td colspan="2" align="center" valign="middle">片名:<?=$c2["movie_name"]?></td>
  </tr>
  <tr>
    <td rowspan="2" align="center" width="50%" valign="middle">
      <a href='rdata.php?seq=<?=$c2["movie_seq"]?>'><img src="img/<?=$c2["movie_img"]?>" width="80px" height="80px"></a>
    </td>
    <td align="left" valign="middle">
    <?php if($c2["movie_lv"] == 1){
      $img = "img/03C01.png";
    }else if($c2["movie_lv"] == 2){
      $img = "img/03C02.png";
    }else if($c2["movie_lv"] == 3){
      $img = "img/03C03.png";
    }else if($c2["movie_lv"] == 4){
      $img = "img/03C04.png";
    } ?>
    分級:<img src="<?=$img?>" >
    </td>
  </tr>
  <tr>
    <td align="left" valign="middle">上映日期:<?=$c2["movie_date"]?></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><input type="button" value="劇情簡介" onclick="document.location.href='rdata.php?seq=<?=$c2["movie_seq"]?>'"></td>
    <td align="center" valign="middle"><input type="button" value="線上訂票" onclick="document.location.href='tick.php?seq=<?=$c2["movie_seq"]?>'"></td>
  </tr>
</table>
    </div>
    <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>
    <div>
    <a href='index.php?page=<?=$fp?>'> < </a>
    <?php 
    for($i=1;$i<=$allpage;$i++){
      echo "<a href='index.php?page=".$i."'>".$i."</a>";
    }
    ?>
    <a href='index.php?page=<?=$np?>'> > </a>
    </div>
</div>