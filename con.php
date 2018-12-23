<?php
 define('DBHOST', 'localhost');
 define('DBUSER', '');
 define('DBPASS', '');
 define('DBNAME', '');
 $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
 if ( !$conn ) {
  die("Connection failed");
 }
?>


