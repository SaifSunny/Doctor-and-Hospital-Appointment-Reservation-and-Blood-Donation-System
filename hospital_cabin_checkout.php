<?php
include './database/config.php';

$hid = $_GET['id'];
$hos_id = $_GET['hid'];

$query = "UPDATE hospital_booking SET `status` = '1' WHERE booking_id='$hid'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      $query = "UPDATE hospital SET cabin=cabin+1  WHERE hospital_id='$hos_id'";
      $query_run = mysqli_query($conn, $query);
      if ($query_run) {
      echo "<script> 
      alert('Update Successfull');
      window.location.href='hospital_cabin.php';
      </script>";
      }
      
    } else {
      echo "<script>alert('Cannot Accept the Blood Request');
      window.location.href='hospital_cabin.php';
      </script>";
    }
?>
