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
	$sql = "SELECT * FROM regtbl WHERE user_id=$userid";
	$result = mysqli_query($conn,$sql);
	$sql2 = "SELECT * FROM applicationtbl WHERE user_id=$userid";
	$result2 = mysqli_query($conn,$sql2);
	$sql3 = "SELECT * FROM usertbl WHERE login_id=$userid";
	$result3 = mysqli_query($conn,$sql3);
	$row2 = mysqli_fetch_assoc($result3);
	$sql4 = "SELECT * FROM logintbl where id = $userid";
	$result4 = mysqli_query($conn,$sql4);
	$row4 = mysqli_fetch_assoc($result4);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Profile</title>
		<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

</head>
<body id="profileBody">
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
		<form class="box-profile" action="savepro.php" method="post">
			<h1>Edit Profile</h1>
				<label>Name</label>
				<input type="text" value="<?php echo $row2["fullname"] ?>" name="fullname">
				<label>Phone</label>
				<input type="tel" value="<?php echo $row2["phone"] ?>" name="phone">
				<label>Email</label>
				<input type="email" value="<?php echo $row2["email"] ?>" name="email">
				<input type="hidden" value="<?php echo $row2["login_id"] ?>" name="id">
			<h2>Edit Account</h2>
				<label>Username</label>
				<input type="text" placeholder="<?php echo $row4["username"] ?>" name="username">
				<label>New Password</label>
				<input type="password" name="password">
				<label>Confirm Password</label>
				<input type="password" name="confirmPassword">
				<input type="submit" value="Update">
			<h1>Course Applied</h1>
			<h3>Confirmed Course</h3>
				<table border="1px">
					<tr>
						<th>Course</th>
						<th>Date Registered</th>
					</tr>
					<?php
						while($row = mysqli_fetch_assoc($result))
						{
							echo "<tr><td>".$row["course"]."</td>";
							echo "<td>".$row["dateregistered"]."</td></tr>";
						}
					?>
			</table>
				<table border="1px">
					<tr>
						<h3>Pending Courses</h3>
						<th>Course</th>
						<th>Date Registered</th>
					</tr>
					<?php
						while($row = mysqli_fetch_assoc($result2))
						{
							echo "<tr><td>".$row["course"]."</td>";				
							echo "<td>".$row["applied_date"]."</td>";				
						}
					?>
					
			</table>
	</form>
		<div class="footerProfile">
			<footer>
				Copyright @ Innovative Training 2020
				</footer>
			</div>
<script src="javascript/app.js"></script>
</body>
</html>