<?php
	session_start();
	
	if(!isset($_SESSION['email'])){
		header("Location: ../webpages/dth.php?msg=notlogedin");
	}
	else{
		require_once 'general.php';
		$conn=new mysqli($hname,$uname,$pass,$db);
		if($conn->connect_error){
			echo "Cannot Connect ".$conn->connect_error;
			header("Location: ../index.php?msg=noconnect");
		}
		
		$cid=mysqli_real_escape_string($conn,$_POST['cus_id']);
		$operator=mysqli_real_escape_string($conn,$_POST['operator']);
		$amount=mysqli_real_escape_string($conn,$_POST['amount']);

		$query="insert into transactions values (null,'".$_SESSION['email']."','$cid','$operator',null,$amount,'dth')";
		
		$result=$conn->query($query);
		$conn->close();
		if(!$result){
			header("Location: ../webpages/dth.php?msg=tableconnectionfailed");
		}
		header("Location: ../webpages/dth.php?msg=transactionSuccessful");
	}
?>
