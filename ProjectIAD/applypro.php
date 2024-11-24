<?php
	include_once("db.php");
	$userid=file_get_contents("curruser.txt");
	$sql2 = "SELECT * FROM usertbl WHERE login_id ='$userid'";
	$row = mysqli_fetch_assoc(mysqli_query($conn,$sql2));	
	$name = $row["fullname"];
	$email = $row["email"];
	$phone = $row["phone"];
	$gender = $row["gender"];
	$course = $_REQUEST["course"];
	$reason = $_REQUEST["reason"];
	$sql = "INSERT applicationtbl SET name='$name',email='$email',phone='$phone',gender='$gender', course='$course',reason='$reason',user_id='$userid'";
	$result = mysqli_query($conn,$sql);
	header("Location:course.php");
?>