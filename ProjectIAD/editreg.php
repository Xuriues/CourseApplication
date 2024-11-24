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
$id = $_REQUEST["id"];
$sql = "SELECT * FROM regtbl WHERE id=$id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>
<html>
<head>
<meta charset="utf-8">
<title>Edit</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
</head>

<body id="editReg">
	<header>
		<nav>
			<div class="logo">
				<h2>Innovitive Training</h2>
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
		<form method="post" action="editreg-process.php" class="box-editreg">
			<h1>Edit Course</h1>
				<label>Name</label><br>
				<input type="text" value="<?php echo $row["name"] ?>" name="name">
				<label>Course</label><br>
				<input type="text" value="<?php echo $row["course"] ?>" name="course">
				<label>Contact</label><br>
				<input type="tel" value="<?php echo $row["contact"] ?>" name="contact">
				<label>Email</label>
				<input type="text" value="<?php echo $row["email"]?>" name="email">
				<label>Date Registered</label><br>
				<input type="date" name="date">
				<input type="hidden" value="<?php echo $id ?>" name="id">
				<input type="submit" value="Update">
		</form>
	</div>
			<div class="footer">
			<footer>
				Copyright @ Innovative Training 2020
				</footer>
			
			</div>
</body>
</html>