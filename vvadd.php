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
  $moname = $_FILES["movie"]["name"];
  $imname = $_FILES["img"]["name"];
  $sql = "insert into movie value(NULL,'$name','$long','$date','$fa','$dir','$lv','$moname','$imname','$con','$dis','1')";
  mysqli_query($link,$sql);
  copy($_FILES["movie"]["tmp_name"],"img/".$moname);
  copy($_FILES["img"]["tmp_name"],"img/".$imname);
  echo "<script>document.location.href='admin.php?do=admin&redo=vv'</script>";
}
?>
<form method="post" enctype="multipart/form-data">
<table width="80%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td colspan="2" align="center" style="font-size: 36px">新增電影</td>
  </tr>
  <tr>
    <td width="40%" align="center">片　　名：</td>
    <td align="left"><input type="text" name="name"></td>
  </tr>
  <tr>
    <td width="40%" align="center">分　　級：</td>
    <td align="left">
    <select name="lv">
    <option value="1">普遍級</option>
    <option value="2">輔導級</option>
    <option value="3">保護級</option>
    <option value="4">限制級</option>
    </select>
    </td>
  </tr>
  <tr>
    <td width="40%" align="center">片　　長：</td>
    <td align="left"><input type="text" name="long"></td>
  </tr>
  <tr>
    <td width="40%" align="center">上映日期：</td>
    <td align="left">
    <select name="yy">
    <option value="2018">2018</option>
    <option value="2019">2019</option>
    <option value="2020">2020</option>
    </select>年

    <select name="mm">
    <?php for($i=1;$i<=12;$i++){ ?>
      <option value="<?=$i?>"><?=$i?></option>
    <?php  } ?>
    </select>月
    
    <select name="dd">
    <?php for($i=1;$i<=31;$i++){ ?>
      <option value="<?=$i?>"><?=$i?></option>
    <?php  } ?>
    </select>日
    </td>
  </tr>
  <tr>
    <td width="40%" align="center">發行商：</td>
    <td align="left"><input type="text" name="fa"></td>
  </tr>
  <tr>
    <td width="40%" align="center">導　　演：</td>
    <td align="left"><input type="text" name="dir"></td>
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
    <td align="left"><select name="dis">
    <option value="1">上架</option>
    <option value="0">下架</option>
    </select></td>
  </tr>
  <tr>
    <td width="40%" align="center">劇情簡介：</td>
    <td align="left"><textarea name="con"></textarea></td>
  </tr>
  
  <tr>
    <td colspan="2" align="center"><input type="submit" value="新增">  <input type="reset" value="重置" ></td>
  </tr>
</table>
</form>