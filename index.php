<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="icon" type="image/png" href="images/icon/cobra.png">
		<link rel="stylesheet" href="css/general.css">
		<link rel="stylesheet" href="css/home.css">
		<script src="js/navbar.js"></script>
		<title>SerpentCharge</title>
	</head>
	<body>
		<header>
			<nav>
				<div class=home_nav>
					<a href="index.php" target="_self" id="home_icon"><img src="images/icon/cobra.png" alt="home icon"/></a>
				</div>
				<div class="nonicon">
					<a href="webpages/about.php" target="_self">About</a>
					<a href="webpages/support.php" target="_self">Support</a>
					<a href="webpages/resources.php" target="_self">Resource</a>
					
					<div class="right_nav" id="div1">
						<a href="webpages/login.php" target="_self">Login</a>
						<a href="webpages/signup.php" target="_self">Sign Up</a>
					</div>
					<div class="right_nav" id="div2">
						<span><?php echo $_SESSION['email']; ?></span>
						<a href="php/logout.php">Log Out</a>
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
			<aside class="left">
				<a href=""><img src="images/Sidebar.jpg" alt="Advertisement"></a>
			</aside>
			<section class="center">
				<section class="links">
					<a href="webpages/mobile.php" aria-lable="Mobile Recharge"><img src="images/icon/smartphone-call.png" alt="Mobile" title="Mobile"></a>
					<a href="webpages/dth.php" aria-lable="DTH Recharge"><img src="images/icon/smart-tv.png" alt="DTH" title="DTH"></a>
				</section>
				<section class="offers">
					<a href=""><img src="images/offer.jpg" alt="Offer"></a>
				</section>
			</section>
			<aside class="right">
				<a href=""><img src="images/Sidebar.jpg" alt="Advertisement"></a>
			</aside>
		</main>
		<footer>
			<p>&copy;SerpentCharge</p>
			<address>Chowbaga Rd, Anandapur, Mundapara, Kolkata, West Bengal 700107</address>
			<section>
				<div>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
				<div>Icons made by <a href="https://www.flaticon.com/authors/vitaly-gorbachev" title="Vitaly Gorbachev">Vitaly Gorbachev</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
				<div><a href='https://www.freepik.com/vectors/banner'>Banner vector created by starline - www.freepik.com</a></div>
				<div>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
			</section>
		</footer>
	</body>
</html?
