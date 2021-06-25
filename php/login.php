<?php
	require_once 'general.php';
	
	$conn=new mysqli($hname,$uname,$pass,$db);
	if($conn->connect_error){
		echo "Cannot Connect ".$conn->connect_error;
		header("Location: ../index.php?msg=noconnect");
	}
		
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);

	$query="select password from users where email='$email'";
	$result=$conn->query($query);
	$result->data_seek(0);
	$row=$result->fetch_array(MYSQLI_NUM);
	$db_pass=$row[0];
	
	session_start();
	if($password!=$db_pass){
		header("Location: ../webpages/login.php?msg=failed");
	}else{
		$_SESSION['email']=$email;
		header("Location: ../index.php");
	}
?>
