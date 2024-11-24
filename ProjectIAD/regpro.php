<?php
	include_once("db.php");
	$user = $_REQUEST["username"];
	$pass = $_REQUEST["password"];	
	$confirm = $_REQUEST["confirm-password"];
	$fullname = $_REQUEST["name"];	
	$email = $_REQUEST["email"];	
	$phone = $_REQUEST["phone"];	
	$gender = $_REQUEST["gender"];
	if(empty($user) || empty($pass) || empty($fullname) || empty($email) || empty($phone) || empty($gender))
	{
		echo"Please fill in all data.";
		echo"<br><a href='signup.php'><input type='submit' value='Return'></a>";
	}
	if($pass != $confirm)
	{
		echo"Password does not match";
		echo"<br><a href='signup.php'><input type='submit' value='Return'></a>";
	}
	else
	{
	$sql = "INSERT logintbl set username='$user',password='$pass'";
	$result = mysqli_query($conn,$sql);
	$sql2 = "SELECT id FROM logintbl WHERE username='$user'";
	$row = mysqli_fetch_assoc(mysqli_query($conn,$sql2));
	$loginid = $row["id"];
	$sql3 = "INSERT usertbl SET login_id='$loginid',fullname='$fullname',email='$email',phone='$phone',gender='$gender'";
	mysqli_query($conn,$sql3);
	header("Location:login.php");
	}
?>