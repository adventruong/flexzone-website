<!--
Name: 			Jesse Truong
Student #: 		1222722
Student ID: 	truonj8
Project:		4WW3 - Project Part 3 - Server-side
Updated:		December 5th, 2016
-->

<?php require 'logged_in.php'?>			<!--requires the users to be logged in before accessing the page-->
<!DOCTYPE html>																				<!--sets doc to HTML-->
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Jesse Truong">
		<meta name="description" content="submission web page for flex zone">
		<meta name="keywords" content="submission, form, flex, zone, gym">
		<link href="project.css" rel="stylesheet" type="text/css"/>							<!--link to my css for formatting-->
		<script src="project.js"></script>
		<script src="https://maps.google.com/maps/api/js?sensor=false&key=AIzaSyB9EIXD8SUDJTF9lQzi3RV0AuJ6HtQNWBo"></script>
		<title>Flex Zone</title>															<!--sets the tab text on a window-->
	</head>
	<body>
		<div id="wrapper">																	<!--wrapper used to pack everything together-->
			<?php include 'menu.php';?>														<!--display the upper portion of the page (login, title, nav bar)-->
			<div id="mainpage">
				<div id="submissionform">														<!--container for the main part of the page-->
					<h2>Submit Your Gym!</h2>
					<form method=POST>																		<!--create a form that allows for users to enter in various different information to submit their gyms-->		
						Name of Gym:<br>
						<input type="text" name="gymname" id="gym" placeholder="E.g. GoodLife Fitness" required pattern="[A-Za-z0-9\s]+" title="Must only contain letters and numbers"autofocus><br><br>	<!--text input for gym name-->
						Description of Gym:<br>
						<textarea placeholder="Describe your gym in 400 characters" name="gymdescription" required></textarea><br><br>				<!--text area in order to create a box that allows for users to type and text to automatically wrap around once at the end of the box-->
						Location of Gym:<br>
						<input type="text" id="latsub" name="latcoordinates" placeholder="&deg N" required pattern="^[+-]?\d+(\.\d*)?" title="Must be a number">&nbsp;<input type="text" id="lonsub" name="loncoordinates" placeholder="&deg E" required pattern="^[+-]?\d+(\.\d*)?" title="Must be a number">	<!--text input for the latitudes and longitudes of the gym-->
						<input type="button" name="searcharound" value="Map" onclick="getLocation('submission')"><br>
						<div id="mapholder">
						</div><br>
						Attach Images: <input type="file" name="gymimages" accept="image/*"><br><br>		<!--file input to allow users to open a dialogue box to search for images to upload. only accepts files that are image formats e.g. png jpg etc.-->
						<input type="submit" name="gymsubmit" value="Submit")>										<!--submit input type to create a submit button-->
					</form>
				</div>
			</div>
			<?php include 'footer.inc';?>    	<!--include the footer from the footer.inc file-->
		</div>
		<?php include 'submit_gym.php';?>	<!--php code for when users want to submit a gym-->
	</body>
</html>
