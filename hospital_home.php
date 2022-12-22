<?php
include_once("./database/config.php");

session_start();

$email = $_SESSION['email'];

$sql = "SELECT * FROM hospital WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);


$img=$row['logo'];
$hos_id = $row['hospital_id'];

$_SESSION['image'] = $img;
$_SESSION['hospital_id'] = $row['hospital_id'];



$hos_sched_id=$row['sched_id'];
$icu=$row['icu'];
$cabin=$row['cabin'];


$sql1 = "SELECT * FROM schedule WHERE sched_id='$hos_sched_id'";
$result1 = mysqli_query($conn, $sql1);
$row1=mysqli_fetch_assoc($result1);

$weekends=$row1['weekends'];
$weekdays=$row1['weekdays'];
$holidays=$row1['holidays'];

if (isset($_POST['submit'])) {

    $cabin = $_POST['cabin'];
    $icu=$_POST['icu'];

    $error = "";
    $cls="";

        // Update Record
        $query2 = "UPDATE hospital SET cabin='$cabin', icu='$icu' WHERE email='$email'";
        $query_run2 = mysqli_query($conn, $query2);
        
        if ($query_run2) {
            $cls="success";
            $error = "Capacity Successfully Updated.";
        } 
        else {
            $cls="danger";
            $error = "Cannot Update Capacity";
        }

}


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
    <?php include_once("./templates/hos_header.php");?>
    <!-- Navigation end -->

    <section class="home-section" style="padding-bottom: 70px;">
        <div>
            <div class="container">
                <div class="row" style="padding-top:30px;">
                    <div class="col-md-3">
                        <div class="card mx-auto"
                            style="text-align:center;padding:30px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                            <h5 class="card-title" style="">Doctors</h5>
                            <div class="card-body" style="text-align:center; font-size:18px;">
                                <?php
                                    $sql = "SELECT * from doctors WHERE hos_id = $hos_id";
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
                            <h5 class="card-title" style="">Bookings</h5>
                            <div class="card-body" style="text-align:center; font-size:18px;">
                                <?php
                                    $sql = "SELECT * from hospital_booking WHERE hospital_id = $hos_id ";
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
                            <h5 class="card-title" style="">Blood Donations</h5>
                            <div class="card-body" style="text-align:center; font-size:18px;">
                                <?php
                                    $sql = "SELECT * from blood_request  WHERE hospital_id = $hos_id ";
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
                            <h5 class="card-title" style="">Blood Requests</h5>
                            <div class="card-body" style="text-align:center; font-size:18px;">
                                <?php
                                    $sql = "SELECT * from blood_request  WHERE hospital_id = $hos_id ";
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
                            <h5 class="card-title" style="padding-bottom:20px;">Bookings</h5>
                            <div class="card-body" style="padding:20px 40px; text-align:left;font-size:18px;">
                                <table class="table">

                                    <tbody>
                                        <thead>
                                            <th>ID</th>
                                            <th>Profile</th>
                                            <th>Name</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Contact</th>
                                        </thead>
                                        <?php 
                                        $sql = "SELECT * FROM hospital_booking WHERE hospital_id = '$hos_id' LIMIT 10";
                                        $result = mysqli_query($conn, $sql);
                                        if($result){
                                            while($row=mysqli_fetch_assoc($result)){
                                            
                                                $booking_id =$row['booking_id'];
                                                $user_name=$row['user_name'];
                                                $patient_name=$row['patient_name'];
                                                $user_img=$row['user_img'];
                                                $book_from=$row['book_from'];
                                                $book_to=$row['book_to'];
                                                $status=$row['status'];
                                                $book_type=$row['book_type'];

                                                if($status == 0){
                                                    $type = "danger";
                                                    $msg = "Active";
                                                }else{
                                                    $type = "success";
                                                    $msg = "Checked Out";
                                                }

                                                echo '<tr>
                                                <td style="font-size:14px; color:black; font-weight:600; ">'.$booking_id.'</td>
                                                <td style="font-size:14px; color:black; font-weight:600;"> <img src="./images/users/'.$user_img.'" style="width:40px;border-radius: 50%;" alt="profile"></td>
                                                <td style="font-size:14px; color:black; font-weight:600; ">'.$user_name.'</td>
                                                <td style="font-size:14px; color:black; font-weight:600; ">'.$book_from.'</td>
                                                <td style="font-size:14px; color:black; font-weight:600; ">'.$book_to.'</td>
                                                <td style="font-size:14px; color:black; font-weight:600; ">'.$book_type.'</td>
                                                <td>
                                                <button
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
                            <div style="text-align:center">
                                <a href="" style="font-weight:700; margin-top:50px">See All</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ">

                        <div class="card mx-auto"
                            style="text-align:center;padding:30px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                            <h5 class="card-title" style="padding-bottom:20px;">Hospital Capacity</h5>
                            <div class="card-body" style="padding:20px 40px; text-align:left;font-size:18px;">

                                <table class="table">
                                    <tbody>
                                        <form action="" method="POST">
                                            <div class="row" style="padding-top:30px">
                                                <div class="col-md-12">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px;">Cabin Number</label>
                                                        <input type="text" class="form-control" name="cabin"
                                                            id="cabin" value="<?php echo $cabin?>"
                                                            placeholder="Number of Cabins" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-top:30px">
                                                <div class="col-md-12">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px;">ICU Number</label>
                                                        <input type="text" class="form-control" name="icu"
                                                            id="icu" value="<?php echo $icu?>"
                                                            placeholder="Number of ICUs" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-center" style="padding-top:10px;">
                                                <button type="submit" name="submit" class="btn btn-success"
                                                    style="margin-top:10px;"><i class="fa fa-edit"></i> Update </button>
                                            </div>
                                        </form>
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