<?php 

if(!empty($_POST["ee"]) && $_POST["ee"] == 1){
    $sql = "DELETE FROM tick where tick_date = '".$_POST["tt"]."'";
    mysqli_query($link,$sql);
    echo "<script>document.location.href='admin.php?do=admin&redo=order'</script>";
}

if(!empty($_POST["ee"]) && $_POST["ee"] == 2){
    $sql = "DELETE FROM tick where tick_movieseq = '".$_POST["tt"]."'";
    mysqli_query($link,$sql);
    echo "<script>document.location.href='admin.php?do=admin&redo=order'</script>";
}

if(!empty($_GET["noseq"])){
    $sql = "DELETE FROM tick where tick_no = '".$_GET["noseq"]."'";
    mysqli_query($link,$sql);
    echo "<script>document.location.href='admin.php?do=admin&redo=order'</script>";
}
?>

<from method="post">
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td colspan="7" align="center" valign="middle">訂單管理</td>
  </tr>
  <tr>
    <td colspan="7" align="left" valign="middle">快速刪除:
    <input type="radio" name="ee" id="e1" value="1">依日期<input id="edate" type="date" name="date">　　
    <input type="radio" name="ee" id="e2" value="2">依電影
    <select id="esel" name="sel">
    <?php
    $sql = "select * from movie";
    $c1  = mysqli_query($link,$sql);
    $c2  = mysqli_fetch_assoc($c1);
    do{ 
        echo "<option value='".$c2["movie_seq"]."'>".$c2["movie_name"]."</option>";
    }while($c2  = mysqli_fetch_assoc($c1)) ?>
    </select>
    <input type="submit" value="刪除" onclick="del()"> 
    </td>
  </tr>
  <tr>
    <td width="13%" align="center" valign="middle">訂單編號</td>
    <td width="13%" align="center" valign="middle">電影名稱</td>
    <td width="13%" align="center" valign="middle">觀看日期</td>
    <td width="13%" align="center" valign="middle">場次時間</td>
    <td width="13%" align="center" valign="middle">訂購數量</td>
    <td width="13%" align="center" valign="middle">訂購位置</td>
    <td width="13%" align="center" valign="middle">操作</td>
  </tr>
  <?php 
  $sql = "select * from tick,movie where tick_movieseq = movie_seq group by tick_no ";
  $c1  = mysqli_query($link,$sql);
  $c2  = mysqli_fetch_assoc($c1);
  do{
  ?>
  <tr>
    <td width="13%" align="center" valign="middle"><?=$c2["tick_no"]?></td>
    <td width="13%" align="center" valign="middle"><?=$c2["movie_name"]?></td>
    <td width="13%" align="center" valign="middle"><?=$c2["tick_date"]?></td>
    <td width="13%" align="center" valign="middle">
    <?php if($c2["tick_site"]==1){
        echo "14:00~16:00";
    }else if($c2["tick_site"]==2){
        echo "16:00~18:00";
    }else if($c2["tick_site"]==3){
        echo "18:00~20:00";
    }else if($c2["tick_site"]==4){
        echo "20:00~22:00";
    }else if($c2["tick_site"]==5){
        echo "22:00~24:00";
    } ?></td>
    <?php 
      $sqll = "select * from tick where tick_no = '".$c2["tick_no"]."' ";
      $cc1  = mysqli_query($link,$sqll);
      $cc2  = mysqli_fetch_assoc($cc1);
      $row = mysqli_num_rows($cc1);
    ?>
    <td width="13%" align="center" valign="middle"><?=$row?></td>
    <td width="13%" align="center" valign="middle">
    <?php do{
        $x =  ceil($cc2["tick_sit"]/5) + 1;
        if($x == 5){ $x = 4;}
        $y =  $cc2["tick_sit"]%5;
        if($y == 0){ $y = 5;}
        echo $x."排".$y."號<br>";
    }while($cc2  = mysqli_fetch_assoc($cc1)) ?>
    </td>
    <td width="13%" align="center" valign="middle">
    <input type="button" value="刪除" onclick="document.location.href='admin.php?do=admin&redo=order&noseq=<?=$c2["tick_no"]?>'">
    </td>
  </tr>
  <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>
</table>
</form>

<script>
function del(){
    var vv = confirm("確定要刪除嗎");
    if(vv == true){
        var ee = document.getElementById("e1").checked;
        if(ee == true){
            var ee = 1;
            var tt = document.getElementById("edate").value; 
            $.post("admin.php?do=admin&redo=order",{ee,tt},function(){
                document.location.href='admin.php?do=admin&redo=order';
            });
        }else{
            var ee = 2;
            var tt = document.getElementById("esel").value; 
            $.post("admin.php?do=admin&redo=order",{ee,tt},function(){
                document.location.href='admin.php?do=admin&redo=order';
            });
        }
    }else{
        alert("沒有刪除");
    }

}
</script>