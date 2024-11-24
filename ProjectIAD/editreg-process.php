<?php
include_once("db.php");
$id = $_REQUEST["id"];
$name = $_REQUEST["name"];
$course = $_REQUEST["course"];
$contact = $_REQUEST["contact"];
$email = $_REQUEST["email"];
$date = $_REQUEST["date"];
$sql = "UPDATE regtbl SET name='$name',course='$course',contact=$contact,email='$email' WHERE id = $id";
$result = mysqli_query($conn,$sql);
header("Location:adminpage.php");
?>