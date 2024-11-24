<?php
	include_once("db.php");
	session_start();
	$login = false;
	if(!isset($_SESSION["logincode"]))
	{
		file_put_contents("curr_user.txt","");
		header("Location:login.php");		
	}
	else
	{
			$login = true;
			if($_SESSION["logincode"] != "admin")
			{
				header("Location:login.php");
			}
			else
				$role = "admin";
	}
	
		if($_SESSION["logincode"] != "admin")
		{
			$role = "user";
		}
?>
<html>
<head>
<meta charset="utf-8">
<title>Insert Course</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
</head>

<body id="insertCourse">
	<header>
		<nav>
			<div class="logo">
				<h2>Innovative Training</h2>
			</div>
			<ul class="nav-links">
				<li><a href="index.php">Home</a></li>
				<li><a href="course.php">Courses</a></li>
			<?php
				if($login == true){
					echo "<li><a href='profile.php'>Profile</a></li>";					
					echo "<li><a href='logout.php'>LogOut</a></li>";
					if($role =="admin")
						echo "<li><a href='adminpage.php'>Admin Panel</a></li>";
				}
				else{
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
	</header>
	<div>
		<form method="post" action="insertcourse-process.php" class="box-insertcourse">
			<h1>Insert Course</h1>
				<label>Course Name</label><br>
				<input type="text" name="course">
				<label>Price</label><br>
				<input type="text" name="price">
				<label>Description</label><br>
				<textarea name="description" style="width:600px;height: 150px"></textarea>
				<label>Duration</label>
				<input type="number" name="duration">
				<label>Available Seats</label><br>
				<input type="number"  name="availseat">
				<input type="submit" value="Submit">
		</form>
	</div>
			<div class="footer">
			<footer>
				Copyright @ Innovative Training 2020
				</footer>
			
			</div>
</body>
</html>