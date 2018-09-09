<?php 
include_once("head.php");

$sql = "DELETE FROM movie where movie_seq = '".$_GET["seq"]."'";
mysqli_query($link,$sql);
echo "<script>document.location.href='admin.php?do=admin&redo=vv'</script>";
?>