<?php
include_once("./database/config.php");

$username = $_SESSION['username'];

$sql = "SELECT * FROM admin WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$img=$row['image'];

$imag= $row['image'];
$username= $_SESSION['username'];

?>

<!-- Navigation Start -->
<header>
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="mailto:support@healthhub.com"><i
									class="icofont-support-faq mr-2"></i>support@healthhub.com</a></li>
					</ul>
				</div>
				<div class="col-lg-6">
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
						<a href="tel:+880152-1212122">
							<span>Call Now : </span>
							<span class="h4">+880152-1212122</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
			<a class="navbar-brand" href="user_home.php"><img src="images/logo.png" alt="" class="img-fluid"></a>

			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
				aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
				<span class="icofont-navigation-menu"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarmain">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a class="nav-link" href="admin_home.php">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="admin_doctors.php">Doctors</a></li>
					<li class="nav-item"><a class="nav-link" href="admin_hospitals.php">Hospitals</a></li>
					<li class="nav-item"><a class="nav-link" href="admin_users.php">Users</a></li>
					<li class="nav-item"><a class="nav-link" href="admin_departments.php">Departments</a></li>



					<div class="col-2">
						<div class="nav-item dropdown">
							<a class="dropdown-toggle" href="#" style="color:white; font-weight:500" role="button"
								id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
								<span style="color:black;font-weight: 600;font-family: 'Exo', sans-serif;text-transform: capitalize; font-size:16px;"><?php echo $username?></span>&nbsp;&nbsp;
								<img src="./images/users/<?php echo $imag?>" class="rounded-circle" height="40" alt=""
									loading="lazy" />
							</a>

							<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
								<li><a class="dropdown-item" href="admin_profile.php"><i
											class='bx bx-user'></i>&nbsp;&nbsp;&nbsp;My profile</a></li>
								<li><a class="dropdown-item" href="logout.php"><i
											class='bx bx-log-out'></i>&nbsp;&nbsp;&nbsp;Logout</a></li>
							</ul>
						</div>
					</div>


				</ul>
			</div>
		</div>
	</nav>
</header>
<!-- Navigation End -->