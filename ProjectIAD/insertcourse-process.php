<?php
include_once("db.php");
$course = $_REQUEST["course"];
$price = $_REQUEST["price"];
$description = $_REQUEST["description"];
$duration = $_REQUEST["duration"];
$availseat = $_REQUEST["availseat"];
$sql = "INSERT coursetbl set course='$course',price='$price',description='$description',duration='$duration',availseat='$availseat'";
$result = mysqli_query($conn,$sql);
header("Location:adminpage.php");
?>