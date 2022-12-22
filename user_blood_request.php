<?php
include_once("./database/config.php");

session_start();

$image= $_SESSION['image'];
$username= $_SESSION['username'];
$user_id = $_SESSION['user_id'];

if (!isset($_SESSION['username'])) {
  header("Location: user_login.php");
}

$id = $_GET['id'];

$sql = "SELECT * FROM hospital WHERE hospital_id='$id'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$sched_id=$row['sched_id'];

$sql1 = "SELECT * FROM schedule WHERE sched_id='$sched_id'";
$result1 = mysqli_query($conn, $sql1);
$row1=mysqli_fetch_assoc($result1);

$weekends=$row1['weekends'];
$weekdays=$row1['weekdays'];
$holidays=$row1['holidays'];

if(isset($_POST['submit'])){

  $date = $_POST['date'];
  $urgent = $_POST['urgent'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $blood = $_POST['blood'];

  $query = "SELECT * FROM blood_request WHERE req_user_id = '$user_id' AND blood_group = '$blood'";
  $query_run = mysqli_query($conn, $query);
  if(!$query_run->num_rows > 0){
    $query2 = "INSERT INTO blood_request(`req_user_id`,hospital_id,user_img,hos_img,`user_name`,hos_name,patient_name, `request_date`, `is_urgent`, contact, `blood_group`)
    VALUES ('$user_id','$id','$image',(SELECT `logo` FROM hospital WHERE hospital_id='$id'),'$username', (SELECT hos_name FROM hospital WHERE hospital_id='$id'), '$name', '$date','$urgent', '$phone', '$blood')";
    $query_run2 = mysqli_query($conn, $query2);
            
    if ($query_run2) {

        $cls="success";
        $error = "Thank you for your Request. We will get back to you Soon.";
    } 
    else {
      $cls="danger";
      $error = mysqli_error($conn);
    }
  }else{
    $cls="danger";
    $error = "Request Already Made";
  }


}


?>

<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>Blood Request</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body id="top">

  <!-- Navigation Start -->
  <?php include_once("./templates/user_header.php");?>
  <!-- Navigation end -->

  <section class="appoinment section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="mt-3">
            <div class="col-lg-12">
              <div class="sidebar-widget  gray-bg p-4">
                <h5 class="mb-4">Make Appoinment</h5>

                <ul class="list-unstyled lh-35" style="font-size:14px; font-weight:700">
                  <li class="d-flex justify-content-between align-items-center">
                    <a href="#">Sunday - Thrusday</a>
                    <span><?php echo $weekdays?></span>
                  </li>
                  <li class="d-flex justify-content-between align-items-center">
                    <a href="#">Friday - Saturday</a>
                    <span><?php echo $weekends?></span>
                  </li>
                  <li class="d-flex justify-content-between align-items-center">
                    <a href="#">Holidays</a>
                    <span><?php echo $holidays?></span>
                  </li>
                </ul>

                <div class="sidebar-contatct-info mt-4">
                  <p class="mb-0">Need Urgent Help?</p>
                  <h3 class="text-color-2">+880152-1212122</h3>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-8">
          <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
            <h2 class="mb-2 title-color">Blood Request</h2>
            <p class="mb-4">Mollitia dicta commodi est recusandae iste, natus eum asperiores corrupti qui velit . Iste
              dolorum atque similique praesentium soluta.</p>
            <form id="" class="appoinment-form" method="post" action="">
              <div class="alert alert-<?php echo $cls;?>">
                <?php 
                  if (isset($_POST['submit'])){
                    echo $error;
                  }?>
              </div>
              <div class="row">
                
                <div class="col-lg-6">
                  <div class="form-group">
                    <input name="date" id="date" type="text" class="form-control" placeholder="Date" required>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                  <select name="urgent" id="urgent" class="form-control">
                      <option>Urgent</option>
                      <option value="yes">Yes</option>
                      <option value="no">N0</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <input name="name" id="name" type="text" class="form-control" placeholder="Patient's Name"
                    required>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <input name="phone" id="phone" type="Number" class="form-control" placeholder="Phone Number"
                    required>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <select name="blood" id="blood" class="form-control">
                      <option>Blood Group</option>
                      <option value="A+(ve)">A+(ve)</option>
                      <option value="A-(ve)">A-(ve)</option>
                      <option value="B+(ve)">B+(ve)</option>
                      <option value="B-(ve)">B-(ve)</option>
                      <option value="O+(ve)">O+(ve)</option>
                      <option value="O(ve)">O(ve)</option>
                      <option value="AB+(ve)">AB+(ve)</option>
                      <option value="AB-(ve)">AB-(ve)</option>
                    </select>
                  </div>
                </div>
              </div>


              <button class="btn btn-main btn-round-full" type="submit" name="submit">Request Blood<i
                  class="icofont-simple-right ml-2"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>

  <!-- Footer Start -->
  <?php include_once("./templates/footer.php");?>
  <!-- Footer end -->


  <!-- 
    Essential Scripts
    =====================================-->


  <!-- Main jQuery -->
  <script src="plugins/jquery/jquery.js"></script>
  <!-- Bootstrap 4.3.2 -->
  <script src="plugins/bootstrap/js/popper.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="plugins/counterup/jquery.easing.js"></script>
  <!-- Slick Slider -->
  <script src="plugins/slick-carousel/slick/slick.min.js"></script>
  <!-- Counterup -->
  <script src="plugins/counterup/jquery.waypoints.min.js"></script>

  <script src="plugins/shuffle/shuffle.min.js"></script>
  <script src="plugins/counterup/jquery.counterup.min.js"></script>
  <!-- Google Map -->
  <script src="plugins/google-map/map.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap">
  </script>

  <script src="js/script.js"></script>
  <script src="js/contact.js"></script>

</body>

</html>