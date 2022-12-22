<?php
include './database/config.php';

$hid = $_GET['id'];

$query = "DELETE FROM donation_request WHERE donation_id='$hid'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo "<script> 
      alert('Donation Request has been Deleted.');
      window.location.href='hospital_donation_request.php';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Delete Donation Request');
      window.location.href='hospital_donation_request.php';
      </script>";
    }
?>
