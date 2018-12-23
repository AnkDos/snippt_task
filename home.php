<?php
ob_start();
session_start();
require 'con.php';
if(!isset($_SESSION['usr'])){
    header("Location: index.php");
}


ob_end_flush();
?>