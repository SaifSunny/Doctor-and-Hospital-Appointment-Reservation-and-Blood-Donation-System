<?php
include_once("./database/config.php");
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>Departments</title>

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
<?php include_once("./templates/header.php");?>

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">All Department</span>
          <h1 class="text-capitalize mb-5 text-lg">Care Department</h1>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="section service-2">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<h2>Award winning patient care</h2>
					<div class="divider mx-auto my-4"></div>
					<p>Lets know moreel necessitatibus dolor asperiores illum possimus sint voluptates incidunt molestias nostrum laudantium. Maiores porro cumque quaerat.</p>
				</div>
			</div>
		</div>

		<div class="row">
				<?php
					$sql = "SELECT * FROM department";
					$result = mysqli_query($conn, $sql);
					
					if($result){
						while($row=mysqli_fetch_assoc($result)){

							$dep_id=$row['dep_id'];
							$image=$row['image'];
							$dep_name=$row['dep_name'];
                            $dep_short_description=$row['dep_short_description'];
                            $dep_full_description=$row['dep_full_description'];
				?>
			<div class="col-lg-4 col-md-6 ">
				<div class="department-block mb-5">
					<img src="images/users/<?php echo $image ?>" alt="" class="img-fluid w-100">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color"><?php echo $dep_name ?></h4>
						<p class="mb-4"><?php echo substr($dep_short_description, 0, 94) ?></p>
						<a href="department-single.php?id=<?php echo $dep_id?>" class="read-more">Learn More  <i class="icofont-simple-right ml-2"></i></a>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>    
    
    <script src="js/script.js"></script>
    <script src="js/contact.js"></script>

  </body>
  </html>