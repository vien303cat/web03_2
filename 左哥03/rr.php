<style>
  #rr1{
    width: 420px;
    height: 300px;
    background: #000;
  }
  #rr1 #ani{
    width: 250px;
    height: 300px;
    position: absolute;
  }
  #rr1 img{
    width: 250px;
    height: 270px;
  }
  #rr2 img{
    width: 60px;
    height: 100px;
  }
</style>
<?php
  $sql="SELECT * FROM `rr` WHERE display=1";
  $rrArr=myArr($sql);
  $rrJson=json_encode($rrArr);
?>
<div id='rr1'></div>
<div id="rr2">
  <img src="assets/1.jpg" onclick="pp(1)">
  <?php
    for($i=0;$i<count($rrArr);$i++){
      ?>
        <img src="imgs/<?=$rrArr[$i]['pic']?>" id="ssaa<?=$i?>" class="im" onclick="show('<?=$i?>')">
      <?php
    }
  ?>
  <img src="assets/2.jpg" onclick="pp(2)">
</div>
<script>
  var rrObj=<?=$rrJson?>;
  var rrLen=rrObj.length;
  var now=0;
  setInterval("ww()",3000);
  function ww()
  {
  $("#rr1").html("<div id='ani'><img src='imgs/"+rrObj[now]['pic']+"'>"+rrObj[now]['name']+"</div>")
  switch(rrObj[now]['ani']){
    case '2':
      $('#ani').width('0').height('0');
      $('#ani').animate({width:'+=250px',height:'+=270px'},3000);
      break;
    case '1':
      $('#ani').animate({opacity:'0'},3000);
      break;
    case '3':
      $('#ani').animate({left:'500px'},3000);
      break;
  }
  now++;
  if(now>=rrLen)
  now=0;
  }
  ww();
  //___
  var nowpage=0,num=0;
  function pp(x)
  {
  var s,t;
  if(x==1&&nowpage-1>=0)
  {nowpage--;}
  if(x==2&&(nowpage+4)<rrLen)
  {nowpage++;}
  $(".im").hide()
  for(s=0;s<=3;s++)
  {
  t=s*1+nowpage*1;
  $("#ssaa"+t).show()
  }
  }
  pp(1)
  function show(x){
    $("#rr1").html("<div id='ani'><img src='imgs/"+rrObj[x]['pic']+"'>"+rrObj[x]['name']+"</div>")
  }
</script>
