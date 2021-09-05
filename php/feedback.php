<?php
	session_start();
	require_once 'general.php';
	$conn=new mysqli($hname,$uname,$pass,$db);
	if($conn->connect_error){
		echo 'Failed to connect'.$conn->connect_error;
		header("Location: ../index.php");
	}
	if(!isset($_SESSION['email'])){
		$conn->close();
		header("Location: ../webpages/support.php?msg=notlogedin");
	}else{
		$subject=mysqli_real_escape_string($conn, $_GET['sub']);
		$desc=mysqli_real_escape_string($conn, $_GET['feedback']);
		$query="insert into feedback values(null,'$subject','$desc','".$_SESSION['email']."')";

		$result=$conn->query($query);
		if(!$result) header("Location: ../webpages/support.php?msg=notsuccessful");
		$conn->close();
		header("Location: ../webpages/support.php?msg=successful");
	}
?>
