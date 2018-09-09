<style>
#bb img{
  width:50px;
  height:50px;
}
  </style>

<?php 
$sql = "select * from poster where poster_display = '1' order by poster_desc";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
$row = mysqli_num_rows($c1);
?>
<div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
          <div id='imgtxt' style="text-align:center;width:420px;height:30px;">
          <?=$c2["poster_name"]?>
          </div>
          <div id='imgbig' style="text-align:center;width:420px;height:320px;">
          <img src="img/<?=$c2["poster_img"]?>" height='300px' width='270px'>
          </div>
          <div id="bb" style="height:50px;width:420px;display:inline-block;">
            <img src="img/01E01.jpg" onclick="pp(1)">&nbsp;&nbsp;
            <?php $i=0; do{ ?>
              &nbsp;<img src="img/<?=$c2["poster_img"]?>" class="im" id="ssaa<?=$i?>" onclick="imgcli('<?=$c2["poster_img"]?>','<?=$c2["poster_ani"]?>','<?=$c2["poster_name"]?>')">&nbsp;
            <?php $i++; }while($c2  = mysqli_fetch_assoc($c1)) ?>
            &nbsp;&nbsp;<img src="img/01E02.jpg" onclick="pp(2)">
          </div>
        </div>
      </div>

<?php 
$sql = "select * from poster where poster_display = '1' order by poster_desc";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
$row = mysqli_num_rows($c1);
?>
<script>
  var pic_time=0;
  var pimg = new Array(<?=$row?>) ;
  var ptxt = new Array(<?=$row?>) ;
  var pani = new Array(<?=$row?>) ;  
  <?php $ee = 0; do{ ?>
      pimg[<?=$ee?>] = "<?=$c2["poster_img"]?>";
      ptxt[<?=$ee?>] = "<?=$c2["poster_name"]?>";
      pani[<?=$ee?>] = "<?=$c2["poster_ani"]?>";
<?php $ee++; }while($c2  = mysqli_fetch_assoc($c1)) ?>

  autorun();
  function autorun(){
    imgcli(pimg[pic_time],pani[pic_time],ptxt[pic_time]);
    pic_time++;
    if(pic_time >= <?=$row?>){
      pic_time = 0 ;
    }
    setTimeout("autorun()",5000);
  }

              var nowpage=0,num=<?=$row?>;
							function pp(x)
							{
								var s,t;
								if(x==1&&nowpage-1>=0)
								{nowpage--;}
								if(x==2&&(nowpage+1)<=num - 4)
								{nowpage++;}
								$(".im").hide()
								for(s=0;s<=3;s++)
								{
									t=s*1+nowpage*1;
									$("#ssaa"+t).show()
								}
							}
							pp(1)


  function imgcli(img,ani,txt){
    document.getElementById("imgtxt").innerHTML = txt;
    if(ani == 1){
      $("#imgbig").html("<img src='img/"+img+"'height='300px' class='tt' style='display:none;'>");
      $(".tt").fadeIn(1000);
    }else if(ani == 2){
      $("#imgbig").html("<img src='img/"+img+"'height='300px' width='270px' class='tt' style='display:none;'>");
      $(".tt").slideDown(1000);
    }else if(ani == 3){
      $("#imgbig").html("<img src='img/"+img+"'height='300px' class='tt' style='display:none;'>");
      $(".tt").show(1000);
    }
  }
  </script>
