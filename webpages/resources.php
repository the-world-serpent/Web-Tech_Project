<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="icon" type="image/png" href="../images/icon/cobra.png">
		<link rel="stylesheet" href="../css/general.css">
		<script src="../js/navbar.js"></script>
		<title>SerpentCharge-Resources</title>
	</head>
	<body>
		<header>
			<nav>
				<div class=home_nav>
					<a href="../index.php" target="_self" id="home_icon"><img src="../images/icon/cobra.png" alt="home icon"/></a>
				</div>
				<div class="nonicon">
					<a href="about.php" target="_self">About</a>
					<a href="support.php" target="_self">Support</a>
					<a href="resources.php" target="_self" class = "active">Resource</a>
					<div class=right_nav id="div1">
						<a href="login.php" target="_self">Login</a>
						<a href="signup.php" target="_self">Sign Up</a>
					</div>
					<div class="right_nav" id="div2">
						<span><?php echo $_SESSION['email']; ?></span>
						<a href="../php/logout.php">Log Out</a>
					</div>
					<?php
						if(isset($_SESSION['email'])){
							echo '<script>toggle_logedin();</script>';
						}else{
							echo '<script>toggle_logedout();</script>';
						}
					?>
				</div>
			</nav>
		</header>
		<main>
			<img src="../Project_Data/ERD for Online Recharge.png" alt="ERD" width="30%">
			<img src="../Project_Data/DFD for Online Recharge.png" alt="DFD" width="30%">
			<img src="../Project_Data/SiteMap.png" alt="Site map" width="30%">
			<br>
			<a href="../Project_Data/wireframe.pdf" target="_blank">Wireframe</a>
			<br>
			<iframe src="../Project_Data/wireframe.pdf" width="500" height="700"/>
		</main>
		<footer>
			<p>&copy;SerpentCharge</p>
		</footer>
	</body>
</html>
