<table width="100%" border="0">
  <tr>
    <td colspan="6"><a href="?redo=avvadd"><input type="button" value="新增電影" /></a></td>
  </tr>
  <tr>
    <td width="11%">電影海報</td>
    <td width="50%">片名</td>
    <td width="8%">分級</td>
    <td width="14%">上映日期</td>
    <td width="8%">編輯</td>
    <td width="9%">刪除</td>
  </tr>
  <?php
    $sql="SELECT * FROM `vv` WHERE 1";
    $vv=myArr($sql);
    for($i=0;$i<count($vv);$i++){
      ?>
        <form action="" method="post"><tr>
          <td><img src="imgs/<?=$vv[$i]['pic']?>" width=100></td>
          <td><?=$vv[$i]['name']?></td>
          <td><img src="assets/03C0<?=$vv[$i]['lv']?>.png" width=50></td>
          <td><?=$vv[$i]['ondate']?></td>
          <td><a href="?redo=avvedit&id=<?=$vv[$i]['id']?>"><input type="button" value="編輯電影" /></a></td>
          <td><input type="submit" name="button2" id="button2" value="刪除電影" /></td>
        </tr></form>
      <?php
    }
  ?>
</table>
