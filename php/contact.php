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
		<meta name="description" content="signup page for flex zone">
		<meta name="keywords" content="signup, sign, up, flex, zone, gym">
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyB9EIXD8SUDJTF9lQzi3RV0AuJ6HtQNWBo"></script>
		<script type="text/javascript" src="project.js"></script>
		<link href="project.css" rel="stylesheet" type="text/css"/>							<!--link to my css for formatting-->
		<title>Flex Zone</title>															<!--sets the tab text on a window-->
	</head>
	<body>
		<div id="wrapper">																	<!--wrapper used to pack everything together-->
			<?php include 'menu.php';?>														<!--display the upper portion of the page (login, title, nav bar)-->
			<div id="mainpage">
				<div id="contactpage">															<!--container for the main part of the page-->
					<h2>Feel Free to Contact Us</h2>											<!--contact page was made to display student information-->
					<p>Jesse Truong</p>
					<p>1222722</p>
					<p>truonj8@mcmaster.ca</p>
				</div>
			</div>
			<?php include 'footer.inc';?>    	<!--include the footer from the footer.inc file-->
		</div>
	</body>
</html>