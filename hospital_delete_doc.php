<?php
include './database/config.php';

$did = $_GET['id'];

$query = "DELETE FROM doctors WHERE doc_id='$did'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo "<script> 
      alert('Doctor has been Deleted.');
      window.location.href='hospital_doctors.php';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Delete Doctor');
      window.location.href='hospital_doctors.php';
      </script>";
    }
?>
