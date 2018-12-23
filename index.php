<?php
ob_start();
session_start();
require 'con.php';
if(isset($_POST['btn'])){
$uname = $_POST['uname'];
$pass = $_POST['pass'];
$qer = mysqli_query($conn,"select * from users where usern='$uname'");
$fet = mysqli_fetch_assoc($qer);
if($uname == $fet['usern'] && $pass == $fet['pass']){
     header("Location: home.php");
}
else{
     echo "<script>alert('wrong creds mate !')</script>";
}
} 
ob_end_flush();
?>
<center>
    <h1>Please login to continue </h1><br>
<form method = "post">    
     
    <input type = "text" name = "uname" placeholder = "username"/><br> 
    <input type = "password" name = "pass" placeholder = "password"/><br>
    <button type = "submit" name = "btn">Login !</button><br> 
</form>
</center>