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

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $hos_name = $_POST['hos_name'];
    $hospital_reg_id = $_POST['hospital_reg_id'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];

    $date = date("Y-m-d h:i:s");


    $p = $_POST['password'];
    $error = "";
    $cls="";
 
    $name = $_FILES['file']['name'];
    $target_dir = "images/users/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
  
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    if (strlen($p) > 5) {
    
        $query = "SELECT * FROM hospital WHERE hospital_reg_id = '$hospital_reg_id'";
        $query_run = mysqli_query($conn, $query);
        if (!$query_run->num_rows > 0) {

            $query = "SELECT * FROM hospital WHERE hospital_reg_id = '$hospital_reg_id' AND email = '$email'";
            $query_run = mysqli_query($conn, $query);
            if(!$query_run->num_rows > 0){

                // Check extension
                if( in_array($imageFileType,$extensions_arr) ){

                    // Upload file
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){

                        // Convert to base64 
                        $image_base64 = base64_encode(file_get_contents('images/users/'.$name));
                        $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

                        // Insert record

                        $query2 = "INSERT INTO hospital(hos_name,contact,address,city,zip,email,`password`, hospital_reg_id, join_date, `logo`)
                        VALUES ('$hos_name','$contact','$address','$city','$zip', '$email', '$password', '$hospital_reg_id','$date', '$name')";
                        $query_run2 = mysqli_query($conn, $query2);
            
                        if ($query_run2) {
                            $cls="success";
                            $error = "Hospital Successfully Added.";
                        } 
                        else {
                            $cls="danger";
                            $error = "Cannot save Hospital";
                        }

                    }else{
                        $cls="danger";
                        $error = 'Unknown Error Occurred.';
                    }
                }else{
                    $cls="danger";
                    $error = 'Invalid File Type';
                }
            }
            else{
                $cls="danger";
                $error = "Hospital Already Exists";
            }
            
        }else{
            $cls="danger";
            $error = "Username Already Exists";
        }
    }else{
        $cls="danger";
        $error = 'Password has to be minimum of 6 charecters.';
    }
   
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
    <meta name="author" content="themefisher.com">

    <title>Add Hospital</title>

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
                            <h4 style="padding:30px;">Add Hospital</h4>
                            <div class="card-body text-center" style="padding:0 60px;">
                                <form action="" method="POST" enctype='multipart/form-data'>
                                    <div class="alert alert-<?php echo $cls;?>">
                                        <?php 
                                            if (isset($_POST['submit'])){
                                               echo $error;
                                            }?>
                                    </div>

                                    <div class="row" style="padding-bottom:30px;">
                                        <div class="col-md-3" style="width: 200px; height: 200px;">
                                            <img src="./images/users/default.png" width="200px" height="170px"
                                                style="text-align:center; margin-left:60px;">
                                        </div>
                                        <div class="col-md-9" style="padding-top:20px;">
                                            <div class="d-flex justify-content-center"
                                                style="padding-top:10px;padding-left:30px; margin-top:30px">
                                                <input type="file" name="file" id="file" style="padding-top:15px;">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row" style="padding-top:20px;">
                                        <div class="col-md-12">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;">Hospital Name</label>
                                                <input type="text" class="form-control" name="hos_name" id="hos_name"
                                                    placeholder="Hospital Name">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;">Address</label>
                                                <input type="text" class="form-control" name="address" id="address"
                                                    placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;">City</label>
                                                <input type="text" class="form-control" name="city" id="city"
                                                    placeholder="City">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;">Zip</label>
                                                <input type="text" class="form-control" name="zip" id="zip"
                                                    placeholder="Zip">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;">Contact</label>
                                                <input type="text" class="form-control" name="contact" id="contact"
                                                    placeholder="Contact">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;">Email</label>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    placeholder="Email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="padding-top:30px;">
                                    <div class="col-md-6">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;">Hospital Licence No.</label>
                                                <input type="text" class="form-control" name="hospital_reg_id" id="hospital_reg_id"
                                                    placeholder="Hospital Licence No.">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;">Password</label>
                                                <input type="text" class="form-control" name="password" id="password"
                                                    placeholder="Password">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="d-flex justify-content-end" style="padding-top:20px;">
                                        <button type="submit" name="submit" class="btn btn-success"
                                            style="margin-right:10px;"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;Add
                                            Hospital</button>
                                        <a href="admin_hospitals.php" class="btn btn-primary">Go Back</a>
                                    </div>
                                </form>
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