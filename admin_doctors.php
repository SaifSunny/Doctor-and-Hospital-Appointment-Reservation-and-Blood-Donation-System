<?php
include_once("./database/config.php");

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
}

$username = $_SESSION['username'];

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

    <title>Manage Doctors</title>

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
                            <h4 style="padding:30px;">Manage Doctors</h4>
                            <div class="butt" style="text-align:right; padding-right:70px; padding-bottom:40px;">
                                <a href="admin_add_doctor.php" class="btn btn-success">Add Doctor</a>
                                <a href="admin_verification.php" class="btn btn-primary">Verify Doctor</a>
                            </div>
                            <div class="card-body text-center" style="padding:0 60px;">
                                <table class="table" style="font-size: 14px;">
                                    <thead>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Licence No.</th>
                                        <th>Department</th>
                                        <th>Education</th>
                                        <th>Gender</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </thead>

                                    <tbody>
                                        <?php 
                                            $sql = "SELECT * FROM doctors WHERE `status`='1'";
                                            $result = mysqli_query($conn, $sql);
                                            if($result){
                                                while($row=mysqli_fetch_assoc($result)){
                                                    $name=$row['firstname'] ." ". $row['lastname'];
                                                    $nid=$row['nid'];
                                                    $education=$row['education1']."/ ".$row['education2'];
                                                    $gender=$row['gender'];
                                                    $contact=$row['contact'];
                                                    $dep_name=$row['dep_name'];
                                                    $email=$row['email'];
                                                    $status=$row['status'];
                                                    $image=$row['image'];
                                                    $doc_id=$row['doc_id'];

                                                    if($status == 1){
                                                        $type = "success";
                                                        $msg = "Verified";
                                                    }else{
                                                        $type = "danger";
                                                        $msg = "Unverified";
                                                    }
                                        ?>
                                        <tr>
                                            <td><img src="./images/users/<?php echo $image ?>"
                                                    style="width:40px;border-radius: 50%;" alt="profile"> <span
                                                    style="padding-left:20px;"></span></td>
                                            <td><a href="#"><?php echo $name ?></a></td>
                                            <td><?php echo $nid ?></td>
                                            <td><?php echo $dep_name ?></td>
                                            <td><?php echo $education ?></td>
                                            <td><?php echo $gender ?></td>
                                            <td><?php echo $contact ?></td>
                                            <td><?php echo $email ?></td>
                                            <td style="font-size:14px; font-weight:600;"><button
                                                    style="border-radius: 40px; padding:5px 14px; font-size:10px; font-weight:600"
                                                    class="btn btn-<?php echo $type?>"><?php echo $msg?></button>

                                            </td>
                                            <td><a href="admin_delete_doc_verification.php?id=<?php echo $doc_id ?>"
                                                    style="padding:1px; border-radius:50%"><img src="./images/trash.png"
                                                        alt="" width="30" height="30"></a></td>


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