<!-- header file -->
<?php include("php/header.php"); ?>
<!-- form begin-->
	<div class="container">
		<div class="form">
		<h1>Registration</h1>
		<?php 
		$message="";
		$error="";
		if(isset($_POST['submit']))
		{
			$firstname=$_POST['firstname'];
			$middlename=$_POST['middlename'];
			$lastname=$_POST['lastname'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$re_password=$_POST['re_password'];
			$email=$_POST['email'];
			$firstname=mysqli_real_escape_string($connection,$firstname);
			$middlename=mysqli_real_escape_string($connection,$middlename);
			$lastname=mysqli_real_escape_string($connection,$lastname);
			$username=mysqli_real_escape_string($connection,$username);
			$password=mysqli_real_escape_string($connection,$password);
			$re_password=mysqli_real_escape_string($connection,$re_password);
			$email=mysqli_real_escape_string($connection,$email);
			$hashformat="$2y$10$";
			$salt="iusesomecrazystrings22";
			$protect=$hashformat.$salt;
			

			
			 if($firstname !="" && $lastname !="" && $password !="" && $email !="" && $username !="")
			 {
			 	if($password !== $re_password)
				{
					$message="Password donot Match";
				}
				else
				{
					$password=crypt($password,$protect);
					$query="INSERT INTO users(username, user_password, user_email, user_firstname, user_lastname, user_middlename) ";
					$query.="VALUE('$username','$password','$email','$firstname','$lastname','$middlename')";
					$result=mysqli_query($connection,$query);
					if(!$result)
					{
						die("Query Failed" .mysqli_error($connection));
					}
					else 
					{	
						header("location:index.php");
					}
			 	}
			}
			else
			{
				$error="<p style='color:red;'>Please fill this field</p>";
			}
		}




		?>
		<form method="post" action="" name="myform" >
			<div class="display">
			<div class="form-group">
				<label for="firstname">First Name</label>
				<input type="text" name="firstname" class="form-control" placeholder="Enter Firstname">
				<p><?php echo $error ?></p>
			</div>
			
			<div class="form-group">
				<label for="middlename">Middle Name</label>
				<input type="text" name="middlename" class="form-control" placeholder="Enter Middle Name">
			</div>
			<div class="form-group">
				<label for="lastname">Last Name</label>
				<input type="text" name="lastname" class="form-control" placeholder="Enter Last Name">
				<p><?php echo $error ?></p>
			</div>
			
			</div>
			<div class="form-group">
				<label for="username">User Name</label>
				<input type="text" name="username" class="form-control" placeholder="Enter User Name">
				<?php echo $error ?>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" class="form-control" placeholder="Enter your Email">
				<?php echo $error ?>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control" placeholder="Enter password">
				<?php echo $error ?>
			</div>
			<div class="form-group">
				<label for="re-password">Re-Password</label>
				<input type="password" name="re_password" class="form-control" placeholder="Re-enter password">
				<?php echo $message ?>
			</div>
			<input type="submit" class="btn btn-color" name="submit" value="submit" >
		</form>	
	</div>
	</div>
	<!-- footer file-->
	
	<?php include("php/footer.php") ?>