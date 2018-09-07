<table width="100%" border="0">
  <tr>
    <td colspan="7">快速刪除
      <input type="radio" name="radio" id="radio" value="radio" />
      依日期
    <input type="text" name="textfield" id="textfield" />
    <input type="radio" name="radio" id="radio2" value="radio" />
      依電影
      <select name="select" id="select">
        <option value="">請選擇電影</option>
    </select>      <input type="submit" name="button2" id="button2" value="刪除" /></td>
  </tr>
  <tr>
    <td width="12%">訂單編號</td>
    <td width="12%">電影名稱</td>
    <td width="18%">觀看日期</td>
    <td width="20%">場次時間</td>
    <td width="17%">訂購數量</td>
    <td width="11%">訂購位置</td>
    <td width="10%">&nbsp;</td>
  </tr>
  <?php
    $sql="SELECT * FROM `ticket` ORDER BY `ticket`.`no` ASC";
    $order=myArr($sql);
    // print_r($order);
    // for($i;$i;$i;)
  ?>
<form action="" method="post">  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="刪除" /></td>
  </tr></form>
</table>
