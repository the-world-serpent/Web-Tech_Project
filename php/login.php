<?php
	require_once 'general.php';
	
	$conn=new mysqli($hname,$uname,$pass,$db);
	if($conn->connect_error){
		echo "Cannot Connect ".$conn->connect_error;
		header("Location: ../index.php");
	}
		
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);

	if($_POST['isAdmin']=="true"){
		$query="select password from admins where email='$email'";
	}elseif($_POST['isAdmin']=="false"){
		$query="select password from users where email='$email'";
	}

	$result=$conn->query($query);
	$row=$result->fetch_assoc();
	$db_pass=$row['password'];
	$conn->close();
		
	session_start();
	if($password!=$db_pass){
		header("Location: ../webpages/login.php?msg=failed");
	}else{
		$_SESSION['email']=$email;
		if($_POST['isAdmin']=="true"){
			$_SESSION['admin']="true";
		}else{
			$_SESSION['admin']="false";
		}
		header("Location: ../index.php");
	}
?>
