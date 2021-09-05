<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="icon" type="image/png" href="../images/icon/cobra.png">
		<link rel="stylesheet" href="../css/general.css">
		<link rel="stylesheet" href="../css/resources.css">
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
					<div class=left_nav id="nonadmin">
						<a href="about.php" target="_self">About</a>
						<a href="support.php" target="_self">Support</a>
						<a href="resources.php" target="_self" class = "active">Resource</a>
					</div>
					<div class="left_nav" id="yesadmin">
						<a href="plans.php" traget="_self">Plans</a>
						<a href="transac.php" traget="_self">Transactions</a>
						<a href="users.php" traget="_self">Users</a>
						<a href="adminsignup.php" traget="_self">Admin Sign Up</a>
					</div>
					<?php
						if(isset($_SESSION['admin']) && $_SESSION['admin']=="true"){
							echo "<script>toggle_adminlogedin();</script>";
						}else{
							echo "<script>toggle_adminlogedout()</script>";
						}
					?>
					<div class=right_nav id="div1">
						<a href="login.php" target="_self">Login</a>
						<a href="signup.php" target="_self">Sign Up</a>
					</div>
					<div class="right_nav" id="div2">
						<span><a href="changepassword.php"><?php echo $_SESSION['email']; ?></a></span>
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
			<section class="pagetop">
				<aside class="left">
					<h2>ERD</h2>
					<img src="../Project_Data/ERD for Online Recharge.svg" alt="ERD">
				</aside>
				<aside class="right">
					<h2>SiteMap</h2>
					<img src="../Project_Data/SiteMap.svg" alt="Site map">
				</aside>
			</section>
			<section class="dfd">
			<h2>DFD</h2>
			<img src="../Project_Data/DFD for Online Recharge 0.svg" alt="DFD">
			<img src="../Project_Data/DFD for Online Recharge 1.svg" alt="DFD">
			</section>
			<section class="wireframe">
				<h2>WireFrame</h2>
				<img src="../Project_Data/Wireframe/HOME.svg" alt="wireframe">
				<img src="../Project_Data/Wireframe/ABOUT.svg" alt="wireframe">
				<img src="../Project_Data/Wireframe/FEEDBACK.svg" alt="wireframe">
				<img src="../Project_Data/Wireframe/LOGIN.svg" alt="wireframe">
				<img src="../Project_Data/Wireframe/SIGNUP.svg" alt="wireframe">
				<img src="../Project_Data/Wireframe/MOBILE.svg" alt="wireframe">
				<img src="../Project_Data/Wireframe/DTH.svg" alt="wireframe">
				<img src="../Project_Data/Wireframe/PLANS.svg" alt="wireframe">
				<img src="../Project_Data/Wireframe/TRANSACTIONS.svg" alt="wireframe">
				<img src="../Project_Data/Wireframe/USERS.svg" alt="wireframe">
				<img src="../Project_Data/Wireframe/ADMINSIGNUP.svg" alt="wireframe">
			</section>
		</main>
		<footer>
			<p>&copy;SerpentCharge</p>
		</footer>
	</body>
</html>
