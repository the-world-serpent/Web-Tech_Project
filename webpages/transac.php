<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="icon" type="image/png" href="../images/icon/cobra.png">
		<link rel="stylesheet" href="../css/general.css">
		<link rel="stylesheet" href="../css/plans.css">
		<script src="../js/navbar.js"></script>
		<script src="../js/viewplan.js"></script>
		<title>SerpentCharge-Transactions</title>
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
						<a href="transac.php" traget="_self" class = "active"s>Transactions</a>
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
		<h1>Transactions</h1>
		<div>
			<?php
				if(!isset($_SESSION['admin']) || $_SESSION['admin']=="false"){
					echo "<h3>Unauthorized access. You are not Admin</h3>";
				}
			?>
		</div>
		<?php if($_SESSION['admin']=="true"){ ?>
			<?php
				require_once '../php/general.php';
				$conn=new mysqli($hname,$uname,$pass,$db);
				if($conn->connect_error) echo "Connection Failed";
				
				$query="select * from transactions";
				$result=$conn->query($query);
				if(!$result) echo "Querying failed";
				
				if ($result->num_rows > 0) {
					echo "<table><tr><th>TransactionID</th><th>Email</th><th>Number</th><th>Operator</th><th>Plan Type</th><th>Amount</th><th>Device</th></tr>";
					while($row = $result->fetch_assoc()) {
						echo "<tr><td>".$row["transacID"]."</td><td>".$row["user_email"]."</td><td>".$row["number"]."</td><td>".$row["operator"]."</td>
						<td>".$row["plan_type"]."</td><td>".$row["amount"]."</td><td>".$row["device"]."</td></tr>";
					}
					echo "</table>";
					$conn->close();
				}else{
					$conn->close();
					echo "No Data";
				}
			?>
		<?php } ?>
		</main>
	</body>
</html>


