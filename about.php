<?php
	include_once("./database/config.php");
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>About HeathHub</title>

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
<?php include_once("./templates/header.php");?>

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">About Us</span>
          <h1 class="text-capitalize mb-5 text-lg">About Us</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section about-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<h2 class="title-color">Personal care for your healthy living</h2>
			</div>
			<div class="col-lg-8">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, quod laborum alias. Vitae dolorum, officia sit! Saepe ullam facere at, consequatur incidunt, quae esse, quis ut reprehenderit dignissimos, libero delectus.</p>
				<img src="images/about/sign.png" alt="" class="img-fluid">
			</div>
		</div>
	</div>
</section>

<section class="fetaure-page ">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="about-block-item mb-5 mb-lg-0">
					<img src="images/about/about-1.jpg" alt="" class="img-fluid w-100">
					<h4 class="mt-3">Healthcare for Kids</h4>
					<p>Voluptate aperiam esse possimus maxime repellendus, nihil quod accusantium .</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="about-block-item mb-5 mb-lg-0">
					<img src="images/about/about-2.jpg" alt="" class="img-fluid w-100">
					<h4 class="mt-3">Medical Counseling</h4>
					<p>Voluptate aperiam esse possimus maxime repellendus, nihil quod accusantium .</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="about-block-item mb-5 mb-lg-0">
					<img src="images/about/about-3.jpg" alt="" class="img-fluid w-100">
					<h4 class="mt-3">Modern Equipments</h4>
					<p>Voluptate aperiam esse possimus maxime repellendus, nihil quod accusantium .</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="about-block-item">
					<img src="images/about/about-4.jpg" alt="" class="img-fluid w-100">
					<h4 class="mt-3">Qualified Doctors</h4>
					<p>Voluptate aperiam esse possimus maxime repellendus, nihil quod accusantium .</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section team">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section-title text-center">
					<h2 class="mb-4">Meet Our Specialist</h2>
					<div class="divider mx-auto my-4"></div>
					<p>Today`s users expect effortless experiences. Don`t let essential people and processes stay stuck in the past. Speed it up, skip the hassles</p>
				</div>
			</div>
		</div>

		<div class="row">
		<?php
					$sql = "SELECT * FROM doctors WHERE `status`='1' LIMIT 4";
					$result = mysqli_query($conn, $sql);
					
					if($result){
						while($row=mysqli_fetch_assoc($result)){

							$name=$row['firstname'] ." ". $row['lastname'];
							$image=$row['image'];
							$dep_name=$row['dep_name'];
				?>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="team-block mb-5 mb-lg-0">
					<img src="images/users/<?php echo $image?>" alt="" class="img-fluid w-100">

					<div class="content">
						<h4 class="mt-4 mb-0"><a href="doctor-single.html"><?php echo $name?></a></h4>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>    
    
    <script src="js/script.js"></script>
    <script src="js/contact.js"></script>

  </body>
  </html>