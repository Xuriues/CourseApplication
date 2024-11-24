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
include_once("db.php");
$sql = "SELECT * FROM coursetbl";
$result = mysqli_query($conn,$sql);
$userid = file_get_contents("curruser.txt");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Courses</title>
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
</head>

<body id="tableBody">
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
			<table>
				<tr>
					<th width="10%">Course Name</th>
					<th width="10%">Price</th>
					<th width="60%">Description</th>
					<th width="5%">Duration</th>
					<th width="10%">Available Seats</th>
					<th width="5%">Actions</th>
				</tr>		
			<?php
				while($row = mysqli_fetch_assoc($result))
				{
					echo"<tr><td>" .$row["course"]."</td>";
					echo"<td>" .$row["price"]."</td>";
					echo"<td>" .$row["description"]."</td>";
					echo"<td>" .$row["duration"]."</td>";
					echo"<td>" .$row["availseat"]."</td>";
				$course=$row['course'];
				$result2 = mysqli_query($conn,"SELECT * FROM regtbl WHERE user_id =$userid AND course ='$course'");				
				$result3 = mysqli_query($conn,"SELECT * FROM applicationtbl WHERE user_id =$userid AND course ='$course'");	
				if($login == true)
				{
					if(mysqli_num_rows($result2) <= 0 && mysqli_num_rows($result3) <= 0 && $row["availseat"] > 0)
					{
						echo "<td><form action='applycourse.php' method='post'>
							<input type='hidden' value ='". $row["course"] ."' name='course'>
							<input type='submit' value='Apply'>
							</form></td></tr>";									
					}
					else if(mysqli_num_rows($result2) > 0 || mysqli_num_rows($result3) > 0 && $row["availseat"] > 0)
						echo "<td><input type='submit' value='Applied' disabled></td></tr>";	
					else
						echo "<td><input type='submit' value='Full' disabled></td></tr>";	

				}
				else
				{
					echo "<td><form action='login.php' method='post'>
							<input type='submit' value='Apply'>
							</form></td></tr>";	
				}
			}
				?>
			</table>
	</div>
			<div class="footer">
			<footer>
				Copyright @ Innovative Training 2020
				</footer>
			
			</div>
	<script src="javascript/app.js"></script>
</body>
</html>