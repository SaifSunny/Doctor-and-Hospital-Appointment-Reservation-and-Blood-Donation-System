<?php

include './database/config.php';
error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: user_home.php");
}

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$p = $_POST['password'];
    $error = "";
    $cls="danger";

    if ($password == $cpassword) {
            if (strlen($p) > 5) {

                $query = "SELECT * FROM users WHERE username = '$username'";
                $query_run = mysqli_query($conn, $query);

                if (!$query_run->num_rows > 0) {
                    $query = "SELECT * FROM users WHERE username = '$username' AND email = '$email'";
                    $query_run = mysqli_query($conn, $query);

                    if(!$query_run->num_rows > 0){
                        $query2 = "INSERT INTO users(username,email,`password`)
                        VALUES ('$username', '$email', '$password')";
                        $query_run2 = mysqli_query($conn, $query2);

                        if ($query_run2) {
                            $_SESSION['username'] = $_POST['username'];
                            echo "<script> alert('Regestration Successfull.');
                            window.location.href='user_profile.php';
                            </script>";
                            
                        } 
                        else {
                            $error = "Cannot Register";
                        }
                    }
                    else{
                        $error = "User Already Exists";
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
    <title>User Login</title>
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
    <link rel="stylesheet" href="css/login.css">
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
                <div class="input-group">
                    <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
                </div>
                <div class="input-group">
                    <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" name="password"
                        value="<?php echo $_POST['password']; ?>" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Confirm Password" name="cpassword"
                        value="<?php echo $_POST['cpassword']; ?>" required>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Register</button>
                </div>
                <p class="login-register-text">Have an account? <a href="user_login.php">Login Here</a>.</p>
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