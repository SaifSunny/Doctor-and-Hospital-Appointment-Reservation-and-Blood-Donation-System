<?php
include './database/config.php';

session_start();

$hid = $_GET['id'];
$hos_id = $_SESSION['hospital_id'];

$query = "DELETE FROM blood_request WHERE request_id='$hid'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo "<script> 
      alert('Request has been Deleted.');
      window.location.href='hospital_blood_request.php';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Delete the Booking');
      window.location.href='hospital_blood_request.php';
      </script>";
    }
?>
