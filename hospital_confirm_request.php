<?php
include './database/config.php';
session_start();

$hid = $_GET['id'];
$hos_id = $_SESSION['hospital_id'];

$query = "UPDATE blood_request SET `status` = '1' WHERE request_id='$hid'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo "<script> 
      alert('Blood Request has been Accepted.');
      window.location.href='hospital_blood_request.php';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Accept the Blood Request');
      window.location.href='hospital_blood_request.php';
      </script>";
    }
?>
