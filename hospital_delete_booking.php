<?php
include './database/config.php';

$hid = $_GET['id'];

$query = "DELETE FROM hospital_booking WHERE booking_id='$hid'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo "<script> 
      alert('Booking has been Deleted.');
      window.location.href='hospital_cabin.php';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Delete the Booking');
      window.location.href='hospital_cabin.php';
      </script>";
    }
?>
