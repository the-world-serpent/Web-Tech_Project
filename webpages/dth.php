<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="icon" type="image/png" href="../images/icon/cobra.png">
		<link rel="stylesheet" href="../css/general.css">
		<link rel="stylesheet" href="../css/dth.css">
		<script src="../js/navbar.js"></script>
		<title>SerpentCharge</title>
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
			<h1>DTH Recharge</h1>
			<form method="post" action="mobile.php">
				<input type="text" id="cus_id" name="cus_id" pattern="[3]{1}[0-9]{9}" placeholder="Customer ID" required>
				<select id="operator" name="operator" required>
					<option value="" selected>Select Operator</option>
					<option value="dd_free_dish">DD Free Dish</option>
					<option value="tata_sky">Tata Sky</option>
					<option value="dish_tv">Dish TV</option>
					<option value="airtel_digital_tv">Airtel Digital TV</option>
					<option value="sun_direct">Sun Direct</option>
				</select><br>
				<input type="number" placeholder=Amount required><br>
				<input type="submit" value="Proceed To Pay">
			</form>
		<main>
		<footer>
			<p>&copy;SerpentCharge</p>
			<address>Chowbaga Rd, Anandapur, Mundapara, Kolkata, West Bengal 700107</address>
		</footer>
	</body>
</html>
