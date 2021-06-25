<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="icon" type="image/png" href="../images/icon/cobra.png">
		<link rel="stylesheet" href="../css/general.css">
		<link rel="stylesheet" href="../css/mobile.css">
		<script src="../js/navbar.js"></script>
		<script src="../js/viewplan.js"></script>
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
			<h1>Mobile Recharge</h1>
			<section>
				<form method="post" action="mobile.php">	
					<input type="text" id="ph_no" name="ph_no" pattern="[0-9]{10}" placeholder="Phone Number" required>
					<select id="operator" name="operator" required>
						<option value="" selected>Select Operator</option>
						<option value="airtel">Airtel</option>
						<option value="bsnl">BSNL</option>
						<option value="jio">Jio</option>
						<option value="vi">VI</option>
					</select><br>
					<label><input type="radio" id="prepaid" name="plan_type" value="Prepaid" required>Prepaid</label>
					<label><input type="radio" id="postpaid" name="plan_type" value="Postpaid">Postpaid</label><br>
					<input type="number" placeholder=Amount required><br>
					<input type="submit" value="Proceed To Pay" name="main">
				</form>
			</section>
			<aside>
				<form id="form2" method="get" action="">
					<select id="plan_operator" name="plan_operator" required>
						<option value="" selected>Select Operator</option>
						<option value="airtel">Airtel</option>
						<option value="bsnl">BSNL</option>
						<option value="jio">Jio</option>
						<option value="vi">VI</option>
					</select>
					<select id="region" name="region" required>
						<option value="" selected>Select Region</option>
						<option value="kolkata">Kolkata</option>
					</select>
					<select id="plans" name="plans" required>
						<option value="" selected>Select Plan</option>
						<option value="data">Data</option>
						<option value="talktime">Talktime</option>
						<option value="isd">ISD</option>
						<option value="unlimited">Truely Unlimited</option>
						<option value="smart">Smart Recharge</option>
						<option value="international">International Roaming</option>
					</select>
					<input type="submit" value="View Plans" name="listplans">
				</form>
				<div>
					<?php
						if(isset($_GET['plan_operator']) && isset($_GET['region']) && isset($_GET['plans'])){
							require_once '../php/general.php';
							$conn=new mysqli($hname,$uname,$pass,$db);
							if($conn->connect_error) echo "Connection Failed";
							
							$operator=mysqli_real_escape_string($conn,$_GET['plan_operator']);
							$region=mysqli_real_escape_string($conn,$_GET['region']);
							$plans=mysqli_real_escape_string($conn,$_GET['plans']);
							
							$query="select amount,type,description,validity from plans where operator='$operator' AND region='$region' AND type='$plans'";
							$result=$conn->query($query);
							if(!$result) echo "Querying failed";
							
							echo '<script>console.log("tag working");removeForm();</script>';
							
							if ($result->num_rows > 0) {
								echo "<table><tr><th>Amount</th><th>Type</th><th>Description</th><th>Validity</th></tr>";
								while($row = $result->fetch_assoc()) {
	    								echo "<tr><td>".$row["amount"]."</td><td>".$row["type"]."</td><td>".$row["description"]."</td><td>".$row["validity"]."</td></tr>";
								}
								echo "</table>";
							}else{
								echo "No Data";
							}
						}
					?>
				</div>
			</aside>
		</main>
		<footer>
			<p>&copy;SerpentCharge</p>
			<address>Chowbaga Rd, Anandapur, Mundapara, Kolkata, West Bengal 700107</address>
		</footer>
	</body>
</html>
