<?php
	include_once("db.php");
	session_start();
	$login = false;
	if(isset($_SESSION["logincode"]))
	{
		$login = true;		
		if($_SESSION["logincode"] == "admin")
		{
			$role = "admin";
		}
		else
			$role="user";
	}
	else
	{
		file_put_contents("curruser.txt","");
	}
	$userid = file_get_contents("curruser.txt");
	$sql2 = "SELECT fullname FROM usertbl WHERE login_id ='$userid'";
	$row2 = mysqli_fetch_assoc(mysqli_query($conn,$sql2));
	$fullname = $row2["fullname"];
	$sql = "SELECT course FROM coursetbl";
	$selectedIndex = $_REQUEST["course"];
	$result = mysqli_query($conn,$sql);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Apply Course</title>
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
	</header>
		<div id="tablecontainer">
			<form method="post" action="applypro.php" class="box-applycourse">
				<label>Name</label>
				<input type="text" value="<?php echo $row2["fullname"] ?>" readonly>
				<label>Course Selected</label>
					<select name="course">
						<?php
							while($row = mysqli_fetch_assoc($result))
							{						
								if($row["course"] == $selectedIndex)
							{
								echo  "<option value='". $row["course"]."' selected>". $row["course"]. "</option>";
							}
								echo  "<option value='". $row["course"]."'>". $row["course"]. "</option>";	
							}				
			?>	
				</select>
				<h2>Give us a reason why!</h2>
					<textarea name="reason" placeholder="Reason for joining" style="width:400px;height: 100px"></textarea>
					<input type="submit" value="Apply">
			</form>
	</div>
				<div class="footer">
			<footer>
				Copyright @ Innovative Training 2020
				</footer>
			
			</div>

	<script src="javascript/app.js"></script>
</body>
</html>