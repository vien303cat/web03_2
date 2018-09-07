<?php
$sql = "SELECT * FROM `vv` WHERE id='{$_GET['id']}'";
$vv = myArr($sql)[0];
// print_r($vv);
if(isset($_POST['avvedit'])){
  foreach ($_POST as $key => $value) {
      $$key = $value;
  }
  if(isset($_FILES['pic'])){
    copy($_FILES['pic']['tmp_name'], "imgs/{$vv['pic']}");    
  }
  if(isset($_FILES['video'])){
    copy($_FILES['video']['tmp_name'], "imgs/{$vv['video']}");    
  }
  $sql="UPDATE `vv` SET `name`='{$name}',`lv`='{$lv}',`length`='{$length}',`ondate`='{$ondate}',`supplier`='{$supplier}',`director`='{$director}',`video`='{$vv['video']}',`pic`='{$vv['pic']}',`info`='{$info}',`display`='{$display}',`rank`='{$rank}' WHERE `id`='{$vv['id']}'";
  myAff($sql);
  header('location:admin.php?redo=avv');
}
?>
<form action="" method="post" enctype="multipart/form-data">
<table width="100%" border="0">
  <tr>
    <td width="23%">片名</td>
    <td width="77%"><input type="text" name="name" value="<?=$vv['name']?>" /></td>
  </tr>
  <tr>
    <td>分級</td>
    <td><select name="lv" id="select">
      <option value="1" <?=$vv['lv']==1?'selected':'';?>>普遍級</option>
      <option value="2" <?=$vv['lv']==2?'selected':'';?>>輔導級</option>
      <option value="3" <?=$vv['lv']==3?'selected':'';?>>保護級</option>
      <option value="4" <?=$vv['lv']==4?'selected':'';?>>限制級</option>
    </select></td>
  </tr>
  <tr>
    <td>片長</td>
    <td><input type="text" name="length" value="<?=$vv['length']?>" /></td>
  </tr>
  <tr>
    <td>上映日</td>
    <td><input type="date" name="ondate" value="<?=$vv['ondate']?>" /></td>
  </tr>
  <tr>
    <td>發行商</td>
    <td><input type="text" name="supplier" value="<?=$vv['supplier']?>" /></td>
  </tr>
  <tr>
    <td>導演</td>
    <td><input type="text" name="director" value="<?=$vv['director']?>" /></td>
  </tr>
  <tr>
    <td>預告影片 ( 視訊檔 )</td>
    <td><input type="file" name="video"/></td>
  </tr>
  <tr>
    <td>電影海報 ( 圖片 )</td>
    <td><input type="file" name="pic" /></td>
  </tr>
  <tr>
    <td>電影簡介</td>
    <td><textarea name="info" id="textarea" cols="45" rows="5" style="margin: 0px; width: 672px; height: 95px;"><?=$vv['info']?></textarea></td>
  </tr>
    <tr>
    <td>顯示</td>
    <td><select name="display" id="select2">
      <option value="1">上檔</option>
      <option value="0">下檔</option>
    </select></td>
  </tr>
    <tr>
    <td>排序</td>
    <td><input type="text" name="rank" value="<?=$vv['rank']?>" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" name="avvedit" id="button" value="送出" />
      <input type="reset" name="button2" id="button2" value="重設" /></td>
    </tr>

</table>

</form>
