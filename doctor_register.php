<?php

include './database/config.php';
error_reporting(0);
date_default_timezone_set("Asia/Dhaka");

session_start();

if (isset($_SESSION['username'])) {
    header("Location: doctor_home.php");
}

if (isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $nid = $_POST['nid'];
    $education1 = $_POST['education1'];
    $education2 = $_POST['education2'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $username = $_POST['username'];
    $email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$p = $_POST['password'];
    $date = date("Y-m-d h:i:s");
    $error = "";
    $cls="danger";

    if ($password == $cpassword) {
            if (strlen($p) > 5) {

                $query = "SELECT * FROM doctors WHERE username = '$username'";
                $query_run = mysqli_query($conn, $query);

                if (!$query_run->num_rows > 0) {
                    $query = "SELECT * FROM doctors WHERE username = '$username' AND email = '$email'";
                    $query_run = mysqli_query($conn, $query);

                    if(!$query_run->num_rows > 0){
                        $query2 = "INSERT INTO doctors(firstname,lastname,nid,education1,education2,gender,contact,username,email,`password`, join_date)
                        VALUES ('$firstname','$lastname','$nid','$education1','$education2','$gender','$contact','$username', '$email', '$password', '$date')";
                        $query_run2 = mysqli_query($conn, $query2);

                        if ($query_run2) {
                            echo "<script>
                            window.location.href='verification.php';
                            </script>";
                            
                        } 
                        else {
                            $error = "Cannot Register";
                        }
                    }
                    else{
                        $error = "Doctor Already Exists";
                    }

                } 
                else {
                    $error = "Username Already Exists";
                }
            } 
            else {
                $error =  "Password has to be minimum of 6 charecters";
            }
    } 
    else {
        $error = 'Passwords did not Matched.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doctor Register</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <!-- Icon Font Css -->
    <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
    <!-- Carousel CSS -->
    <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/register.css">
    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

</head>

<body id="top">

    <section>
        <div class="container">
            <form action="" method="POST" class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
                <div class="alert alert-<?php echo $cls;?>">
                    <?php 
                        if (isset($_POST['submit'])){
                            echo $error;
                    }?>
                </div>
                <div class="row" style="">
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" placeholder="Firstname" name="firstname"
                                value="<?php echo $firstname; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" placeholder="Lastname" name="lastname" value="<?php echo $lastname;?>"
                                required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" placeholder="Licence No." name="nid" value="<?php echo $nid;?>" required>
                        </div>
                    </div>

                </div>
                <div class="row" style="">

                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" placeholder="Graduate" name="education1"
                                value="<?php echo $education1; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" placeholder="Post Graduate" name="education2"
                                value="<?php echo $education2; ?>" required>
                        </div>
                    </div>
                </div>

                <div class="row" style="">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" placeholder="Gender" name="gender" value="<?php echo $gender; ?>"
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" placeholder="Contact" name="contact" value="<?php echo $contact; ?>"
                                required>
                        </div>
                    </div>
                </div>
                <div class="row" style="">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" placeholder="Username" name="username" value="<?php echo $username;?>"
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group" style="padding-top:5px;">
                            <select class="form-control" id="select_dep" name="select_dep" required>
                                <option>-- Select Department --</option>
                                <?php
                                    $br_option = "SELECT * FROM department";
                                    $br_option_run = mysqli_query($conn, $br_option);

                                    if (mysqli_num_rows($br_option_run) > 0) {
                                        foreach ($br_option_run as $row2) {
                                ?>
                                <option value="<?php echo $row2['dep_id']; ?>">
                                    <?php echo $row2['dep_name']; ?> </option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <input type="email" placeholder="Email" name="email" value="<?php echo $email;?>" required>
                </div>

                <div class="row" style="">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="password" placeholder="Password" name="password"
                                value="<?php echo $_POST['password'];?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="password" placeholder="Confirm Password" name="cpassword"
                                value="<?php echo $_POST['cpassword'];?>" required>
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <button name="submit" class="btn">Register</button>
                </div>
                <p class="login-register-text">Have an account? <a href="doctor_login.php">Login Here</a>.</p>
            </form>
        </div>

    </section>

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

    <script src="js/script.js"></script>
    <script src="js/login.js"></script>
    <script src="js/contact.js"></script>

</body>

</html>