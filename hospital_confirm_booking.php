<?php
include './database/config.php';

$hid = $_GET['id'];

$query = "UPDATE hospital_booking SET `confirmation` = '1' WHERE booking_id='$hid'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo "<script> 
      alert('Booking has been Confirmed.');
      window.location.href='hospital_cabin.php';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Confirm the Booking');
      window.location.href='hospital_cabin.php';
      </script>";
    }
?>
