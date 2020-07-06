<?php ob_start(); ?>
<?php include("../../php/db.php"); ?>
<?php session_start(); ?>
<?php
if($_SESSION['username']!="admin")
{
 header("location:../index.php");
}?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
		.profile ul li a
		{
			text-decoration: none;
			color: white;
		}
		.profile ul li
		{
			display: inline;
			margin-right: 10px;
		}
		h2 a
		{
			color: white;
			text-decoration: none;
		}
		h2 a:hover
		{
			text-decoration: none;
		}
	</style>
</head>
<body>
	<header>
		<div class="nav-bar">
		<div class="container">
		<div class="logo left"><h2><a href="../index.php">Admin</a></h2></div>
		<div class="profile right">
			<ul type="none">
				<li><a href="../index.php">Blog</a></li>
				<li><a href="../../logout.php"><i class="fa fa-power-off" aria-hidden="true"></i></a></li>
			</ul>
		</div>
		
		<div class="sidebar left">
			<ul>
				<li><a href="../index.php">Add Posts</a></li>
				<li><a href="view_post.php">View Posts</a></li>
				<li><a href="users.php">Users</a></li>
			</ul>
		</div>
		<div class="content right">
			<h2>View Posts</h2>
			<hr>
				<table>
					<thead>
						<tr>
							<th>Id</th>
							<th>Username</th>
							<th>FirstName</th>
							<th>LastName</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody>
						
							<?php
							$query="SELECT * FROM users";
							$show_query=mysqli_query($connection,$query);
							while($row=mysqli_fetch_assoc($show_query))
							{
								$id=$row['user_id'];
								$username=$row['username'];
								$firstname=$row['user_firstname'];
								$lastname=$row['user_lastname'];
								$email=$row['user_email'];
								echo "<tr>";
								echo "<td>$id</td>";
								echo "<td>$username</td>";
								echo "<td>$firstname</td>";
								echo "<td>$lastname</td>";
								echo "<td>$email</td>";
								echo "</td>";

							}
							  ?>
						
					</tbody>
				</table>
				
		</div>
		</header>
	

</body>
</html>