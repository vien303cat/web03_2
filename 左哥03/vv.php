<style>
  .vv{
    width: 200px;
    height: 200px;
    display: inline-block;
    background: #000;
    margin: 1px 1px;
  }
</style>

<?php
  $sql="SELECT * FROM `vv` WHERE ondate+3 > curdate() and display=1";
  $vvArr=myArr($sql);
  // print_r(count($vvArr));
  $pi=4;
  $p=1;
  if(isset($_GET['p'])){
    $p=$_GET['p'];
  }
  $start=($p-1)*$pi;
  $end=count($vvArr);
  for($i=$start;$i<$start+$pi;$i++){
    if($i<$end){
?>
    <div class="vv">
    <table width="80%" border="0">
    <tr>
      <td colspan="2" valign="top">片名:<?=$vvArr[$i]['name']?></td>
      </tr>
    <tr>
      <td rowspan="2" valign="top">電影海報
        <a href="vvinfo.php?id=<?=$vvArr[$i]['id']?>"><img src="imgs/<?=$vvArr[$i]['pic']?>" width=90></a>
      </td>
      <td valign="top">分級:</td>
    </tr>
    <tr>
      <td valign="top">上映日期: </td>
    </tr>
    <tr>
      <td valign="top"><a href="vvinfo.php?id=<?=$vvArr[$i]['id']?>"><input type="button" value="劇情簡介" /></a></td>
      <td valign="top"><a href="ticket2a.php?id=<?=$vvArr[$i]['id']?>"><input type="button" value="線上訂票" /></a></td>
    </tr>
  </table>
  </div>
<?php
    }
  }
  $allp=ceil($end/$pi);
  for($i=1;$i<=$allp;$i++){
    ?><a href="?p=<?=$i?>"><?=$i?></a><?php
  }
?>



