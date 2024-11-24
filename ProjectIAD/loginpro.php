<?php
	include_once("db.php");
	session_start();
	file_put_contents("curruser.txt", "");
	$username = $_REQUEST["username"];
	$password = $_REQUEST["password"];
	$sql = "SELECT role,id FROM logintbl WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result) > 0 )
		{
		if($row["role"] == 1){
			$_SESSION["logincode"] = "admin";
		}
		else
		{
			$_SESSION["logincode"] = "user";			
		}
		file_put_contents("curruser.txt",$row["id"]);
        header("Location:index.php");									 
	}
	else
	{
		header("Location:fail.php");
	}
?>
