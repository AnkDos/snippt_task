<?php
ob_start();
session_start();
$sn = $_SESSION['usr'];
$qer = mysqli_query($conn,"select * from users where sno = '$sn'");
$fet = mysqli_fetch_assoc($qer);
$usern = $fet['usern'];
//print_r($fet);
//$type = "st";
//echo $sn ;
ob_end_flush();
?>

<h1> Hello <?php echo $usern ; ?></h1>
<center>
    <p> Select your slot mate ! </p>
    <select name = "slot">
        
        <option value ="1pm - 2pm">1pm - 2pm </option>
        <option value ="1pm - 2pm">4pm - 5pm </option>
        <option value ="1pm - 2pm">6pm - 7pm </option>
        </select>
        
            <p> Select date ! </p>
             <select name = "date">
                <?php
                 $i = 0;
                 $date = date("d");
                 $month = date("m");
                 $year = date("Y");
                 while($i<=7){
                   $nd = $date."/".$month."/".$year;
                ?>
             
              <option value ="<?php echo $nd; ?>"><?php echo $nd; ?> </option>
              
             <?php
               $date++;
               if($date > 31){
                   $date = 1;
                   $month++;
                   if($month>12){
                       $month = 1;
                       $year++;
                   }
               }
               
               $i++;
               }
             ?>
          </select>
             
        
        </center>