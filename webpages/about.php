<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="icon" type="image/png" href="../images/icon/cobra.png">
		<link rel="stylesheet" href="../css/general.css">
		<link rel="stylesheet" href="../css/about.css">
		<script src="../js/navbar.js"></script>
		<title>SerpentCharge-About</title>
	</head>
	<body>
		<header>
			<nav>
				<div class=home_nav>
					<a href="../index.php" target="_self" id="home_icon"><img src="../images/icon/cobra.png" alt="home icon"/></a>
				</div>
				<div class="nonicon">
					<a href="about.php" target="_self" class = "active">About</a>
					<a href="support.php" target="_self">Support</a>
					<a href="resources.php" target="_self">Resource</a>
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
			<section>
				<h1>ABOUT US</h1>
				<p>This is a project work from the MCA 2019-2022 batch of the Heritage Institute of Technology.</p>
				<p>None of the features will not work since SerpentCharge is a fictitious company but one is free to put in their
				Credit/Debit Card information for the creator of the website.</p>
			</section>
		</main>
		<footer>
			<p>&copy;SerpentCharge</p>
			<address>Chowbaga Rd, Anandapur, Mundapara, Kolkata, West Bengal 700107</address>
		</footer>
	</body>
</html>
