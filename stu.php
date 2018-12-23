<?php
ob_start();
session_start();
$sn = $_SESSION['usr'];
$type = "st";
echo $sn ;
ob_end_flush();
?>