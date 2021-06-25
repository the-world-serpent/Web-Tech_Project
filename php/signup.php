<?php
	require_once 'general.php';
	$conn=new mysqli($hname,$uname,$pass,$db);
	if($conn->connect_error){
		echo 'Failed to connect';
		header("Location: ../index.php?msg=noconnect");
	}

	$fname=mysqli_real_escape_string($conn,$_POST['fname']);
	$lname=mysqli_real_escape_string($conn,$_POST['lname']);
	$gender=mysqli_real_escape_string($conn,$_POST['gender']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);

	$query="insert into users values('$fname','$lname','$gender','$email','$password')";

	$result=$conn->query($query);
	if(!$result){
		echo "failed to insert".$conn->error;
		header("Location: ../webpages/signup.php?msg=failed");
	}else{
		session_start();
		$_SESSION['email']=$email;
		header("Location: ../index.php");
	}
?>
