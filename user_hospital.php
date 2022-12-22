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


?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
    <meta name="author" content="themefisher.com">

    <title>All Hospitals</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <!--  Teacher Table -->
        <div style="padding: 50px 0; margin:0 20px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mx-auto"
                            style="text-align:center;padding-top:30px;padding-bottom:50px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                            <h4 style="padding:30px;">All Hospitals</h4>

                            <div class="card-body text-left" style="padding:0 60px;">
                                <table class="table" style="font-size: 14px;">
                                    <tbody>
                                        <?php 
                                            $sql = "SELECT * FROM hospital WHERE `status`='1' ORDER BY zip";
                                            $result = mysqli_query($conn, $sql);
                                            if($result){
                                                while($row=mysqli_fetch_assoc($result)){
                                                    $name=$row['hos_name'];
                                                    $image=$row['logo'];
                                                    $address=$row['address'].",<br> ".$row['city'].", ".$row['zip'];
                                                    $contact=$row['contact'];
                                                    $email=$row['email'];
                                                    $status=$row['status'];
                                                    $hospital_id=$row['hospital_id'];
                                        ?>
                                        <tr>
                                            <td><img src="./images/users/<?php echo $image ?>" style="width:100px;"
                                                    alt="profile"> <span style="padding-left:20px;"></span></td>
                                            <td><a href="hospital-single.php?hospital_id=<?php echo $hospital_id?>" style="font-size:28px; font-weight:700; ;"><?php echo $name ?></a>
                                                <br><?php echo $contact ?><br>
                                                <?php echo $email ?></td>
                                            <td style="padding-top:20px;font-weight:600"><?php echo $address ?></td>
                                        </tr>
                                        <?php 
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