<?php  
  if(isset($_GET['mvsess'])){
    include_once '_config.php';
    foreach($_GET as $key=>$value){
      $$key=$value;
    }
    $sql="SELECT * FROM `ticket` WHERE `mid`='{$mvid}' and `date`='{$mvdate}' and `sess`='{$mvsess}'";
    $rows=myArr($sql);    
    $chairArr=array();
    foreach($rows as $r){
      $chairArr[]=$r['chair'];
    }
  }
?>
<style type="text/css">
#content {
	width: 310px;
	height: 410px;
}
#chair {
	width: 60px;
	height: 100px;
	display:inline-block;
	float:left;
	background:#F00;	
  margin:1px;
}
</style>
<form action="ticket2c.php" method="post">
<table width="100%" border="0">
  <tr align="center">
    <td>
      <div id="content">
      <?php
        for($i=0;$i<4;$i++){
          for($j=0;$j<5;$j++){
            ?>
              <div id="chair">
              <?php
                if(in_array($i.$j,$chairArr)){
                  ?>
                    <?=$i?>排-<?=$j?>號<br>
                    <img src="assets/03D03.png" alt="">
                  <?php
                }else{
                  ?>
                    <?=$i?>排-<?=$j?>號<br>
                    <img src="assets/03D02.png" alt="">
                    <input type="checkbox" name="chair[]" value="<?=$i.$j?>" onclick="docheck(this)">
                  <?php
                }
              ?>
              </div>
            <?php
          }
        }
      ?>      	
      </div>
      </td>
  </tr>
  <tr>
    <td>
    	<p>電影:<?=$mvname?></p>
      	<p>觀看日期及時刻:<?=$mvdate.' '.$mvsess?></p>
      	<p>電影票數: <span id="qt"></span></p></td>
  </tr>
  <tr>
    <td align="center">
      <input type="hidden" name="mvid" value="<?=$mvid?>">
      <input type="hidden" name="mvname" value="<?=$mvname?>">
      <input type="hidden" name="mvdate" value="<?=$mvdate?>">
      <input type="hidden" name="mvsess" value="<?=$mvsess?>">
    	<input type="button" name="button" id="button" value="上一步" onclick="cl('#cover')"/>
   	  <input type="submit" name="chkout" id="button2" value="訂購" /></td>
  </tr>
</table>

</form>
<script>
  var c=0;limit=4;
  function docheck(obj){
    obj.checked?c++:c--;
    if(c>limit){
      alert('最多只可訂4張');
      obj.checked=false;
      c--;
    }else{
      $('#qt').html(c);
    }
  }
</script>
