<?php 
if(!empty($_POST["rr"])){
    if($_POST["rr"] == 1){
        for($i=0;$i<count($_POST["no"]);$i++){
            $sql ="update poster set poster_display = '0',poster_name = '".$_POST["pname"][$i]."',poster_desc = '".$_POST["desc"][$i]."',poster_ani = '".$_POST["ani"][$i]."' where poster_seq = '".$_POST["no"][$i]."'";
            mysqli_query($link,$sql);
            
        }
        if(!empty($_POST["update"][0])){
            for($i=0;$i<count($_POST["update"]);$i++){
                $sql ="update poster set poster_display = '1' where poster_seq = '".$_POST["update"][$i]."'";
                mysqli_query($link,$sql);
            }    
        }
        if(!empty($_POST["del"][0])){
            for($i=0;$i<count($_POST["del"]);$i++){
                $sql ="DELETE FROM poster where poster_seq = '".$_POST["del"][$i]."'";
                mysqli_query($link,$sql);
            }    
        }
    }else if($_POST["rr"] == 2){
        $ee = explode(".",$_FILES["img"]["name"])[1];
        $imgname = $strtime.".".$ee ;
        $sql = "insert into poster value(NULL,'".$_POST["name"]."','".$imgname."','1','1','1')";
        mysqli_query($link,$sql);   
        copy($_FILES["img"]["tmp_name"],"img/".$imgname);
    }
}
$sql = "select * from poster order by poster_desc ";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
?>


<form method="post" enctype="multipart/form-data">
<table width="100%" border="1" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td colspan="5" align="center" valign="middle"><span style="font-size:36px;">預告片清單</span></td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">預告片海報</td>
    <td width="20%" align="center" valign="middle">預告片片名</td>
    <td width="20%" align="center" valign="middle">預告片排序</td>
    <td width="20%" align="center" valign="middle">預告片動畫<br>1~4</td>
    <td width="20%" align="center" valign="middle">操作</td>
  </tr>
  <?php do{ ?>
  <tr>
    <input type="hidden" value="<?=$c2["poster_seq"]?>" name="no[]">
    <td width="20%" align="center" valign="middle"><img src="img/<?=$c2["poster_img"]?>" width="100px"></td>
    <td width="20%" align="center" valign="middle"><input type="text" value="<?=$c2["poster_name"]?>" name="pname[]"></td>
    <td width="20%" align="center" valign="middle"><input type="text" value="<?=$c2["poster_desc"]?>" name="desc[]"></td>
    <td width="20%" align="center" valign="middle"><input type="text" value="<?=$c2["poster_ani"]?>" name="ani[]"></td>
    <td width="20%" align="center" valign="middle">
    顯示<input type="checkbox" value="<?=$c2["poster_seq"]?>" name="update[]" <?php if($c2["poster_display"] == '1'){ echo "checked"; } ?> >
    <br>
    刪除<input type="checkbox" value="<?=$c2["poster_seq"]?>" name="del[]">
    </td>
  </tr>
  <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>
  <input type="hidden" value="1" name="rr">
  <tr>
    <td colspan="5" align="center" valign="middle"><input type="submit" value="編輯確定"> <input type="reset" value="重置" ></td>
  </tr>
</table>
</form>
<br><br><br><br>


<form method="post" enctype="multipart/form-data">
<table width="90%" border="1" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td colspan="2" align="center" valign="middle"><span style="font-size:36px;">新增預告片海報</span></td>
  </tr>
  <tr>
    <td width="50%" align="center" valign="middle">預告片海報：<input type="file" name="img"></td>
    <td width="50%" align="center" valign="middle">預告片片名：<input type="text" name="name"></td>
  </tr>
  <input type="hidden" value="2" name="rr">
  <tr>
    <td colspan="2" align="center" valign="middle"><input type="submit" value="新增">  <input type="reset" value="重置" ></td>
  </tr>
</table>
</form>