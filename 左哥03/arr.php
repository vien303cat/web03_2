<?php
  if(isset($_POST['arredit'])){
    if(isset($_POST['id'])){
      for($i=0;$i<count($_POST['id']);$i++){
        $sql="UPDATE `rr` SET `name`='{$_POST['name'][$i]}',`rank`='{$_POST['rank'][$i]}',`ani`='{$_POST['ani'][$i]}',`display`='0' WHERE `id`='{$_POST['id'][$i]}'";
        myAff($sql);
      }
    }
    if (isset($_POST['display'])) {
      for ($i = 0; $i < count($_POST['display']); $i++) {
          $sql = "UPDATE `rr` SET `display`='1' WHERE `id`='{$_POST['display'][$i]}'";
          myAff($sql);
      }
    }
    if (isset($_POST['del'])) {
      for ($i = 0; $i < count($_POST['del']); $i++) {
          $sql = "DELETE FROM `rr` WHERE `id`='{$_POST['del'][$i]}'";
          myAff($sql);
      }
    }
  }
  if(isset($_POST['arradd'])){
    $pic=time().'.'.explode('.',$_FILES['pic']['name'])[1];
    // echo $pic;
    if(copy($_FILES['pic']['tmp_name'],"imgs/{$pic}")){
      $sql="INSERT INTO `rr` VALUES (null, '{$_POST['name']}', '{$pic}', '999', '1', '1')";
      myAff($sql);
    }
  }
?>
<form action="" method="post"><table width="100%" border="0">
  <tr>
    <td colspan="6">預告片清單</td>
  </tr>
  <tr>
    <td width="18%">預告片海報</td>
    <td width="37%">預告片片名</td>
    <td width="16%">預告片排序</td>
    <td width="16%">預告片動畫</td>
    <td width="6%">顯示</td>
    <td width="7%">刪除</td>
  </tr>
  <?php
    $sql="SELECT * FROM `rr` WHERE 1";
    $rr=myArr($sql);
    for($i=0;$i<count($rr);$i++){
?>
  <tr>
    <td>
      <img src="imgs/<?=$rr[$i]['pic']?>" width=50>
      <input type="hidden" name="id[]" value="<?=$rr[$i]['id']?>">
    </td>
    <td><input type="text" name="name[]" value="<?=$rr[$i]['name']?>" /></td>
    <td><input type="text" name="rank[]" value="<?=$rr[$i]['rank']?>" /></td>
    <td><select name="ani[]" id="select">
      <option value="1" <?=$rr[$i]['ani']==1?'selected':'';?>>淡入</option>
      <option value="2" <?=$rr[$i]['ani']==2?'selected':'';?>>縮放</option>
      <option value="3" <?=$rr[$i]['ani']==3?'selected':'';?>>滑出</option>
    </select></td>
    <td><input type="checkbox" name="display[]" value="<?=$rr[$i]['id']?>" <?=$rr[$i]['display']==1?"checked":"";?>/></td>
    <td><input type="checkbox" name="del[]" value="<?=$rr[$i]['id']?>" /></td>
  </tr>
<?php
    }
  ?>

    <tr>
    <td colspan="6" align="center">
    	<input type="submit" name="arredit" id="button" value="編輯確定" />
      <input type="reset" name="button2" id="button2" value="重置" /></td>
  </tr>
</table></form>

<form action="" method="post" enctype="multipart/form-data">
<table width="100%" border="0">
  <tr>
    <td colspan="2">新增預告片</td>
    </tr>
  <tr>
    <td width="13%">預告片海報</td>
    <td width="87%"><input type="file" name="pic" id="fileField" /></td>
  </tr>
  <tr>
    <td>預告片片名</td>
    <td><input type="text" name="name" id="textfield" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" name="arradd" id="button3" value="新增" />
      <input type="reset" name="button3" id="button4" value="重置" /></td>
    </tr>
</table>

</form>
