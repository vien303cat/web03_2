<?php
  $conn=new PDO("mysql:host=127.0.0.1;dbname=wda_3_3;charset=UTF8;","root","");
  date_default_timezone_set("Asia/Taipei");
  session_start();

  function myArr($sql){
    global $conn;
    return $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  }  
  function myAff($sql){
      global $conn;
      return $conn->query($sql)->rowCount();
  }
?>
