<?php
include_once("./database/config.php");

session_start();
$email = $_SESSION['email'];

if (!isset($_SESSION['email'])) {
    header("Location: hospital_login.php");
}

$sql = "SELECT * FROM hospital WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$image = $row['logo'];
$hos_name=$row['hos_name'];
$nid=$row['hospital_reg_id'];
$contact=$row['contact'];
$address=$row['address'];
$city=$row['city'];
$zip=$row['zip'];

if (isset($_POST['submit_img'])) {

    $error = "";
    $cls="";
 
    $name = $_FILES['file']['name'];
    $target_dir = "images/users/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
  
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){

        // Upload file
        if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){

            // Convert to base64 
            $image_base64 = base64_encode(file_get_contents('images/users/'.$name));
            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

            // Update Record
            $query2 = "UPDATE hospital SET `logo`='$name' WHERE email='$email'";
            $query_run2 = mysqli_query($conn, $query2);

            $query3 = "UPDATE `recent` SET `image`='$name' WHERE `name`='$hos_name'";
            $query_run3 = mysqli_query($conn, $query3);

            if ($query_run2 && $query_run3) {
                echo "<script> alert('Profile Image Successfully Updated.');
                window.location.href='hospital_home.php';</script>";
            } 
            else {
                $cls="danger";
                $error = 
                mysqli_error($conn);
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

if (isset($_POST['submit'])) {

    $hos_name = $_POST['hos_name'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $zip=$_POST['zip'];

    $error = "";
    $cls="";

        // Update Record
        $query2 = "UPDATE hospital SET hos_name='$hos_name', contact='$contact',
        `address`='$address', city='$city', zip='$zip' WHERE email='$email'";
        $query_run2 = mysqli_query($conn, $query2);
        
        if ($query_run2) {
            $cls="success";
            $error = "Profile Successfully Updated.";
        } 
        else {
            $cls="danger";
            $error = "Cannot Update Profile";
        }

}


?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
    <meta name="author" content="themefisher.com">

    <title>My Profile</title>

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

    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <h1 class="text-capitalize mb-5 text-lg">Hospital Profile</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <!--  Update Profile -->
        <div style="padding: 30px 0; margin:0 20px;">
            <div class="container">
                <form action="" method="POST" enctype='multipart/form-data'>
                    <div class="row" style="padding-top:30px;">
                        <div class="col-md-4">
                            <div class="card mx-auto"
                                style="text-align:center;padding-top:30px;padding-bottom:50px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                                <h4 class="card-title" style="padding-bottom:20px;">Personal Information</h4>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-12" style="width: 200px; height: 200px;">
                                                <img src="./images/users/<?php echo $image;?>" width="100%"
                                                    height="100%" style="text-align:center; margin-left:60px;">
                                            </div>
                                            <div class="col-md-12" style="padding-top:20px;">
                                                <label for="file" class="form-label">Profile Image</label>
                                                <div class="d-flex justify-content-center"
                                                    style="padding-top:10px; padding-left:30px;">
                                                    <input type="file" name="file" id="file">

                                                </div>

                                                <div class="d-flex justify-content-center" style="padding-top:10px;">
                                                    <button type="submit_img" name="submit_img" class="btn btn-success"
                                                        style="margin-top:10px;"><i class="fa fa-edit"></i> Update
                                                        Image</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card mx-auto"
                                style="text-align:center;padding:50px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                                <h4 class="card-title">My Profile</h4>
                                <div class="card-body" style="padding:0 60px;">


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-<?php echo $cls;?>">
                                                <?php 
                                                    if (isset($_POST['submit']) || isset($_POST['submit_img'])){
                                                        echo $error;
                                                }?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="padding-top:30px">
                                        <div class="col-md-6">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;">Hospital Name</label>
                                                <input type="text" class="form-control" name="hos_name" id="hos_name"
                                                    value="<?php echo $hos_name?>" placeholder="Hospital Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;"> Hospital Regestration ID</label>
                                                <input type="text" class="form-control" name="nid" id="nid"
                                                    value="<?php echo $nid?>" placeholder="Hospital Regestration ID" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;">Contact</label>
                                                <input type="text" class="form-control" name="contact" id="contact"
                                                    value="<?php echo $contact?>" placeholder="Contact" required>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;">Address</label>
                                                <input type="text" class="form-control" name="address" id="address"
                                                    value="<?php echo $address?>" placeholder="Address" required>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;">City</label>
                                                <input type="text" class="form-control" name="city" id="city"
                                                    value="<?php echo $city?>" placeholder="City" required>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;">Zip</label>
                                                <input type="text" class="form-control" name="zip" id="zip"
                                                    value="<?php echo $zip?>" placeholder="Zip" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end" style="padding-top:10px;">
                                        <button type="submit" name="submit" class="btn btn-success"
                                            style="margin-right:10px;"><i class="fa fa-edit"></i> Update</button>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </form>
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