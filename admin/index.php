<?php ob_start(); ?>
<?php include("../php/db.php"); ?>
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
	<link rel="stylesheet" type="text/css" href="css/styles.css">
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
		<div class="logo left"><h2><a href="index.php">Admin</a></h2></div>
		<div class="profile right">
			<ul type="none">
				<li><a href="../index.php">Blog</a></li>
				<li><a href="../logout.php"><i class="fa fa-power-off" aria-hidden="true"></i></a></li>
			</ul>
		</div>
		<div class="clear"></div>
		</div>
		</div>
		
		<div class="sidebar left">
			<ul>
				<li><a href="index.php">Add Posts</a></li>
				<li><a href="php/view_post.php">View Posts</a></li>
				<li><a href="php/users.php">Users</a></li>
			</ul>
		</div>
		<div class="content right">
			<h2>Add Posts</h2>
			<hr>
			<div class="form left">
				<form method="post" enctype="multipart/form-data">
					<?php 
					if(isset($_POST['submit']))
					{
						$image=$_FILES['image']['name'];

    					$image_temp=$_FILES['image']['tmp_name'];
    					$title=$_POST['title'];
						$content=$_POST['content'];
						$author=$_POST['author'];
						move_uploaded_file($image_temp,"image/$image");
						if($content == "" || $author == "" || $title== "")
						{
							echo "Fields cannot be empty";
						} else
						{
						$query="INSERT INTO blog(blog_title,blog_photo,blog_content,blog_author) VALUE($title,'$image','$content','$author')";
						$blog_query=mysqli_query($connection,$query);
						if(!$blog_query)
						{
							die('Query failed' . mysqli_error($connection));
						}
						else
						{
							echo " Your post has been added";
						}
						}
					}



					?>
					<div class="form-group">
						<label for="photo">Add Photo</label>
						<input type="file" name="image" >
					</div>
					<div class="form-group">
						<label for="content">Content</label>
						<textarea class="form-control" name="content"></textarea>
					</div>
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" class="form-control">
					</div>
					<div class="form-group">
						<label>Author</label>
						<input type="text" name="author" class="form-control">
					</div>
					<input type="submit" name="submit" value="submit" class="btn btn-color">
				</form>
				
			</div>
		</div>
		</header>
	

</body>
</html>