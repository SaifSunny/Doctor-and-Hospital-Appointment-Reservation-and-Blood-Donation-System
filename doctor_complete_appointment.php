<?php
include './database/config.php';

$did = $_GET['id'];

$query = "UPDATE appointment SET `status` = '2' WHERE appointment_id='$did'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo "<script> 
      alert('Congrats on Completing the Appointment');
      window.location.href='doctor_appointment.php';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Completing Appointment.');
      window.location.href='doctor_appointment.php';
      </script>";
    }
?>
