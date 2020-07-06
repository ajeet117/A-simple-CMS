<?php ob_start(); ?>
<?php session_start(); ?>
<?php include("php/db.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link href="https://fonts.googleapis.com/css?family=Ibarra+Real+Nova&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Fruktur&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.logo
		{
			float: left;
		}
		.logout
		{
			float:right;
		}
		.clear
		{
			clear: both;
		}
		.logout ul li
		{
			font-size: 24px;
			text-transform: uppercase;
		}
	</style>
</head>
<body>
	<header>
		<div class="container">
		<div class="logo">Blog</div>
		<div class="logout">
			<ul>
				<li><a href="admin/index.php">admin</a></li>
				<li><a href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i></a></li>
			</ul>
			</div>
		<div class="clear"></div>
		</div>
	</header>