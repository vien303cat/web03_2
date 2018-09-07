<?php
if (isset($_POST['avvadd'])) {
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }
    $pic = time() . '.' . explode('.', $_FILES['pic']['name'])[1];
    $video = time() . '.' . explode('.', $_FILES['video']['name'])[1];
    // echo $pic;
    if (copy($_FILES['pic']['tmp_name'], "imgs/{$pic}") && copy($_FILES['video']['tmp_name'], "imgs/{$video}")) {
        $sql = "INSERT INTO vv  VALUES(null, '{$name}', '{$lv}', '{$length}', '{$ondate}', '{$supplier}', '{$director}', '{$video}', '{$pic}', '{$info}', '{$display}', '{$rank}')";
        myAff($sql);
        header('location:admin.php?redo=avv');
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
<table width="100%" border="0">
  <tr>
    <td width="23%">片名</td>
    <td width="77%"><input type="text" name="name" id="textfield" /></td>
  </tr>
  <tr>
    <td>分級</td>
    <td><select name="lv" id="select">
      <option value="1">普遍級</option>
      <option value="2">輔導級</option>
      <option value="3">保護級</option>
      <option value="4">限制級</option>
    </select></td>
  </tr>
  <tr>
    <td>片長</td>
    <td><input type="text" name="length" id="textfield2" /></td>
  </tr>
  <tr>
    <td>上映日</td>
    <td><input type="date" name="ondate" id="textfield3" /></td>
  </tr>
  <tr>
    <td>發行商</td>
    <td><input type="text" name="supplier" id="textfield4" /></td>
  </tr>
  <tr>
    <td>導演</td>
    <td><input type="text" name="director" id="textfield5" /></td>
  </tr>
  <tr>
    <td>預告影片 ( 視訊檔 )</td>
    <td><input type="file" name="video" id="fileField" /></td>
  </tr>
  <tr>
    <td>電影海報 ( 圖片 )</td>
    <td><input type="file" name="pic" id="fileField2" /></td>
  </tr>
  <tr>
    <td>電影簡介</td>
    <td><textarea name="info" id="textarea" cols="45" rows="5" style="margin: 0px; width: 672px; height: 95px;"></textarea></td>
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
    <td><input type="text" name="rank" id="textfield4" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" name="avvadd" id="button" value="送出" />
      <input type="reset" name="button2" id="button2" value="重設" /></td>
    </tr>

</table>

</form>
