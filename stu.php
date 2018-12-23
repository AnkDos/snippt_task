<?php
ob_start();
session_start();
$sn = $_SESSION['usr'];
$qer = mysqli_query($conn,"select * from users where sno = '$sn'");
$fet = mysqli_fetch_assoc($qer);
$usern = $fet['usern'];

$qs = mysqli_query($conn,"select * from slots where stun = '$usern' AND status='NOTS'");
$count = mysqli_num_rows($qs);

if(isset($_POST['btn'])){
    $sl = $_POST['slot'];
    $dt = $_POST['date'];
    $trig = mysqli_query($conn,"insert into slots values('','$usern','$sl','$dt','NOTS')") ;
    echo "<script>alert('Inserted Sucessfully');</script>";
    
} 


ob_end_flush();
?>

<h1> Hello <?php echo $usern ; ?></h1>
<center>
    <?php
    if($count<2){
        ?>
    <form method = "post">
    <p> Select your slot mate ! </p>
    <select name = "slot">
        
        <option value ="1pm - 2pm">1pm - 2pm </option>
        <option value ="4pm - 5pm">4pm - 5pm </option>
        <option value ="6pm - 7pm">6pm - 7pm </option>
        </select>
        
        
            <p> Select date ! </p>
             <select name = "date">
                <?php
                 $i = 0;
                 $date = date("d");
                 $month = date("m");
                 $year = date("Y");
                 //Prior to 7 days
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
          
            <button type = "submit" name = "btn"> Book ! </button>
          </form>
    
             <?php
    } 
    else{
        echo "<h2> Your 2 bookings are already under review, You can book once accepted or rejected by Alumuni </h2>";
    }
             ?>
        
        <br>
        <h2> Your Other Booking Status : </h2>
            <br><p> <b> rj = REJECTED , ac = ACCEPTED , NOTS = NOT SEEN  </b></p>
        <table border = "1">
            
          <tr>
           <td> Student Name </td>
           <td> Date </td>
           <td> Time Slot </td>
           <td> Status </td> 
         </tr>    
            <?php
            $qers = mysqli_query($conn,"select * from slots where stun = '$usern'");
             while($fets = mysqli_fetch_array($qers)){
            ?>
               <tr>
                 <td><?php echo $fets['stun'] ; ?></td>
                 <td><?php echo $fets['slot'] ; ?> </td>
                 <td><?php echo $fets['date'] ; ?> </td>
                 <td> <?php echo $fets['status'] ; ?> </td>
                </tr>
            
            
            <?php
             }
            ?>
                        
        </table>
        
        
        </center>