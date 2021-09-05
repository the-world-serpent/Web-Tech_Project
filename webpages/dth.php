<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="icon" type="image/png" href="../images/icon/cobra.png">
		<link rel="stylesheet" href="../css/general.css">
		<link rel="stylesheet" href="../css/dth.css">
		<script src="../js/navbar.js"></script>
		<title>SerpentCharge-DTH</title>
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
						<a href="resources.php" target="_self">Resource</a>
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
			<h1>DTH Recharge</h1>
			<form method="post" action="../php/transaction_dth.php">
				<p><?php
						if($_GET['msg']=="notlogedin"){
							echo "Not Loged In. Log In to proceed.";
						}elseif($_GET['msg']=="tableconnectionfailed"){
							echo "Cannot connect to Table";
						}elseif($_GET['msg']=="transactionSuccessful"){
							echo "Transaction Successful";
						}
				?></p>
				<input type="text" id="cus_id" name="cus_id" pattern="[3]{1}[0-9]{9}" placeholder="Customer ID" required>
				<select id="operator" name="operator" required>
					<option value="" selected>Select Operator</option>
					<option value="dd_free_dish">DD Free Dish</option>
					<option value="tata_sky">Tata Sky</option>
					<option value="dish_tv">Dish TV</option>
					<option value="airtel_digital_tv">Airtel Digital TV</option>
					<option value="sun_direct">Sun Direct</option>
				</select><br>
				<input type="number" name="amount" placeholder=Amount required><br>
				<input type="submit" value="Proceed To Pay">
			</form>
		<main>
		<footer>
			<p>&copy;SerpentCharge</p>
			<address>Chowbaga Rd, Anandapur, Mundapara, Kolkata, West Bengal 700107</address>
		</footer>
	</body>
</html>
