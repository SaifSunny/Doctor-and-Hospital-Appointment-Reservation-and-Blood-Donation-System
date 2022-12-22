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

  $from = $_POST['from'];
  $to = $_POST['to'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];

  $query = "SELECT * FROM hospital_booking WHERE user_id = '$user_id' AND patient_name = '$name'";
  $query_run = mysqli_query($conn, $query);
  if(!$query_run->num_rows > 0){
    $query2 = "INSERT INTO hospital_booking(`user_id`,hospital_id,user_img,hos_img,`user_name`,hos_name,patient_name, `book_from`, `book_to`, `book_type`, contact, `msg`)
    VALUES ('$user_id','$id','$image',(SELECT `logo` FROM hospital WHERE hospital_id='$id'),'$username', (SELECT hos_name FROM hospital WHERE hospital_id='$id'), '$name', '$from','$to','icu', '$phone', '$message')";
    $query_run2 = mysqli_query($conn, $query2);
            
    if ($query_run2) {

      $query3 = "UPDATE Hospital SET icu = icu - 1 WHERE hospital_id='$id'";
      $query_run3 = mysqli_query($conn, $query3);

      if($query_run3){
        $cls="success";
        $error = "Booking Confirmed. Please Contact Reception for your Room No.";
      }    else {
        $cls="danger";
        $error = mysqli_error($conn);
      }
    } 
    else {
      $cls="danger";
      $error = mysqli_error($conn);
    }
  }else{
    $cls="danger";
    $error = "Booking Already Confirmed";
  }


}


?>

<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>Book ICU</title>

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
            <h2 class="mb-2 title-color">Book ICU</h2>
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
                    <label for="from"></label>
                    <input name="from" id="from" type="text" class="form-control" placeholder="Book From (dd/mm/yyyy)" required>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                  <label for="from"></label>
                    <input name="to" id="to" type="text" class="form-control" placeholder="Book To (dd/mm/yyyy)" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <input name="name" id="name" type="text" class="form-control" placeholder="Full Name"
                    required>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <input name="phone" id="phone" type="Number" class="form-control" placeholder="Phone Number"
                    required>
                  </div>
                </div>
              </div>
              <div class="form-group-2 mb-4">
                <textarea name="message" id="message" class="form-control" rows="6"
                  placeholder="Your Message"></textarea>
              </div>

              <button class="btn btn-main btn-round-full" type="submit" name="submit">Book ICU<i
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