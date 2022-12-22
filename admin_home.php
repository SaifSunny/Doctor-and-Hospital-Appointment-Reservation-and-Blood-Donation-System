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

$_SESSION['image'] = $img;
$_SESSION['admin_id'] = $row['admin_id'];
$_SESSION['username'] = $row['username'];
$_SESSION['contact'] = $row['contact'];
$_SESSION['email'] = $row['email'];

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
    <?php include_once("./templates/admin_header.php");?>
    <!-- Navigation end -->

    <section class="home-section" style="padding-bottom: 70px;">
        <div>
            <div class="container">
                <div class="row" style="padding-top:30px;">
                <div class="col-md-3">
                        <div class="card mx-auto"
                            style="text-align:center;padding:30px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                            <h5 class="card-title" style="">Users</h5>
                            <div class="card-body" style="text-align:center; font-size:18px;">
                                <?php
                                    $sql = "SELECT * from users";
                                    $result = mysqli_query($conn, $sql);
                                    $row_cnt = $result->num_rows;
                                ?>
                                <h1><?php echo $row_cnt?></h1>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="card mx-auto"
                            style="text-align:center;padding:30px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                            <h5 class="card-title" style="">Doctors</h5>
                            <div class="card-body" style="text-align:center; font-size:18px;">
                                <?php
                                    $sql = "SELECT * from doctors";
                                    $result = mysqli_query($conn, $sql);
                                    $row_cnt = $result->num_rows;
                                ?>
                                <h1><?php echo $row_cnt?></h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card mx-auto"
                            style="text-align:center;padding:30px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                            <h5 class="card-title" style="">Hospitals</h5>
                            <div class="card-body" style="text-align:center; font-size:18px;">
                                <?php
                                    $sql = "SELECT * from hospital";
                                    $result = mysqli_query($conn, $sql);
                                    $row_cnt = $result->num_rows;
                                ?>
                                <h1><?php echo $row_cnt?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mx-auto"
                            style="text-align:center;padding:30px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                            <h5 class="card-title" style="">Departments</h5>
                            <div class="card-body" style="text-align:center; font-size:18px;">
                                <?php
                                    $sql = "SELECT * from department";
                                    $result = mysqli_query($conn, $sql);
                                    $row_cnt = $result->num_rows;
                                ?>
                                <h1><?php echo $row_cnt?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container">
                <div class="row" style="padding-top:30px;">
                    <div class="col-md-8">
                        <div class="card mx-auto"
                            style="text-align:center;padding:30px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                            <h5 class="card-title" style="padding-bottom:20px;">Doctors</h5>
                            <div class="card-body" style="padding:20px 40px; text-align:left;font-size:18px;">
                                <table class="table">
                                    <thead>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Licence No.</th>
                                        <th>Education</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sql = "SELECT * FROM doctors ORDER BY doc_id DESC LIMIT 10;";
                                        $result = mysqli_query($conn, $sql);
                                        if($result){
                                            while($row=mysqli_fetch_assoc($result)){
                                            
                                                $name=$row['firstname']."  ".$row['lastname'];
                                                $education=$row['education1'].", ".$row['education2'];
                                                $nid=$row['nid'];
                                                $doc_id=$row['doc_id'];
                                                $status=$row['status'];

                                                if($status == 1){
                                                    $type = "success";
                                                    $msg = "Verified";
                                                }else{
                                                    $type = "danger";
                                                    $msg = "Unverified";
                                                }
                                                ?>

                                                <tr>
                                                    <td style="font-size:14px; font-weight:600;"><?php echo $doc_id ?></td>
                                                    <td style="font-size:14px; font-weight:600;"><?php echo $name ?></td>
                                                    <td style="font-size:14px; font-weight:600;"><?php echo $nid ?></td>
                                                    <td style="font-size:14px; font-weight:600;"><?php echo $education ?></td>
                                                    <td style="font-size:14px; font-weight:600;"><button
                                                            style="border-radius: 40px; padding:5px 14px; font-size:10px; font-weight:600"
                                                            class="btn btn-<?php echo $type?>"><?php echo $msg?></button></td>
                                                </tr>
                                                <?php 
                                                    }
                                                }
                                                ?>
                                    </tbody>
                                </table>

                            </div>
                            <div style="text-align:center">
                                <a href="admin_verification.php" style="font-weight:700; margin-top:50px">See All</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mx-auto"
                            style="text-align:center;padding:30px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                            <h5 class="card-title" style="padding-bottom:20px;">Recent Users</h5>
                            <div class="card-body" style="padding:20px 40px; text-align:left;font-size:18px;">
                                <table class="table">
                                    <tbody>
                                        <?php 
                                        $sql = "SELECT DISTINCT `name`, `role`, `image` FROM recent ORDER BY sl DESC LIMIT 8;";
                                        $result = mysqli_query($conn, $sql);
                                        if($result){
                                            while($row=mysqli_fetch_assoc($result)){
                                            
                                                $name=$row['name'];
                                                $image=$row['image'];
                                                $role=$row['role'];

                                                echo '<tr>
                                                <td style="font-size:14px; font-weight:600; "> <img src="./images/users/'.$image.'" style="width:40px;border-radius: 50%;" alt="profile"> <span style="padding-left:20px;">'.$name.'</span></td>
                                                <td style="font-size:14px; font-weight:600; color:#bbb; padding-top:20px;">'.$role.'</td>
                                                </tr>';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div style="text-align:center">
                                <a href="#" style="font-weight:700; margin-top:50px">See All</a>
                            </div>
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