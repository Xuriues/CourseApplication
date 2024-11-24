<?php
$id = $_REQUEST["id"];
$sql = "DELETE from applicationtbl where id = $id";
$result = mysqli_query($conn,$sql);
header("Location:adminpage.php");
?>