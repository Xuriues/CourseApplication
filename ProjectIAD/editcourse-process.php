<?php
include_once("db.php");
$id = $_REQUEST["id"];
$course = $_REQUEST["course"];
$price = $_REQUEST["price"];
$duration = $_REQUEST["duration"];
$availseat = $_REQUEST["availseat"];
$sql = "UPDATE coursetbl set course='$course',price='$price',duration='$duration',availseat='$availseat' where id =$id";
$result = mysqli_query($conn,$sql);
header("Location:adminpage.php");
?>