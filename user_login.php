<?php

include './database/config.php';
error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: user_home.php");
}

if (isset($_POST['submit'])) {

    $error = "";
    $cls="danger";

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($conn, $sql);

	if ($result->num_rows > 0) {

        $sql = "SELECT * FROM users WHERE `password`='$password'";
        $result = mysqli_query($conn, $sql);
    
        if ($result->num_rows > 0) {
            $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = mysqli_query($conn, $sql);
        
            if ($result->num_rows > 0) {
                $_SESSION['username'] = $_POST['username'];

                $sql = "INSERT INTO recent(`image`, `name`, `role`) VALUES ((SELECT `image` FROM users WHERE username='$username'), '$username', 'User')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    header("Location: user_home.php");
                }
                
            } else {
                $error="Woops! Someting Went Wrong.";
            }
    
        } else {
            $error= "Woops! Password is Incorrect.";
        }

	} else {
		$error= "Woops! Username is Incorrect.";
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
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
                <div class="alert alert-<?php echo $cls;?>">
                    <?php 
                        if (isset($_POST['submit'])){
                            echo $error;
                        }
                    ?>
                </div>
                <div class="input-group">
                    <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Login</button>
                </div>
                <p class="login-register-text">Don't have an account? <a href="user_register.php">Register Here</a>.</p>
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