<?php
	include_once("./database/config.php");

	session_start();

	$image= $_SESSION['image'];
	$username= $_SESSION['username'];
	$user_id = $_SESSION['user_id'];
	
	if (!isset($_SESSION['username'])) {
		header("Location: user_login.php");
	}

	$id = $_GET['id'];

	$sql = "SELECT * FROM doctors WHERE doc_id='$id'";
	$result = mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($result);

	$name=$row['firstname'] ." ". $row['lastname'];
	$image=$row['image'];
	$dep_name=$row['dep_name'];
	$education1=$row['education1'];
	$education2=$row['education2'];
	$year1=$row['year1'];
	$year2=$row['year2'];
	$doc_sched_id=$row['doc_sched_id'];

	$sql1 = "SELECT * FROM schedule WHERE sched_id='$doc_sched_id'";
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

	<title>Doctor Profile</title>

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
	<?php include_once("./templates/user_header.php");?>
	<!-- Navigation end -->

	<section class="section doctor-single">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="doctor-img-block">
						<img src="images/users/<?php echo $image?>" alt="" class="img-fluid w-100">
						<div class="info-block mt-4">
							<h4 class="mb-0"><?php echo $name?></h4>
							<p><?php echo $dep_name?></p>

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
						<h2 class="text-md">Introducing to myself</h2>
						<div class="divider my-4"></div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam tempore cumque voluptate
							beatae quis inventore sapiente nemo, a eligendi nostrum expedita veritatis neque incidunt
							ipsa doloribus provident ex, at ullam. Lorem ipsum dolor sit amet, consectetur adipisicing
							elit. Ipsam, perferendis officiis esse quae, nobis eius explicabo quidem? Officia accusamus
							repudiandae ea esse non reiciendis accusantium voluptates, facilis enim, corrupti eligendi?
						</p>

						<a href="appoinment.php?id=<?php echo $id?>" class="btn btn-main-2 btn-round-full mt-3">Make an Appoinment<i
								class="icofont-simple-right ml-2  "></i></a>
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
						<h3>My Educational Qualifications</h3>
						<div class="divider my-4"></div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<div class="edu-block ">
						<span class="h6 text-muted"><?php echo $year1?> </span>
						<h4 class="mb-3 title-color"><?php echo $education1?></h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi doloremque harum, mollitia,
							soluta maxime porro veritatis fuga autem impedit corrupti aperiam sint, architecto, error
							nesciunt temporibus! Vel quod, dolor aliquam!</p>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="edu-block">
						<span class="h6 text-muted"><?php echo $year2?> </span>
						<h4 class="mb-3 title-color"><?php echo $education2?></h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi doloremque harum, mollitia,
							soluta maxime porro veritatis fuga autem impedit corrupti aperiam sint, architecto, error
							nesciunt temporibus! Vel quod, dolor aliquam!</p>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="section doctor-skills">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<h3>My skills</h3>
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
						<h5 class="mb-4">Make Appoinment</h5>

						<ul class="list-unstyled lh-35">
							<li class="d-flex justify-content-between align-items-center">
								<a href="#">Sunday - Thrusday</a>
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