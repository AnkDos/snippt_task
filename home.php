<?php
ob_start();
session_start();
require 'con.php';
if(!isset($_SESSION['usr'])){
    header("Location: index.php");
}

if(isset($_GET['logout'])){
  session_destroy();    
  header("Location: index.php");
}
$sn = $_SESSION['usr'] ;
$qer = mysqli_query($conn,"select type from users where sno='$sn'");
$fet = mysqli_fetch_assoc($qer);
if($fet['type'] == "st"){
    include 'stu.php';
}
if($fet['type'] == "al"){
    include 'alu.php';
}
ob_end_flush();
?>

<a href = "?logout">LOG OUT MATE ? </a>