<?php
ob_start();
session_start();
$sn = $_SESSION['usr'];
$type = "al";
// echo $sn ;

if(isset($_GET['ac'])){
    $del = $_GET['ac'] ;
    $qerz = mysqli_query($conn,"update slots set status='ac' where sno ='$del'");
}

if($_GET['rj']){
    $del = $_GET['rj'] ;
    $qerz = mysqli_query($conn,"update slots set status='rj' where sno ='$del'");
}

ob_end_flush();
?>

<html>
    <head></head>
    <body>
        <h1> Hello , Alumuni </h1>
        <center>
        <table border = "1">
            <p>Displaying only not seen requests. </p>
          <tr>
           <td> Student Name </td>
           <td> Date </td>
           <td> Time Slot </td>
           <td> Accept ? </td>
           <td>Reject ? </td> 
         </tr>    
            <?php
            $qers = mysqli_query($conn,"select * from slots where status = 'NOTS'");
             while($fets = mysqli_fetch_array($qers)){
            ?>
               <tr>
                 <td><?php echo $fets['stun'] ; ?></td>
                 <td><?php echo $fets['slot'] ; ?> </td>
                 <td><?php echo $fets['date'] ; ?> </td>
                 <td> <a href ="?ac=<?php echo  $fets['sno'] ; ?>"> <button type = "button"> Accept  </button> </td>
                 <td> <a href ="?rj=<?php echo $fets['sno'] ; ?>"> <button type = "button"> Reject  </button> </td>
                </tr>
            
            
            <?php
             }
            ?>
                        
        </table>
        
        
        </center>
    </body>
    </html>