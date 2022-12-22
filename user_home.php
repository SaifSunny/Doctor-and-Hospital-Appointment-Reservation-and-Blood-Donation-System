<?php
include_once("./database/config.php");

session_start();

$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    header("Location: user_login.php");
}

$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$img=$row['image'];

$_SESSION['image'] = $img;
$_SESSION['user_id'] = $row['user_id'];
$_SESSION['username'] = $row['username'];
$zip = $row['zip'];
$uid = $row['user_id'];
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
    <?php include_once("./templates/user_header.php");?>
    <!-- Navigation end -->

    <section class="home-section" style="padding-bottom: 70px;">
        <div>
            <div class="container">
                <div class="row" style="padding-top:30px;">
                    <div class="col-md-7">
                        <div class="card mx-auto"
                            style="text-align:center;padding:30px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                            <h5 class="card-title" style="padding-bottom:20px;">Near By Hospitals</h5>
                            <div class="card-body" style="padding:20px 40px; text-align:left;font-size:18px;">
                                <table class="table">
                                    <tbody>
                                        <?php 
                                        $sql = "SELECT * FROM hospital WHERE zip = '$zip'";
                                        $result = mysqli_query($conn, $sql);
                                        if($result){
                                            while($row=mysqli_fetch_assoc($result)){
                                            
                                                $hos_name =$row['hos_name'];
                                                $hospital_id =$row['hospital_id'];
                                                $address =$row['address'].",".$row['city'].",".$row['zip'];
                                                $contact =$row['contact'];
                                                $image =$row['logo'];

                                                echo '<tr>
                                                <td style="font-size:14px; color:black; font-weight:600;"> <img src="./images/users/'.$image.'" style="width:40px;border-radius: 50%;" alt="profile"></td>
                                                <td style="font-size:14px; color:black; font-weight:600;  padding-top:20px;"><a href="hospital-single.php?hospital_id='.$hospital_id.'">'.$hos_name.'</a></td>
                                                <td style="font-size:14px; color:black; font-weight:600; padding-top:20px;">'.$address.'</td>
                                                <td style="font-size:14px;  font-weight:600; padding-top:20px;">'.$contact.'</td>
                                                </tr>';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                            <div style="text-align:center">
                                <a href="nearby.php" style="font-weight:700; margin-top:50px">See All</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card mx-auto"
                            style="text-align:center;padding:30px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                            <h5 class="card-title" style="padding-bottom:20px;">My Appointments</h5>
                            <div class="card-body" style="padding:20px 40px; text-align:left;font-size:18px;">
                                <table class="table">
                                    <tbody>
                                        <?php 
                                        $sql = "SELECT * FROM appointment WHERE user_id = '$uid'";
                                        $result = mysqli_query($conn, $sql);
                                        if($result){
                                            while($row=mysqli_fetch_assoc($result)){
                                            
                                                $doc_image =$row['doc_image'];
                                                $doc_name =$row['doc_name'];
                                                $doc_id =$row['doc_id'];
                                                $date =$row['date'];
                                                $time =$row['time'];

                                                echo '<tr>
                                                <td style="font-size:14px; color:black; font-weight:600;"> <img src="./images/users/'.$doc_image.'" style="width:40px;border-radius: 50%;" alt="profile"></td>
                                                <td style="font-size:14px; color:black; font-weight:600; "><a href="user_doctor_single.php?id='.$doc_id.'">'.$doc_name.'</a></td>
                                                <td style="font-size:14px; color:black; font-weight:600;">'.$date.'</td>
                                                <td style="font-size:14px;  font-weight:600;">'.$time.'</td>
                                                </tr>';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div style="text-align:center">
                                <a href="user_appointment.php" style="font-weight:700; margin-top:50px">See All</a>
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