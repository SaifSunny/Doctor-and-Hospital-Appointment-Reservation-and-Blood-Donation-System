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

    <title>My Appointments</title>

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
        <div style="padding: 50px 0; margin:0 20px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mx-auto"
                            style="text-align:center;padding-top:30px;padding-bottom:50px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                            <h4 style="padding:30px;">My Appointments</h4>
                            <div class="card-body text-center" style="padding:0 60px;">
                                <table class="table" style="font-size: 14px;">
                                    <thead>
                                        <th>ID</th>
                                        <th>Profile</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Contact</th>
                                    </thead>

                                    <tbody>
                                    <?php 
                                        $sql = "SELECT * FROM appointment WHERE doc_id = '$doc_id' AND `status`=0";
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

                                                echo '<tr>
                                                <td style="font-size:14px; color:black; font-weight:600; ">'.$aid.'</td>
                                                <td style="font-size:14px; color:black; font-weight:600;"> <img src="./images/users/'.$user_image.'" style="width:40px;border-radius: 50%;" alt="profile"></td>
                                                <td style="font-size:14px; color:black; font-weight:600; ">'.$user_name.'</td>
                                                <td style="font-size:14px; color:black; font-weight:600; ">'.$date.'</td>
                                                <td style="font-size:14px; color:black; font-weight:600; ">'.$time.'</td>
                                                <td style="font-size:14px; color:black; font-weight:600; ">'.$contact.'</td>
                                                <td>
                                                <a href="doctor_complete_appointment.php?id='.$aid.'"style="padding:1px; border-radius:50%"><img src="./images/check.png" alt="" width="30" height="30"></a>
                                                <a href="doctor_cancel_appointment.php?id='.$aid.'"style="padding:1px; border-radius:50%"><img src="./images/trash.png" alt="" width="30" height="30"></a>
                                                <td>
                                                </tr>';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
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