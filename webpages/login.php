<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="icon" type="image/png" href="../images/icon/cobra.png">
		<link rel="stylesheet" href="../css/general.css">
		<link rel="stylesheet" href="../css/login.css">
		<title>SerpentCharge-Log In</title>
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
					<div class=right_nav>
						<a href="login.php" target="_self" class = "active">Login</a>
						<a href="signup.php" target="_self">Sign Up</a>
					</div>
				</div>
			</nav>
		</header>
		<main>
			<h1>Log In</h1>
			<p>
				<?php
					if(isset($_GET['msg']) && $_GET['msg']=='failed'){
						echo "Wrong Username/Password";
					}
				?>
			</p>
			<form method="post" action="../php/login.php">
				<input id="email" name="email" type="email" placeholder="Registerd E-mail" required>
				<br>
				<input id="password" name="password" type="password" placeholder="Password" required>
				<br>
				<input type="submit" value="Log In">
			</form>
			<p>Don't have an account? <a href="signup.php">Sign up</a></p>
		</main>
		<footer>
			<p>&copy;SerpentCharge</p>
			<address>Chowbaga Rd, Anandapur, Mundapara, Kolkata, West Bengal 700107</address>
		</footer>
	</body>
</html>
