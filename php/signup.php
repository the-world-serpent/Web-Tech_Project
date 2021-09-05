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

	$query1="select s.email from (select * from users union select * from admins) s where s.email='$email'";
	$r=$conn->query($query1);
	if($r->num_rows==0){
		$query="insert into users values('$fname','$lname','$gender','$email','$password')";
		$result=$conn->query($query);
		$conn->close();
		if(!$result){
			header("Location: ../webpages/signup.php?msg=incorretdataentered");
		}else{
			session_start();
			$_SESSION['email']=$email;
			$_SESSION['admin']="false";
			header("Location: ../index.php");
		}
	}else{
		header("Location: ../webpages/signup.php?msg=userexists");
	}
?>
