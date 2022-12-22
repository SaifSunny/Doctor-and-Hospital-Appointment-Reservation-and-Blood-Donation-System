<?php
include_once("./database/config.php");

session_start();

$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
}

$sql = "SELECT * FROM `admin` WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$img=$row['image'];

$_SESSION['admin_id'] = $row['admin_id'];
$_SESSION['username'] = $row['username'];

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
    <meta name="author" content="themefisher.com">

    <title> Doctor Verification</title>

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
    <?php include_once("./templates/admin_header.php");?>
    <!-- Navigation end -->

    <section class="home-section" style="padding-bottom: 70px;">
        <!--  Teacher Table -->
        <div style="padding: 50px 0; margin:0 20px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mx-auto"
                            style="text-align:center;padding-top:30px;padding-bottom:50px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                            <h4 style="padding:30px;">Doctor Verification Requests</h4>

                            <div class="card-body text-center" style="padding:0 60px;">
                                <table class="table">
                                    <thead>
                                        <th>sl</th>
                                        <th>Name</th>
                                        <th>Licence No.</th>
                                        <th>Education</th>
                                        <th>Gender</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </thead>

                                    <tbody>
                                        <?php 
                                            $sql = "SELECT * FROM doctors WHERE `status`='0'";
                                            $result = mysqli_query($conn, $sql);
                                            if($result){
                                                while($row=mysqli_fetch_assoc($result)){
                                                    $name=$row['firstname'] ." ". $row['lastname'];
                                                    $nid=$row['nid'];
                                                    $doc_id =$row['doc_id'];
                                                    $education=$row['education1']."/ ".$row['education2'];
                                                    $gender=$row['gender'];
                                                    $contact=$row['contact'];
                                                    $email=$row['email'];
                                                    $status=$row['status'];

                                        ?>
                                        <tr>
                                            <td><?php echo $doc_id ?></td>
                                            <td><?php echo $name ?></td>
                                            <td><?php echo $nid ?></td>
                                            <td><?php echo $education ?></td>
                                            <td><?php echo $gender ?></td>
                                            <td><?php echo $contact ?></td>
                                            <td><?php echo $email ?></td>
                                            <td>
                                                <a href="admin_confirm_doc_verification.php?id=<?php echo $doc_id ?>" class="btn btn-success" style="padding:1px; border-radius:50%"><img src="./images/check.png"  alt="" width="25" height="25"></a>
                                                <a href="admin_delete_doc_verification.php?id=<?php echo $doc_id ?>"style="padding:1px; border-radius:50%"><img src="./images/trash.png"  alt="" width="33" height="33"></a>
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