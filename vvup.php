<?php 
if(!empty($_POST["name"])){
  $name = $_POST["name"];
  $lv = $_POST["lv"];
  $long = $_POST["long"];
  $date = $_POST["yy"]."-".$_POST["mm"]."-".$_POST["dd"];
  $fa = $_POST["fa"];
  $dir = $_POST["dir"];
  $dis = $_POST["dis"];
  $con = $_POST["con"];
  $desc = $_POST["desc"];
  if(!empty($_FILES["movie"]["name"])){
    $moname = $_FILES["movie"]["name"];
    copy($_FILES["movie"]["tmp_name"],"img/".$moname);
    $sql = "update movie set movie_movie = '$moname' where movie_seq='".$_GET["seq"]."'";
    mysqli_query($link,$sql);
  }
  if(!empty($_FILES["img"]["name"])){
    $imname = $_FILES["img"]["name"];
    copy($_FILES["img"]["tmp_name"],"img/".$imname);
    $sql = "update movie set movie_img = '$imname' where movie_seq='".$_GET["seq"]."'";
    mysqli_query($link,$sql);
  }
  
  $sql = "update movie set movie_desc ='$desc',movie_name ='$name',movie_lv ='$lv',movie_long ='$long',movie_date ='$date',movie_fa ='$fa',movie_dir ='$dir',movie_display ='$dis',movie_con ='$con' where movie_seq='".$_GET["seq"]."'";
  mysqli_query($link,$sql);
  echo "<script>document.location.href='admin.php?do=admin&redo=vv'</script>";
}



$sql = "select * from movie where movie_seq = '".$_GET["seq"]."'";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);

$ex  = explode("-",$c2["movie_date"]);
$yy  = $ex[0];
$mm  = $ex[1];
$dd  = $ex[2];
?>
<form method="post" enctype="multipart/form-data">
<table width="80%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td colspan="2" align="center" style="font-size: 36px">修改電影</td>
  </tr>
  <tr>
    <td width="40%" align="center">排　　序：</td>
    <td align="left"><input type="text" name="desc"  value="<?=$c2["movie_desc"]?>"></td>
  </tr>
  <tr>
    <td width="40%" align="center">片　　名：</td>
    <td align="left"><input type="text" name="name" value="<?=$c2["movie_name"]?>"></td>
  </tr>
  <tr>
    <td width="40%" align="center">分　　級：</td>
    <td align="left">
    <select name="lv">
    <option value="1" <?php if($c2["movie_lv"] == 1){ echo "selected"; } ?> >普遍級</option>
    <option value="2" <?php if($c2["movie_lv"] == 2){ echo "selected"; } ?> >輔導級</option>
    <option value="3" <?php if($c2["movie_lv"] == 3){ echo "selected"; } ?> >保護級</option>
    <option value="4" <?php if($c2["movie_lv"] == 4){ echo "selected"; } ?> >限制級</option>
    </select>
    </td>
  </tr>
  <tr>
    <td width="40%" align="center">片　　長：</td>
    <td align="left"><input type="text" name="long" value="<?=$c2["movie_long"]?>"></td>
  </tr>
  <tr>
    <td width="40%" align="center">上映日期：</td>
    <td align="left">
    <select name="yy">
    <option value="2018" <?php if($yy == 2018){ echo "selected"; } ?> >2018</option>
    <option value="2019" <?php if($yy == 2019){ echo "selected"; } ?> >2019</option>
    <option value="2020" <?php if($yy == 2020){ echo "selected"; } ?> >2020</option>
    </select>年

    <select name="mm">
    <?php for($i=1;$i<=12;$i++){ ?>
      <option value="<?=$i?>" <?php if($mm == $i ){ echo "selected"; } ?> ><?=$i?></option>
    <?php  } ?>
    </select>月
    
    <select name="dd">
    <?php for($i=1;$i<=31;$i++){ ?>
      <option value="<?=$i?>" <?php if($dd == $i ){ echo "selected"; } ?> ><?=$i?></option>
    <?php  } ?>
    </select>日
    </td>
  </tr>
  <tr>
    <td width="40%" align="center">發行商：</td>
    <td align="left"><input type="text" name="fa"  value="<?=$c2["movie_fa"]?>"></td>
  </tr>
  <tr>
    <td width="40%" align="center">導　　演：</td>
    <td align="left"><input type="text" name="dir"  value="<?=$c2["movie_dir"]?>"></td>
  </tr>
  <tr>
    <td width="40%" align="center">預告影片：</td>
    <td align="left"><input type="FILE" name="movie"></td>
  </tr>
  <tr>
    <td width="40%" align="center">電影海報：</td>
    <td align="left"><input type="FILE" name="img"></td>
  </tr>
  
  <tr>
    <td width="40%" align="center">顯　　示：</td>
    <td align="left"><select name="dis" >
    <option value="1" <?php if($c2["movie_display"] == 1){ echo "selected"; } ?> >上架</option>
    <option value="0" <?php if($c2["movie_display"] == 0){ echo "selected"; } ?> >下架</option>
    </select></td>
  </tr>
  <tr>
    <td width="40%" align="center">劇情簡介：</td>
    <td align="left"><textarea name="con"  ><?=nl2br($c2["movie_dir"])?></textarea></td>
  </tr>
  
  <tr>
    <td colspan="2" align="center"><input type="submit" value="修改">  <input type="reset" value="重置" ></td>
  </tr>
</table>
</form>