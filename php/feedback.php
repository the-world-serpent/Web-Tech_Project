<?php
	require_once 'general.php';
	$conn=new mysqli($hname,$uname,$pass,$db);
	if($conn->connect_error){
		echo 'Failed to connect'.$conn->connect_error;
		header("Location: ../index.php?msg=noconnect");
	}

	$subject=mysqli_real_escape_string($conn, $_GET['sub']);
	$desc=mysqli_real_escape_string($conn, $_GET['feedback']);
	$query="insert into feedback values(null,'$subject','$desc')";

	$result=$conn->query($query);
	if(!$result) echo "insert failed ".$conn->error;
	$conn->close();
	header("Location: ../index.php");
?>
