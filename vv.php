<?php 



$sql = "select * from movie order by movie_desc";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
?>
<table width="90%" border="0" align="center" cellpadding="5" cellspacing="5">
  <tr>
    <td colspan="5" align="left"><a href='admin.php?do=admin&redo=vvadd'>新增電影</a></td>
  </tr>
  <?php do{ ?>
  <tr>
    <td width="20%" rowspan="3" align="center" valign="middle"><img src="img/<?=$c2["movie_img"]?>" width="100px" height="100px"></td>
    <td width="15%" rowspan="3" align="center" valign="middle">
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
    <td width="20%" align="center" valign="middle">片名:<?=$c2["movie_name"]?></td>
    <td width="20%" align="center" valign="middle">片長:<?=$c2["movie_long"]?></td>
    <td width="25%" align="center" valign="middle">上映時間:<?=$c2["movie_date"]?></td>
  </tr>
  <tr>
    <td colspan="3" align="right" valign="middle">
    排序:<?=$c2["movie_desc"]?>　　　
    <?php if($c2["movie_display"] == 0){
      $dd = "下架";
    }else if($c2["movie_display"] == 1){
      $dd = "上架";
    } ?>
    顯示:<?=$dd?>　　　　　
    <input type="button" value="修改電影" onclick="document.location.href='admin.php?do=admin&redo=vvup&seq=<?=$c2["movie_seq"]?>'">
    <input type="button" value="刪除電影" onclick="document.location.href='vvdel.php?seq=<?=$c2["movie_seq"]?>'">
    </td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="middle">劇情介紹:<?=nl2br($c2["movie_con"])?></td>
  </tr>
  <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>
</table>