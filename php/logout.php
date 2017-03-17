<!--
Name: 			Jesse Truong
Student #: 		1222722
Student ID: 	truonj8
Project:		4WW3 - Project Part 3 - Server-side
Updated:		December 5th, 2016
-->

<!DOCTYPE html>																				<!--sets doc to HTML-->
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Jesse Truong">
		<meta name="description" content="logout page for flex zone">
		<meta name="keywords" content="logout, sign, out, flex, zone, gym">
		<link href="project.css" rel="stylesheet" type="text/css"/>							<!--link to my css for formatting-->
		<title>Flex Zone</title>															<!--sets the tab text on a window-->
	</head>
	<body>																								<!--body tag contains main website content to display-->
		<div id="wrapper">																				<!--All following tags will be located within this tag-->
			<?php
				if(!isset($_SESSION['isLoggedIn'])){
					session_start();
				}
				session_destroy();
				unset($_SESSION['isLoggedIn']);
			?>
			<?php include 'menu.php';?>														<!--display the upper portion of the page (login, title, nav bar)-->
			<div id="mainpage">
				<div id="loginpage">
					<h1>Logged Out</h1>
				</div>
			</div>
			<?php include 'footer.inc';?>
		</div>
	</body>
</html>
