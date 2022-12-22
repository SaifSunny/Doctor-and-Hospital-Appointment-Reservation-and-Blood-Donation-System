<?php
include './database/config.php';

$hid = $_GET['id'];


$query = "UPDATE donation_request SET `status` = 1 WHERE donation_id='$hid'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo "<script> 
      alert('Donation Request has been Accepted.');
      window.location.href='hospital_donation_request.php';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Accept the Donation Request');
      window.location.href='hospital_donation_request.php';
      </script>";
    }
?>
