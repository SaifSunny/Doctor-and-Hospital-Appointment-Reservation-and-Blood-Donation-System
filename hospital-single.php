<?php
include_once("./database/config.php");

session_start();
$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    header("Location: user_login.php");
}

$id = $_GET['hospital_id'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);


$sql = "SELECT * FROM hospital WHERE hospital_id='$id'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$name=$row['hos_name'];
$logo=$row['logo'];
$address=$row['address'].",".$row['city'].", ".$row['zip'];
$contact=$row['contact'];
$email=$row['email'];
$hos_sched_id =$row['sched_id'];

$sql1 = "SELECT * FROM schedule WHERE sched_id='$hos_sched_id'";
$result1 = mysqli_query($conn, $sql1);
$row1=mysqli_fetch_assoc($result1);

$weekends=$row1['weekends'];
$weekdays=$row1['weekdays'];
$holidays=$row1['holidays'];
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
	<meta name="author" content="themefisher.com">

	<title>Hospital Profile</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
	<?php include_once("./templates/user_header.php");?>
	<!-- Navigation end -->

	<section class="section doctor-single">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="doctor-img-block">
						<img src="images/team/1.jpg" alt="" class="img-fluid w-100">
						<div class="doctor-img" style="width:95%">
							<img src="images/users/<?php echo $logo?>" alt="doctor-image" class="img-fluid w-100">
						</div>
						<div class="info-block mt-4">
							<h4 class="mb-0" style="font-size:32px;"><?php echo $name?></h4>


							<ul class="list-inline mt-4 doctor-social-links">
								<li class="list-inline-item"><a href="#"><i class="icofont-facebook"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="icofont-twitter"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="icofont-skype"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="icofont-linkedin"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="icofont-pinterest"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-8 col-md-6">
					<div class="doctor-details mt-4 mt-lg-0">
						<h2 class="text-md">Introducing <?php echo $name?></h2>
						<div class="divider my-4"></div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam tempore cumque voluptate
							beatae quis inventore sapiente nemo, a eligendi nostrum expedita veritatis neque incidunt
							ipsa doloribus provident ex, at ullam. Lorem ipsum dolor sit amet, consectetur adipisicing
							elit. Ipsam, perferendis officiis esse quae, nobis eius explicabo quidem? Officia accusamus
							repudiandae ea esse non reiciendis accusantium voluptates, facilis enim, corrupti eligendi?
						</p>
						<p style="color:black;font-weight:600">
							<hr>
							<i class="fa-solid fa-phone"></i>&nbsp;&nbsp;<?php echo $contact?><br>
							<i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;<?php echo $email?><br>
							<hr>
							<i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;<?php echo $address?>

						</p>

					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section doctor-qualification gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="section-title">
						<h3>Our Services</h3>
						<div class="divider my-4"></div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<div class="edu-block ">
						<span class="h6 text-muted">Hospital Services</span>
						<h4 class="mb-3 title-color">Book Cabin</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi doloremque harum, mollitia,
							soluta maxime porro veritatis fuga autem impedit corrupti aperiam sint, architecto, error
							nesciunt temporibus! Vel quod, dolor aliquam!</p>
						<a href="user_book_cabin.php?id=<?php echo $id;?>" class="btn btn-main-2 btn-round-full mt-3">Book a Cabin<i
								class="icofont-simple-right ml-2  "></i></a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="edu-block">
						<span class="h6 text-muted">Hospital Services</span>
						<h4 class="mb-3 title-color">Reserve ICU</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi doloremque harum, mollitia,
							soluta maxime porro veritatis fuga autem impedit corrupti aperiam sint, architecto, error
							nesciunt temporibus! Vel quod, dolor aliquam!</p>
						<a href="user_book_icu.php?id=<?php echo $id;?>" class="btn btn-main-2 btn-round-full mt-3">Reserve ICU<i
								class="icofont-simple-right ml-2  "></i></a>
					</div>
				</div>
			</div>
			<div class="row" style="padding-top:90px">
				<div class="col-lg-6">
					<div class="edu-block ">
						<span class="h6 text-muted">Hospital Services</span>
						<h4 class="mb-3 title-color">Donate Blood</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi doloremque harum, mollitia,
							soluta maxime porro veritatis fuga autem impedit corrupti aperiam sint, architecto, error
							nesciunt temporibus! Vel quod, dolor aliquam!</p>
						<a href="user_donate_request.php?id=<?php echo $id;?>" class="btn btn-main-2 btn-round-full mt-3">Donate Blood<i
								class="icofont-simple-right ml-2  "></i></a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="edu-block">
						<span class="h6 text-muted">Hospital Services</span>
						<h4 class="mb-3 title-color">Request Blood</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi doloremque harum, mollitia,
							soluta maxime porro veritatis fuga autem impedit corrupti aperiam sint, architecto, error
							nesciunt temporibus! Vel quod, dolor aliquam!</p>
						<a href="user_blood_request.php?id=<?php echo $id;?>" class="btn btn-main-2 btn-round-full mt-3">Request Blood<i
								class="icofont-simple-right ml-2  "></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="section doctor-skills">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<h3>About Our Services</h3>
					<div class="divider my-4"></div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In architecto voluptatem alias,
						aspernatur voluptatibus corporis quisquam? Consequuntur, ad, doloribus, doloremque voluptatem at
						consectetur natus eum ipsam dolorum iste laudantium tenetur.</p>
				</div>
				<div class="col-lg-4">
					<div class="skill-list">
						<h5 class="mb-4">Expertise area</h5>
						<ul class="list-unstyled department-service">
							<li><i class="icofont-check mr-2"></i>International Drug Database</li>
							<li><i class="icofont-check mr-2"></i>Stretchers and Stretcher Accessories</li>
							<li><i class="icofont-check mr-2"></i>Cushions and Mattresses</li>
							<li><i class="icofont-check mr-2"></i>Cholesterol and lipid tests</li>
							<li><i class="icofont-check mr-2"></i>Critical Care Medicine Specialists</li>
							<li><i class="icofont-check mr-2"></i>Emergency Assistance</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="sidebar-widget  gray-bg p-4">
						<h5 class="mb-4">Appoinment Schedule</h5>

						<ul class="list-unstyled lh-35">
							<li class="d-flex justify-content-between align-items-center">
								<a href="#">Subday - Thrusday</a>
								<span><?php echo $weekdays?></span>
							</li>
							<li class="d-flex justify-content-between align-items-center">
								<a href="#">Friday - Saturday</a>
								<span><?php echo $weekends?></span>
							</li>
							<li class="d-flex justify-content-between align-items-center">
								<a href="#">Holidays</a>
								<span><?php echo $holidays?></span>
							</li>
						</ul>

						<div class="sidebar-contatct-info mt-4">
							<p class="mb-0">Need Urgent Help?</p>
							<h3 class="text-color-2">+880152-1212122</h3>
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