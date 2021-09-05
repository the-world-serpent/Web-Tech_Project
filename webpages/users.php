<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="icon" type="image/png" href="../images/icon/cobra.png">
		<link rel="stylesheet" href="../css/general.css">
		<link rel="stylesheet" href="../css/users.css">
		<script src="../js/navbar.js"></script>
		<script src="../js/viewplan.js"></script>
		<title>SerpentCharge-Users</title>
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
						<a href="users.php" traget="_self" class = "active">Users</a>
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
		<h1>Users</h1>
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
				
				$query="select * from users";
				$result=$conn->query($query);
				if(!$result) echo "Querying failed";
				
				if ($result->num_rows > 0) {
					echo "<table><tr><th>First Name</th><th>Last Name</th><th>Gender</th><th>Email</th><th>Password</th></tr>";
					while($row = $result->fetch_assoc()) {
						echo "<tr><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["gender"]."</td><td>".$row["email"]."</td>
						<td>".$row["password"]."</td></tr>";
					}
					echo "</table>";
				}else{
					echo "No Data";
				}
			?>
			<form method="post" action="">
				<input type="email" id="mail" name="email" placeholder="Email">
				<input type="submit" id="submit_users"value="Delete User" name="delete">
				<?php
					if(isset($_POST['delete'])){
						$conn=new mysqli($hname,$uname,$pass,$db);
						if($conn->connect_error) echo "Connection Failed";
						
						$email=mysqli_real_escape_string($conn,$_POST['email']);
						$query="delete from users where email='$email'";
						$result=$conn->query($query);
						if(!$result) echo "Querying failed";
						else echo "<p>User Deleted<p>";
						header("Location: ../webpages/users.php");
					}
					$conn->close();
				?>
			</form>
		<?php } ?>
		</main>
	</body>
</html>


