<?php
	session_start();
	
	if(!isset($_SESSION['email'])){
		header("Location: ../webpages/mobile.php?msg=notlogedin");
	}
	else{
		require_once 'general.php';
		$conn=new mysqli($hname,$uname,$pass,$db);
		if($conn->connect_error){
			echo "Cannot Connect ".$conn->connect_error;
			header("Location: ../index.php?msg=noconnect");
		}
		
		$phone=mysqli_real_escape_string($conn,$_POST['ph_no']);
		$operator=mysqli_real_escape_string($conn,$_POST['operator']);
		$planType=mysqli_real_escape_string($conn,$_POST['plan_type']);
		$amount=mysqli_real_escape_string($conn,$_POST['amount']);

		$query="insert into transactions values (null,'".$_SESSION['email']."','$phone','$operator','$planType',$amount,'mobile')";
		
		$result=$conn->query($query);
		$conn->close();
		if(!$result){
			header("Location: ../webpages/mobile.php?msg=tableconnectionfailed");
		}
		header("Location: ../webpages/mobile.php?msg=transactionSuccessful");
	}
?>
