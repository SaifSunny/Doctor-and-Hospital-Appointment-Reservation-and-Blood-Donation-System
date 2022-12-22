<?php
include './database/config.php';

$hid = $_GET['id'];

$query = "DELETE FROM hospital WHERE hospital_id='$hid'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo "<script> 
      alert('Verification Request has been Deleted.');
      window.location.href='admin_hospitals.php';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Delete the verification Request');
      window.location.href='admin_hospitals.php';
      </script>";
    }
?>
