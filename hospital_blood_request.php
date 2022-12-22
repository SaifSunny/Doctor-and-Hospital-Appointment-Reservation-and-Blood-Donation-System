<?php
include_once("./database/config.php");

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: hospital_login.php");
}

$hos_id = $_SESSION['hospital_id'];

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
    <meta name="author" content="themefisher.com">

    <title>Blood Requests</title>

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
    <?php include_once("./templates/hos_header.php");?>
    <!-- Navigation end -->

    <section class="home-section" style="padding-bottom: 70px;">
        <!--  Teacher Table -->
        <div style="padding: 50px 0; margin:0 20px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mx-auto"
                            style="text-align:center;padding-top:30px;padding-bottom:50px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                            <h4 style="padding:30px;">Blood Requests</h4>
                            <div class="card-body text-center" style="padding:0 60px;">
                                <table class="table" style="font-size: 14px;">
                                    <thead>
                                        <th>ID</th>
                                        <th>Request Date</th>
                                        <th>Patients Name</th>
                                        <th>Blood Group</th>
                                        <th>Urgency</th>
                                        <th></th>
                                        <th>Action</th>
                                    </thead>

                                    <tbody>
                                        <?php 
                                            $sql = "SELECT * FROM blood_request";
                                            $result = mysqli_query($conn, $sql);
                                            if($result){
                                                while($row=mysqli_fetch_assoc($result)){
                                                    $request_id =$row['request_id'];
                                                    $user_name=$row['user_name'];
                                                    $request_date=$row['request_date'];
                                                    $blood_group=$row['blood_group'];
                                                    $is_urgent=$row['is_urgent'];
                                                    $status=$row['status'];

                                        ?>
                                        <tr>
                                            <td><?php echo $request_id ?></td>
                                            <td><?php echo $request_date ?></td>
                                            <td><?php echo $user_name ?></td>
                                            <td><?php echo $blood_group ?></td>
                                            <?php
                                                if($is_urgent==1){
                                                    $emg="True";
                                                }else{
                                                    $emg="Flase";
                                                }
                                                if($status==1){
                                                    $type="success";
                                                    $msg = "Avalible";
                                                }else{
                                                    $type="danger";
                                                    $msg = "Not Avalible";
                                                }
                                            ?>

                                            <td><?php echo $emg ?></td>
                                            <td style="font-size:14px; font-weight:600;"><button
                                                    style="border-radius: 40px; padding:5px 14px; font-size:10px; font-weight:600"
                                                    class="btn btn-<?php echo $type?>"><?php echo $msg?></button>

                                            </td>

                                            <td>
                                                <a href="hospital_confirm_request.php?id=<?php echo $request_id ?>"style="padding:1px; border-radius:50%"><img src="./images/check.png" alt="" width="30" height="30"></a>
                                                <a href="hospital_delete_request.php?id=<?php echo $request_id ?>"style="padding:1px; border-radius:50%"><img src="./images/trash.png" alt="" width="30" height="30"></a>
                                            </td>
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