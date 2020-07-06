<!-- header file -->
<?php include("php/header.php"); ?>
<style type="text/css">
	.form
	{
		width: 50%;
		margin:  67.5px auto;
	}
	.form p
	{
		margin-bottom: 15px;
		font-size: 18px;
	}
	.form
	{
		position: relative;
	}
	footer
	{
		position: absolute;
		bottom: 0px;
		width: 100%;
	}
</style>
<!--login form-->
<div class="container">
<div class="form">
	<h1>Login</h1>
	<?php 
	$message="";
	$error="";
	if(isset($_POST['submit']))
	{
		$db_username="";
		$db_password="";
		$username=$_POST['username'];
		$password=$_POST['password'];
		$username=mysqli_real_escape_string($connection,$username);
		$password=mysqli_real_escape_string($connection,$password);
		$query="SELECT * FROM users WHERE username='$username' ";
		$result=mysqli_query($connection,$query);
		if(!$result)
		{
			die("query failed". mysqli_error($connection));
		}
		while($row=mysqli_fetch_assoc($result))
		{
			$db_username=$row['username'];
			$db_password=$row['user_password'];
			$db_firstname=$row['user_firstname'];
			$db_lastname=$row['user_lastname'];
			$db_email=$row['user_email'];
		}
		if(empty($username) && empty($password))
		{
			$message="<p style='color:red;'>Please fill this field</p>";
		}
		else
		{
		$password=crypt($password,$db_password);
		 if($db_username == $username && $db_password == $password)
		{
			$_SESSION['username']=$db_username;
			$_SESSION['firstname']=$db_firstname;
			$_SESSION['lastname']=$db_lastname;
			$_SESSION['email']=$db_email;
			header("Location:admin/index.php");
		}
		else
		{
			$error="<p style='color:red;'>Username or Password donot match</p>";
		}

		}
	}

	?>
	<form method="post" action="">
		<h2><?php echo $error ; ?> </h2>
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" class="form-control" placeholder="Enter username">
			<?php  echo $message ;?>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" class="form-control" placeholder="Enter password">
			<?php  echo $message ;?>
		</div>
		<p><a href="signup.php">If not Register, Register Here.</a></p>
		<input type="submit" name="submit" class="btn btn-color" value="submit">

		
	</form>
	
</div>
</div>

<!-- footer file-->
<?php include("php/footer.php") ?>