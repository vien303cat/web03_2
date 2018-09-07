<?php
  if(isset($_POST['login'])){
    if($_POST['acc']=='admin' && $_POST['pw']=='1234'){
      $_SESSION['admin']='admin';
      header('location:admin.php');
    }else{
      ?><script>alert('帳號密碼錯誤')</script><?php
    }
  }
?>
<form action="" method="post">
<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>帳號</td>
    <td><input type="text" name="acc" id="textfield" /></td>
  </tr>
  <tr>
    <td>密碼</td>
    <td><input type="text" name="pw" id="textfield2" /></td>
  </tr>
  <tr>
    <td><input type="submit" name="login" id="button" value="登入" />
      <input type="reset" name="button2" id="button2" value="取消" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
