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
		<title>SerpentCharge-Plans</title>
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
						<a href="plans.php" traget="_self" class = "active">Plans</a>
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
			<h1>Plans</h1>
			<div>
				<?php
					if(!isset($_SESSION['admin']) || $_SESSION['admin']=="false"){
						echo "<h3>Unauthorized access. You are not Admin</h3>";
					}
				?>
			</div>
			<?php if($_SESSION['admin']=="true"){ ?>
				<section>
					<form id="form1" method="post" action="">
						<select id="insertoperator" name="insOperator" required>
							<option value="" selected>Select Operator</option>
							<option value="airtel">Airtel</option>
							<option value="bsnl">BSNL</option>
							<option value="jio">Jio</option>
							<option value="vi">VI</option>
						</select><br>
						<select id="insertregion" name="insRegion" required>
							<option value="" selected>Select Region</option>
							<option value="kolkata">Kolkata</option>
						</select><br>
						<select id="insertplans" name="insPlans" required>
							<option value="" selected>Select Plan</option>
							<option value="data">Data</option>
							<option value="talktime">Talktime</option>
							<option value="isd">ISD</option>
							<option value="unlimited">Truely Unlimited</option>
							<option value="smart">Smart Recharge</option>
							<option value="international">International Roaming</option>
						</select><br>
						<input type="text" id="insertvalidity" name="insValidity" placeholder="Validity" required>
						<textarea id="insertdescription" name="insDescription" placeholder="Description"></textarea>
						<input type="number" id="insertamount" name="insAmount" placeholder="Amount" required><br>
						<input type="submit" value="Insert To Plans" name="toInsert">
					</form>
					<p><?php
						if(isset($_POST['toInsert'])){
							require_once '../php/general.php';
							$conn=new mysqli($hname,$uname,$pass,$db);
							if($conn->connect_error) echo "Connection Failed";
							
							$insOperator=mysqli_real_escape_string($conn,$_POST['insOperator']);
							$insRegion=mysqli_real_escape_string($conn,$_POST['insRegion']);
							$insPlans=mysqli_real_escape_string($conn,$_POST['insPlans']);
							$insValidity=mysqli_real_escape_string($conn,$_POST['insValidity']);
							$insDescription=mysqli_real_escape_string($conn,$_POST['insDescription']);
							$insAmount=mysqli_real_escape_string($conn,$_POST['insAmount']);
							
							$query="insert into plans values ('$insOperator','$insRegion',$insAmount,'$insPlans','$insValidity','$insDescription')";	
							$result=$conn->query($query);
							if(!$result) echo "Insert failed";
							else echo "Insert Successful";
						}
					?></p>
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
							if(isset($_GET['listplans'])){
								require_once '../php/general.php';
								$conn=new mysqli($hname,$uname,$pass,$db);
								if($conn->connect_error) echo "Connection Failed";
								
								$operator=mysqli_real_escape_string($conn,$_GET['plan_operator']);
								$region=mysqli_real_escape_string($conn,$_GET['region']);
								$plans=mysqli_real_escape_string($conn,$_GET['plans']);
								
								$query="select amount,type,description,validity from plans where operator='$operator' AND region='$region' AND type='$plans'";
								$result=$conn->query($query);
								if(!$result) echo "Querying failed";
								
								echo '<script>removeForm();</script>';
								
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
							$conn->close();
						?>
					</div>
				</aside>
			<?php } ?>
		</main>
	</body>
</html>


