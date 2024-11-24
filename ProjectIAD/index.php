<?php
	include_once("db.php");
	session_start();
	$login = false;
	if(isset($_SESSION["logincode"])){
		$login = true;		
		if($_SESSION["logincode"] == "admin"){
			$role = "admin";
		}
		else
			$role="user";
		}
		else
		{
			file_put_contents("curruser.txt","");
		}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="slide.css">
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
			<?php
				if($login == true)
				{
					echo "<li><a href='profile.php'>Profile</a></li>";					
					echo "<li><a href='logout.php'>LogOut</a></li>";
					if($role =="admin")
						echo "<li><a href='adminpage.php'>Admin Panel</a></li>";
				}
				else
				{
					echo "<li><a href='signup.php'>Sign Up</a></li>";
            		echo "<li><a href='login.php'>Login</a></li>";		
				}			
			?>
			</ul>
			<div class="burger">
				<div class="line1"></div>
				<div class="line2"></div>
				<div class="line3"></div>
			</div>
		</nav>
		<div class="homeContainer">
		<div class="slideshow middle">
			<div class="slides">
				<input type="radio" name="r" id="r1" checked>
				<input type="radio" name="r" id="r2" >
				<input type="radio" name="r" id="r3" >
				<input type="radio" name="r" id="r4" >
				<div class="slide s1">
				<a href="course.php"><img src="Pictures/ps1920.jpg" id="pic1"></a>
				</div>
				<div class="slide">
				<a href="course.php"><img src="Pictures/html.jpeg"></a>
				</div>
				<div class="slide">
				<a href="course.php"><img src="Pictures/indesign.png"></a>
				</div>
				<div class="slide">
				<a href="course.php"><img src="Pictures/swift.jpg"></a>
				</div>
				</div>
				<div class="slidenav">
					<label class="slidebar" for="r1"></label>
					<label class="slidebar" for="r2"></label>
					<label class="slidebar" for="r3"></label>
					<label class="slidebar" for="r4"></label>
				</div> 
		</div>
	</div>
	</header>
	<script src="javascript/app.js"></script>
			<div class="footer">
			<footer>
				Copyright @ Innovative Training 2020
				</footer>
			
			</div>
	
</body>
</html>