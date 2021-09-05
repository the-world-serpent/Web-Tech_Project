<?php
	session_start();
	require_once '../php/general.php';
	$conn=new mysqli($hname,$uname,$pass,$db);
	if($conn->connect_error) header("Location : ../index.php?msg=failed");
	if(isset($_SESSION['email'])){
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="icon" type="image/png" href="../images/icon/cobra.png">
		<link rel="stylesheet" href="../css/general.css">
		<link rel="stylesheet" href="../css/changepassword.css">
		<script src="../js/navbar.js"></script>
		<title>SerpentCharge-ChangePassword</title>
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
			<h1>Change Password</h1>
			<p><?php 
			if(isset($_GET['msg'])){
				echo $_GET['msg'];
			}
			?></p>
			<form method="post" action="">
			<input type="password" name="currpassword" placeholder="Current Password">
			<input type="password" name="newpassword" placeholder="New Password">
			<input type="submit" name="cngpass" value="Change Password">
			</form>
			<?php
				if(isset($_POST['cngpass'])){
					$oldpass=mysqli_real_escape_string($conn,$_POST['currpassword']);
					$newpass=mysqli_real_escape_string($conn,$_POST['newpassword']);
					
					if(isset($_SESSION['admin']) && $_SESSION['admin']=="true"){
						$query1="select password from admins where email='".$_SESSION['email']."'";
					}elseif(isset($_SESSION['admin']) && $_SESSION['admin']=="true"){
						$query1="select password from users where email='".$_SESSION['email']."'";
					}
					$result=$conn->query($query1);
					if(!$result) header("Location : ../index.php?msg=failed");
					
					if($result->num_rows > 0){
						$row = $result->fetch_assoc();
					}
					if(isset($row['password'])){
						if($row['password']==$oldpass){
							if(isset($_SESSION['admin']) && $_SESSION['admin']=="true"){
								$query2="update admins set password='$newpass' where email='".$_SESSION['email']."'";
							}elseif(isset($_SESSION['admin']) && $_SESSION['admin']=="true"){
								$query2="update users set password='$newpass' where email='".$_SESSION['email']."'";
							}
							$result=$conn->query($query2);
							if(!$result) header("Location : changepassword.php?msg=failed");
							header("Location: changepassword.php?msg=success");
						}else{
							header("Location: changepassword.php?msg=failed");
						}
					}
				}
				$conn->close();
			?>
		</main>
		<footer>
			<p>&copy;SerpentCharge</p>
			<address>Chowbaga Rd, Anandapur, Mundapara, Kolkata, West Bengal 700107</address>
		</footer>
	</body>
</html>
<?php
	}s
?>
