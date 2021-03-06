<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="icon" type="image/png" href="../images/icon/cobra.png">
		<link rel="stylesheet" href="../css/general.css">
		<link rel="stylesheet" href="../css/signup.css">
		<script src="../js/navbar.js"></script>
		<script src="../js/signup.js"></script>
		<title>SerpentCharge-Sign Up</title>
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
						<a href="signup.php" target="_self" class = "active">Sign Up</a>
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
			<h1>Sign Up</h1>
			<p><?php
				if(isset($_GET['msg'])){
					if($_GET['msg']=="incorretdataentered") echo "Incorret Data entered";
					elseif($_GET['msg']=="userexists") echo "User Exists";
				}
			?></p>
			<form method="post" action="../php/signup.php">
				<div>
					<input type="text" id="fname" name="fname" placeholder="First Name" required>
					<input type="text" id="lname" name="lname" placeholder="Last Name" required>
				</div>
				<br>
				<input type="radio" id="male" name="gender" value="male" required><label for="male">Male</label>
				<input type="radio" id="female" name="gender" value="female"><label for="female">Female</label>
				<input type="radio" id="other" name="gender" value="other"><label for="other">Other</label>
				<br>
				<input type="email" id="email" name="email" placeholder="E-mail" required>
				<br>
				<input type="password" id="password" name="password" placeholder="Password" required>
				<br>
				<input type="password" id="r_password" name="r_password" placeholder="Retype Password" required onchange="check()">
				<br>
				<input type="submit" value="Sign Up" onclick="return check();">
			</form>
			<p>Already have an account? <a href="login.php">Log In</a></p>
		</main>
		<footer>
			<p>&copy;SerpentCharge</p>
			<address>Chowbaga Rd, Anandapur, Mundapara, Kolkata, West Bengal 700107</address>
		</footer>
	</body>
</html>
