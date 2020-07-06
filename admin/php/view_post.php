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
				<li><a href="user.php">Users</a></li>
			</ul>
		</div>
		<div class="content right">
			<h2>View Posts</h2>
			<hr>
				<table>
					<thead>
						<tr>
							<th>Id</th>
							<th>Blog Title</th>
							<th>Blog Image</th>
							<th>Blog Content</th>
							<th>Blog Author</th>
						</tr>
					</thead>
					<tbody>
						
							<?php
							$query="SELECT * FROM blog";
							$show_query=mysqli_query($connection,$query);
							while($row=mysqli_fetch_assoc($show_query))
							{
								$blog_id=$row['blog_id'];
								$blog_title=$row['blog_title'];
								$blog_image=$row['blog_photo'];
								$blog_content=$row['blog_content'];
								$blog_author=$row['blog_author'];
								echo "<tr>";
								echo "<td>$blog_id</td>";
								echo "<td>$blog_title</td>";
								echo "<td><img src='../image/$blog_image' width='100px' alt='image'></td>";
								echo "<td>$blog_content</td>";
								echo "<td>$blog_author</td>";
								echo "<td><a href='edit_blog.php?edit=$blog_id'>Edit</a></td>";
								echo "<td><a href='view_post.php?delete=$blog_id'>Delete</a></td>";
								echo "</tr>";
							}
							if(isset($_GET['delete']))
							{
								$blog_id=$_GET['delete'];
								$query="DELETE FROM blog WHERE blog_id='$blog_id'";
								$delete_query=mysqli_query($connection,$query);
								header("location:view_post.php");
							}


							  ?>
						
					</tbody>
				</table>
				
		</div>
		</header>
	

</body>
</html>