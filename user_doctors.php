<?php
include_once("./database/config.php");

session_start();

$image= $_SESSION['image'];
$username= $_SESSION['username'];
$user_id = $_SESSION['user_id'];

if (!isset($_SESSION['username'])) {
    header("Location: user_login.php");
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
	<meta name="author" content="themefisher.com">

	<title>Doctors List</title>

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

	<!-- Header Start -->
	<?php include_once("./templates/user_header.php");?>


	<!-- portfolio -->
	<section class="section doctors">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h2>Doctors</h2>
						<div class="divider mx-auto my-4"></div>
						<p>We provide a wide range of creative services adipisicing elit. Autem maxime rem modi eaque,
							voluptate. Beatae officiis neque </p>
					</div>
				</div>
			</div>

			<div class="row shuffle-wrapper portfolio-gallery">
				<?php
					$sql = "SELECT * FROM doctors WHERE `status`='1'";
					$result = mysqli_query($conn, $sql);
					
					if($result){
						while($row=mysqli_fetch_assoc($result)){

							$name=$row['firstname'] ." ". $row['lastname'];
							$image=$row['image'];
							$doc_id=$row['doc_id'];
							$dep_name=$row['dep_name'];
				?>
				<div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item"
					data-groups="[&quot;cat1&quot;,&quot;cat2&quot;]">
					<div class="position-relative doctor-inner-box">
						<div class="doctor-profile">
							<div class="doctor-img">
								<img src="images/users/<?php echo $image?>" alt="doctor-image" class="img-fluid w-100">
							</div>
						</div>
						<div class="content mt-3">
							<h4 class="mb-0"><a href="user_doctor_single.php?id=<?php echo $doc_id?>"><?php echo $name?></a></h4>
							<p><?php echo $dep_name?></p>
						</div>
					</div>
				</div>
				<?php
						}
					}
				?>
			</div>
		</div>
	</section>

	<!-- footer Start -->
	<?php include_once("./templates/footer.php");?>

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