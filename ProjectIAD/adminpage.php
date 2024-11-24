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

	$sql = "SELECT * FROM coursetbl";
	$result = mysqli_query($conn,$sql);	
	$sql2 = "SELECT * FROM regtbl";
	$result2=mysqli_query($conn,$sql2);
	$sql3 = "SELECT * FROM applicationtbl";
	$result3=mysqli_query($conn,$sql3);

?>
<html>
<head>
<meta charset="utf-8">
<title>Admin Panel</title>
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
				if($login == true){
					echo "<li><a href='profile.php'>Profile</a></li>";
					if($role =="admin")
						echo "<li><a href='adminpage.php'>Admin Panel</a></li>";
					echo "<li><a href='logout.php'>LogOut</a></li>";
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
	<div class="admin">
		<h2>Course Table</h2>
			<table border="1" style="text-align: center;height: 400px;">
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
				echo"<td><form method='post' action='editcourse.php'>
					<input type='hidden' value='".$row["id"]. "' name='id'>
					<input type='submit' value='Edit'></form>";
				echo"<form method='post' action='deletecourse.php'>
					<input type='hidden' value='".$row["id"]. "' name='id'>
					<input type='submit' value='Delete'></form></td></tr>";
					
			}
				?>
				</table>
				<form method="post" action="insertcourse.php">
				<input type="submit" value="Insert New Course" class="admin">
				</form>
		<h2>Accpted User</h2>
			<table border="1px" class="regtable" style="height: 50px">
				<tr>
					<th width="5%" height="10px">ID</th>
					<th width="10%">Name</th>
					<th width="15">Course</th>
					<th width="10%">Contact</th>
					<th width="15%">Date Registered</th>
					<th width="15%">Email</th>
					<th width="10%">Action</th>
				</tr>		
			<?php
				while($row = mysqli_fetch_assoc($result2))
				{
					echo "<tr><td>" .$row["id"]. "</td>";
					echo "<td>" .$row["name"]. "</td>";
					echo "<td>" .$row["course"]. "</td>";
					echo "<td>" .$row["contact"]. "</td>";
					echo "<td>" .$row["dateregistered"]. "</td>";
					echo "<td>" .$row["email"]. "</td>";
					echo "<td><form method='post' action='editreg.php'>
						 <input type='hidden' value='" .$row["id"]."' name='id'>
						 <input type='submit' value='Edit'></form>";
					echo "<form method='post' action='deletereg.php'>
						 <input type='hidden' value='" .$row["id"]."' name='id'>
						 <input type='submit' value='Delete'></form></td></tr>";
					
				}
				?>
				</table>
	<h2>Pending Users</h2>
		<table border="1" style="height: 50px">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Course</th>
				<th>Contact</th>
				<th>Gender</th>
				<th>Email</th>
				<th>Reason</th>
				<th>Action</th>
			</tr>	
	<?php			
		while($row =mysqli_fetch_assoc($result3))			
			{
				echo"<tr><td>" .$row["id"]."</td>";
				echo"<td>" .$row["name"]."</td>";
				echo"<td>" .$row["course"]."</td>";
				echo"<td>" .$row["phone"]."</td>";
				echo"<td>" .$row["gender"]."</td>";
				echo"<td>" .$row["email"]."</td>";
				echo"<td>" .$row["reason"]."</td>";
				echo"<td><form method='post' action='addinreg.php'>
					<input type='hidden' value='" .$row["id"]. "' name='id'>
					<input type='submit' value='Accept'></form>";
				echo"<form method='post' action='rejectreg.php.php'>
					<input type='hidden' value='" .$row["id"]. "' name='id'>
					<input type='submit' value='Decline'></form></td></tr>";
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