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

	</style>
</head>
<body>
	<header>
		<div class="nav-bar">
		<div class="container">
		<div class="logo left"><h2>Admin</h2></div>
		<div class="profile right">
			<ul type="none">
				<li><a href="../index.php">Blog</a></li>
				<li><a href="../../logout.php"><i class="fa fa-power-off" aria-hidden="true"></i></a></li>
			</ul>
		</div>
		<div class="clear"></div>
		</div>
		</div>
		
		<div class="sidebar left">
			<ul>
				<li><a href="index.php">Edit Posts</a></li>
				<li><a href="view_post.php">View Posts</a></li>
			</ul>
		</div>
		<div class="content right">
			<h2>Add Posts</h2>
			<hr>
			<div class="form left">
				<form method="post" enctype="multipart/form-data">
					<?php 
					if(isset($_GET['edit']))
					{
						$blog_id=$_GET['edit'];
						$query="SELECT * FROM blog Where blog_id='$blog_id'";
						$show_query=mysqli_query($connection,$query);
						while($row=mysqli_fetch_assoc($show_query))
							{
								$blog_title=$row['blog_title'];
								$blog_image=$row['blog_photo'];
								$blog_content=$row['blog_content'];
								$blog_author=$row['blog_author'];
							}
					}
					if(isset($_POST['update']))
					{
						$image=$_FILES['image']['name'];
    					$image_temp=$_FILES['image']['tmp_name'];
    					$title=$_POST['title'];
						$content=$_POST['content'];
						$author=$_POST['author'];
						move_uploaded_file($image_temp,"../image/$image");
						if($content == "" || $author == "")
						{
							echo "Fields cannot be empty";
						} 
						else
						{
						$query="UPDATE blog SET blog_title='$title', blog_photo='$image', blog_content='$content', blog_author='$author' WHERE blog_id='$blog_id' ";
						$update_query=mysqli_query($connection,$query);
						if(!$update_query)
						{
							die('Query failed' . mysqli_error($connection));
						}
						else
						{
							header("location:edit_blog.php?edit=$blog_id");
						}
						}
					}

					?>
					<div class="form-group">
						<label for="photo">Add Photo</label>
						<img src="../image/<?php if(isset($blog_image)) echo $blog_image; ?>" alt='image' width='100px' class='form-control'>
						<input type="file" name="image" >
					</div>
					<div class="form-group">
						<label for="content">Content</label>
						<textarea class="form-control" name="content"><?php if(isset($blog_content)) echo $blog_content; ?></textarea>
					</div>
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" class="form-control" value="<?php if(isset($blog_title)) echo $blog_title; ?>">
					</div>
					<div class="form-group">
						<label>Author</label>
						<input type="text" name="author" class="form-control" value="<?php if(isset($blog_author)) echo $blog_author; ?>">
					</div>
					<input type="submit" name="update" value="Update" class="btn btn-color">
				</form>
				
			</div>
		</div>
		</header>
	

</body>
</html>