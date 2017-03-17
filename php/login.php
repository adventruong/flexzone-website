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
		<meta name="description" content="login page for flex zone">
		<meta name="keywords" content="login, signup, flex, zone, gym">
		<link href="project.css" rel="stylesheet" type="text/css"/>							<!--link to my css for formatting-->
		<title>Flex Zone</title>															<!--sets the tab text on a window-->
	</head>
	<body>
		<div id="wrapper">																	<!--wrapper used to pack everything together-->
			<?php include 'menu.php';?>														<!--display the upper portion of the page (login, title, nav bar)-->
			<div id="mainpage">
				<div id="loginpage">															<!--container for the main part of the page-->
					<h2>Login</h2>
					<form method=POST action = "login.php">																		<!--form format to keep it in order and allow users to login-->
						Email Address:
						<input type="email" name="email" placeholder="john.smith@email.com" required autofocus><br><br>	<!--email input to allow users to enter email addresses that may be saved-->
						Password:
						<input type="password" name="password" required><br><br><br>										<!--password input to allow for discretion when users type in their passwords-->
						<input type="submit" name="login" value="Login">										<!--submit input to submit their login information to the system to login-->
					</form>
				</div>
			</div>
			<?php include 'footer.inc';?>    	<!--include the footer from the footer.inc file-->
		</div>
		<?php include 'check_login.php'?>
	</body>
</html>
