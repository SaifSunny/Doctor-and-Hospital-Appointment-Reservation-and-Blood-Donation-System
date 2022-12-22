<?php
include_once("./database/config.php");

session_start();

$username = $_SESSION['username'];

$sql = "SELECT * FROM doctors WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$img=$row['image'];
$doc_id = $row['doc_id'];

$_SESSION['image'] = $img;
$_SESSION['doc_id'] = $row['doc_id'];
$_SESSION['username'] = $row['username'];

$doc_sched_id=$row['doc_sched_id'];


$sql1 = "SELECT * FROM schedule WHERE sched_id='$doc_sched_id'";
$result1 = mysqli_query($conn, $sql1);
$row1=mysqli_fetch_assoc($result1);

$weekends=$row1['weekends'];
$weekdays=$row1['weekdays'];
$holidays=$row1['holidays'];

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
    <meta name="author" content="themefisher.com">

    <title>Home</title>

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
    <?php include_once("./templates/doc_header.php");?>
    <!-- Navigation end -->

    <section class="home-section" style="padding-bottom: 70px;">
        <div>
            <div class="container">
                <div class="row" style="padding-top:30px;">
                    <div class="col-md-8">
                        <div class="card mx-auto"
                            style="text-align:center;padding:30px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                            <h5 class="card-title" style="padding-bottom:20px;">Appointments</h5>
                            <div class="card-body" style="padding:20px 40px; text-align:left;font-size:18px;">
                            <table class="table">
                                    <tbody>
                                        <thead>
                                            <th>Profile</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Contact</th>
                                            <th></th>

                                        </thead>
                                        <?php 
                                        $sql = "SELECT * FROM appointment WHERE doc_id = '$doc_id' AND `status`=0 LIMIT 10";
                                        $result = mysqli_query($conn, $sql);
                                        if($result){
                                            while($row=mysqli_fetch_assoc($result)){
                                            
                                                $user_image =$row['user_image'];
                                                $aid =$row['appointment_id'];
                                                $user_id =$row['user_id'];
                                                $user_name =$row['user_name'];
                                                $date =$row['date'];
                                                $time =$row['time'];
                                                $contact =$row['contact'];
                                                $status =$row['status'];
                                                
                                                if($status == 1){
                                                    $type = "success";
                                                    $msg = "Completed";
                                                }else{
                                                    $type = "danger";
                                                    $msg = "Pending";
                                                }

                                                echo '<tr>
                                                <td style="font-size:14px; color:black; font-weight:600;"> <img src="./images/users/'.$user_image.'" style="width:40px;border-radius: 50%;" alt="profile"></td>
                                                <td style="font-size:14px; color:black; font-weight:600; ">'.$user_name.'</td>
                                                <td style="font-size:14px; color:black; font-weight:600; ">'.$date.'</td>
                                                <td style="font-size:14px; color:black; font-weight:600; ">'.$time.'</td>
                                                <td style="font-size:14px; color:black; font-weight:600; ">'.$contact.'</td>
                                                <td style="font-size:14px; font-weight:600;">
                                                <button style="border-radius: 40px; padding:5px 14px; font-size:10px; font-weight:600"
                                                class="btn btn-'.$type.'">'.$msg.'</button>
                                                </td>
                                                </tr>';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                            <div style="text-align:center">
                                <a href="doctor_appointment.php" style="font-weight:700; margin-top:50px">See All</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar-widget  gray-bg p-4">
                            <h5 class="mb-4">Appoinment Schedule</h5>

                            <ul class="list-unstyled lh-35" style="font-size:14; font-weight:700">
                                <li class="d-flex justify-content-between align-items-center">
                                    <a href="#">Sunday - Thrusday</a>
                                    <span><?php echo $weekdays?></span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <a href="#">Friday - Saturday</a>
                                    <span ><?php echo $weekends?></span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <a href="#">Holidays</a>
                                    <span><?php echo $holidays?></span>
                                </li>
                            </ul>
                        </div>

                        <div class="card mx-auto"
                            style="text-align:center;padding:30px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                            <h5 class="card-title" style="padding-bottom:20px;">Patients List</h5>
                            <div class="card-body" style="padding:20px 40px; text-align:left;font-size:18px;">

                                <table class="table">
                                    <tbody>
                                        <?php 
                                        $sql = "SELECT DISTINCT user_image, user_name,user_id,`date` FROM appointment WHERE doc_id = '$doc_id' LIMIT 6";
                                        $result = mysqli_query($conn, $sql);
                                        if($result){
                                            while($row=mysqli_fetch_assoc($result)){
                                            
                                                $user_image =$row['user_image'];
                                                $user_id =$row['user_id'];
                                                $user_name =$row['user_name'];
                                                $date =$row['date'];

                                                echo '<tr>
                                                <td style="font-size:14px; color:black; font-weight:600;"> <img src="./images/users/'.$user_image.'" style="width:40px;border-radius: 50%;" alt="profile"></td>
                                                <td style="font-size:14px; color:black; font-weight:600; ">'.$user_name.'</td>
                                                <td style="font-size:14px; color:black; font-weight:600; ">'.$date.'</td>
                                                </tr>';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div style="text-align:center">
                                <a href="doctor_patients.php" style="font-weight:700; margin-top:50px">See All</a>
                            </div>
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