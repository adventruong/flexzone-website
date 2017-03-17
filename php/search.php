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
		<meta name="description" content="search page for flex zone">
		<meta name="keywords" content="search, page, flex, zone, gym">
		<link href="project.css" rel="stylesheet" type="text/css"/>							<!--link to my css for formatting-->
		<script src="project.js"></script>
		<script src="https://maps.google.com/maps/api/js?sensor=false&key=AIzaSyB9EIXD8SUDJTF9lQzi3RV0AuJ6HtQNWBo"></script>
		<title>Flex Zone</title>															<!--sets the tab text on a window-->
	</head>
	<body>
		<div id="wrapper">																	<!--wrapper used to pack everything together-->
			<?php include 'menu.php';?>														<!--display the upper portion of the page (login, title, nav bar)-->
			<div id="mainpage">
				<div id="searchpage">															<!--container for the main part of the page-->
					<h2>Begin your healthier lifestyle below</h2>
					<form method=POST action="results_sample.php">											<!--form created to allow users to search for gyms - the action allows the submit button at the bottom to redirect to searchresults page-->
						Keywords:<br>															
						<input type="text" name="searchname" placeholder="E.g. GoodLife Fitness" autofocus><br><br>	<!--text input to allow users to enter in keywords for searching for gyms-->
						Location:<br>
						<select>																<!--location is created using select to create a dropdown menu where users can choose between various options-->
							<option value="lessthanten">Less than 10km</option>
							<option value="eleventotwenty">10km - 20km</option>
							<option value="twentyonetothirty">21km - 30km</option>
							<option value="thirtyonetoforty">31km - 40km</option>
							<option value="fortyonetofifty">41km - 50km</option>
							<option value="greaterthanfifty">Greater than 50km</option>
						</select><br><br>
						Average Rating:<br>														<!--average rating is created using select to create a dropdown menu where users can choose between various options-->
						<select name="rating">
							<option value="null"></option>										<!--null is the first option so that users may choose to search without having to choose an average rating-->
							<option value="10">10</option>
							<option value="9">9</option>
							<option value="8">8</option>
							<option value="7">7</option>
							<option value="6">6</option>
							<option value="5">5</option>
							<option value="4">4</option>
							<option value="3">3</option>
							<option value="2">2</option>
							<option value="1">1</option>
						</select><br><br>
						Open&nbsp;24hrs:<br>
						<select>																<!--created a dropdown menu to allow for users to choose if they want to search for gyms that are open 24 hours-->
							<option value="nothing"></option>									<!--null first option to users may choose not to filter gyms with this criteria-->
							<option value="yes">Yes</option>
							<option value="no">No</option>
						</select><br><br><br>
						<input type="submit" name="searchsubmit" value="Search">				<!--submit input to submit the user search when finished-->		
					</form>
					<p>Or</p>
					<form method=POST action="results_sample.php">
						<input type="submit" name="searcharound" value="Search around you"><br>
					</form>
				</div>
			</div>
			<?php include 'footer.inc';?>    	<!--include the footer from the footer.inc file-->
		</div>
	</body>
</html>