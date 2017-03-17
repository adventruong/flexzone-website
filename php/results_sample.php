<!--
Name: 			Jesse Truong
Student #: 		1222722
Student ID: 	truonj8
Project:		4WW3 - Project Part 2 - Client-Side, Dynamic
Updated:		October 31st, 2016
-->

<!DOCTYPE html>																				<!--sets doc to HTML-->
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Jesse Truong">
		<meta name="description" content="sample result page for flex zone">
		<meta name="keywords" content="results, list, search, sample, flex, zone, gym">
		<link href="project.css" rel="stylesheet" type="text/css"/>							<!--link to my css for formatting-->
		
		<script src="project.js"></script>
		<title>Flex Zone</title>															<!--sets the tab text on a window-->
	</head>
	<body>
		<div id="wrapper">																	<!--wrapper used to pack everything together-->
			<?php include 'menu.php';?>														<!--display the upper portion of the page (login, title, nav bar)-->
			<?php include 'create_map.php';?>
			<div id="mainpage">
				<div id="searchresults" >														<!--container for the main portion of the screen, the search results-->
					<div id="maxdistance">
					</div>
					<div id="resultsmap" style="width:100%;height:500px">
					</div><br>
					<?php include 'results_populate.php';?>
					<p>Load More...</p>						<!--Load more hyperlink for when there are more results-->
				</div>
			</div>
			<?php include 'footer.inc';?>    	<!--include the footer from the footer.inc file-->
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9EIXD8SUDJTF9lQzi3RV0AuJ6HtQNWBo&callback=createResult"></script>
		</div>
	</body>
</html>
