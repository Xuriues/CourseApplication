<?php
	include_once("db.php");
	$id = $_REQUEST["id"];
	$sql = "SELECT * FROM applicationtbl WHERE id=$id";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$name = $row["name"];
	$course = $row["course"];
	$contact = $row["phone"];
	$email = $row["email"];
	$userid= $row["user_id"];
	$result3 = mysqli_query($conn,"SELECT availseat FROM coursetbl WHERE course='$course'");
	$row2 = mysqli_fetch_assoc($result3);
	$availseat = $row2["availseat"];
	$sql3 = "UPDATE coursetbl SET availseat=$availseat-1 WHERE course='$course'";	
	$result4 = mysqli_query($conn,$sql3);
	$sql2 = "INSERT regtbl set name='$name',course='$course',contact='$contact',email='$email',user_id='$userid'";
	$result2 = mysqli_query($conn,$sql2);
	include_once("rejectreg.php");
	header("Location:adminpage.php");
?>