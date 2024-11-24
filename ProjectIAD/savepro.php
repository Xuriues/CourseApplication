<?php
	include_once("db.php");
	$fullname = $_REQUEST["fullname"];
	$user = $_REQUEST["username"];
	$pass = $_REQUEST["password"];
	$confirm = $_REQUEST["confirmPassword"];
	$phone = $_REQUEST["phone"];
	$email = $_REQUEST["email"];
	$id = $_REQUEST["id"];
	if(!empty($pass))
	{
		if($pass != $confirm)
		{
			echo"<h1>Password does not match please try again</h1>";
			echo"<br><a href='profile.php'><input type='submit' value='Return'></a>";			
		}
		else
		{
		$sql2 = "UPDATE logintbl SET password='$pass' WHERE id = $id";
		$result2 = mysqli_query($conn,$sql2);
		header("location:complete.php");
		}
	}
	if(!empty($user))
	{
		$sql3 = "UPDATE logintbl SET username='$user' WHERE id =$id";
		$result3 = mysqli_query($conn,$sql3);
		header("location:complete.php");
	}
	elseif(empty($user) || empty($pass) || empty($confirm))
	{
	$sql = "UPDATE usertbl SET fullname='$fullname',phone=$phone,email='$email' WHERE login_id=$id";
	$result = mysqli_query($conn,$sql);
	header("Location:profile.php");	
	}
?>