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
$uid = $row['user_id'];

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
    <meta name="author" content="themefisher.com">

    <title>User Requests</title>

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
                    <div class="col-md-6">
                        <div class="card mx-auto"
                            style="text-align:center;padding:30px;padding-bottom:50px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                            <h4 style="padding:30px;">Blood Requests</h4>
                            <table class="table">
                                    <tbody>
                                    <?php 
                                        $sql = "SELECT * FROM blood_request WHERE req_user_id = '$uid'";
                                        $result = mysqli_query($conn, $sql);
                                        if($result){
                                            while($row=mysqli_fetch_assoc($result)){
                                            
                                                $hos_name =$row['hos_name'];
                                                $hos_img =$row['hos_img'];
                                                $blood_group =$row['blood_group'];
                                                $status =$row['status'];
                                                $request_date =$row['request_date'];

                                                if($status == 1){
                                                    $type = "success";
                                                    $msg = "Accepted";
                                                }else{
                                                    $type = "danger";
                                                    $msg = "Not Accepted";
                                                }

                                                echo '<tr>
                                                <td style="font-size:14px; color:black; font-weight:600;"> <img src="./images/users/'.$hos_img.'" style="width:40px;border-radius: 50%;" alt="profile"></td>
                                                <td style="font-size:14px; color:black; font-weight:600; ">'.$hos_name.'</td>
                                                <td style="font-size:14px; color:black; font-weight:600;">'.$request_date.'</td>
                                                <td style="font-size:14px;  font-weight:600;">'.$blood_group.'</td>
                                                <td style="font-size:14px; font-weight:600;"><button
                                                    style="border-radius: 40px; padding:5px 14px; font-size:10px; font-weight:600"
                                                    class="btn btn-'.$type.'">'.$msg.'</button>

                                                </td>
                                                </tr>';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>      
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mx-auto"
                            style="text-align:center;padding:30px;padding-bottom:50px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                            <h4 style="padding:30px;">Donation Requests</h4>
                            <table class="table">
                                    <tbody>
                                    <?php 
                                        $sql = "SELECT * FROM donation_request WHERE user_id = '$uid'";
                                        $result = mysqli_query($conn, $sql);
                                        if($result){
                                            while($row=mysqli_fetch_assoc($result)){
                                            
                                                $hos_name =$row['hos_name'];
                                                $hos_img =$row['hos_img'];
                                                $address =$row['address'];
                                                $blood_group =$row['blood_group'];
                                                $status =$row['status'];

                                                if($status == 1){
                                                    $type = "success";
                                                    $msg = "Accepted";
                                                }else{
                                                    $type = "danger";
                                                    $msg = "Not Accepted";
                                                }

                                                echo '<tr>
                                                <td style="font-size:14px; color:black; font-weight:600;"> <img src="./images/users/'.$hos_img.'" style="width:40px;border-radius: 50%;" alt="profile"></td>
                                                <td style="font-size:14px; color:black; font-weight:600; ">'.$hos_name.'</td>
                                                <td style="font-size:14px; color:black; font-weight:600;">'.$address.'</td>
                                                <td style="font-size:14px;  font-weight:600;">'.$blood_group.'</td>
                                                <td style="font-size:14px; font-weight:600;"><button
                                                    style="border-radius: 40px; padding:5px 14px; font-size:10px; font-weight:600"
                                                    class="btn btn-'.$type.'">'.$msg.'</button>

                                                </td>
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