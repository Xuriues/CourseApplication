<?php
include_once("db.php");
$id = $_REQUEST["id"];
$sql = "DELETE FROM coursetbl where id = $id";
$result = mysqli_query($conn,$sql);
header("Location:adminpage.php");
?>