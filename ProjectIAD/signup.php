<?php
	include_once("db.php");
	file_put_contents("list.txt","");
	file_put_contents("curr_user.txt","");
	$handle = @fopen("list.txt","a");
	$sql = "SELECT username FROM logintbl";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($result))
	{
		$handle = fopen("list.txt","a");
		fwrite($handle,$row["username"] . "\n");
		fclose($handle);
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
</head>

<body id="signup">
	<header>
		<nav>
			<div class="logo">
				<h2>Innovative Training</h2>
			</div>
			<ul class="nav-links">
				<li><a href="index.php">Home</a></li>
				<li><a href="course.php">Courses</a></li>
				<li><a href="signup.php">Sign Up</a></li>
				<li><a href="login.php">Login</a></li>
			</ul>
			<div class="burger">
				<div class="line1"></div>
				<div class="line2"></div>
				<div class="line3"></div>
			</div>
		</nav>
	</header>
		<form class="box-signup" action="regpro.php" method="post">
		<h1>Register</h1>
			<input type="text" name="username" id="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<input type="password" name="confirm-password" placeholder="Confirm Password">
		<h2>User Info</h2>
			<input type="text" name="name" placeholder="Name">
			<input type="email" name="email" placeholder="Email">
			<input type="tel" name="phone" placeholder="Phone Number">
			<label>Gender :</label>
			<input type="radio" name="gender" value="Male">Male
			<input type="radio" name="gender" value="Female">Female
			<input type="submit" name="btnsubmit" value="Register">
	</form>
	<div class="footer">
		<footer>
			Copyright @ Innovative Training 2020
		</footer>
			
	</div>
	<script src="javascript/app.js"></script>
</body>
</html>