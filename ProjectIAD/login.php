<?php
	include_once("db.php");	
	file_put_contents("curruser.txt","");
?>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
</head>

<body>
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
	<form class="box" action="loginpro.php" method="post">
		<h1>Login</h1>
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<input type="submit" name="" value="Login">
	</form>
			<div class="footer">
			<footer>
				Copyright @ Innovative Training 2020
				</footer>
			
			</div>
	<script src="javascript/app.js"></script>
</body>
</html>