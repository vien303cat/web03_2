<?php 

?>
<from method="post">
<table width="80%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td colspan="2" align="center" style="font-size: 36px">新增電影</td>
  </tr>
  <tr>
    <td width="40%" align="center">片　　名：</td>
    <td align="left"><input type="text" name="name"></td>
  </tr>
  <tr>
    <td width="40%" align="center">分　　級：</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td width="40%" align="center">片　　長：</td>
    <td align="left"><input type="text" name="long"></td>
  </tr>
  <tr>
    <td width="40%" align="center">上映日期：</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td width="40%" align="center">發行商：</td>
    <td align="left"><input type="text" name="fa"></td>
  </tr>
  <tr>
    <td width="40%" align="center">導　　演：</td>
    <td align="left"><input type="text" name="dir"></td>
  </tr>
  <tr>
    <td width="40%" align="center">預告影片：</td>
    <td align="left"><input type="FILE" name="movie"></td>
  </tr>
  <tr>
    <td width="40%" align="center">電影海報：</td>
    <td align="left"><input type="FILE" name="img"></td>
  </tr>
  <tr>
    <td width="40%" align="center">劇情簡介：</td>
    <td align="left"><textarea name="con"></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="新增">  <input type="reset" value="重置" ></td>
  </tr>
</table>
</form>