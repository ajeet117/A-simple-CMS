<!-- header file-->
<?php include("php/header.php"); ?>
<!-- blog content-->

	<?php 
	if(!isset($_SESSION['username']))
	{
		header("location:login.php");
	}
	else
	{
		 		$page_limit=1;
                if(isset($_GET['page']))
                {
                    $page=$_GET['page'];

                } 
                else
                {
                    $page="";
                }
                if($page==""|| $page==1)
                {
                    $page_1=0;
                }
                else
                {
                    $page_1=($page*$page_limit)-$page_limit;
                }
                $query="SELECT * FROM blog";
                $blogcount=mysqli_query($connection,$query);
                $count=mysqli_num_rows($blogcount);
                $count=ceil($count/$page_limit);

	$query="SELECT * FROM blog LIMIT $page_1,$page_limit ";
	$show_query=mysqli_query($connection,$query);
	while($row=mysqli_fetch_assoc($show_query))
	{
		$blog_title=$row['blog_title'];
		$blog_image=$row['blog_photo'];
		$blog_content=$row['blog_content'];
		$blog_author=$row['blog_author'];
	?>
	<div class="blog-content">
		<div class="container">
	<h1><?php if(isset($blog_title)) echo $blog_title; ?></h1>
	<div class="img">
		<img src="admin/image/<?php if(isset($blog_image)) echo $blog_image; ?>" alt="Image" width="100%">
	</div>
	<div class="content">
		<p>
	<?php if(isset($blog_content)) echo $blog_content; ?>
	</p>
	</div>
	<div class="author">
		-By <?php if(isset($blog_author)) echo $blog_author; ?>
	</div>
	</div>
	</div>
<?php	}
		}
	?>


<!-- footer file-->
  <ul class="pager">
            <?php
            for($i=1; $i<=$count;$i++)
            {
               echo  "<li><a href='index.php?page=$i'>$i</a></li>";
            }



             ?>

            
        </ul>
<?php include("php/footer.php"); ?>