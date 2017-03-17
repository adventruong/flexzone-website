<!--
Name: 			Jesse Truong
Student #: 		1222722
Student ID: 	truonj8
Project:		4WW3 - Project Part 3 - Server-side
Updated:		December 5th, 2016
-->

<!--users must be logged in before accessing the page-->
<?php require 'logged_in.php';?>
<?php include 'generate_sample.php';?>
<!DOCTYPE html>																				<!--sets doc to HTML-->
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Jesse Truong">
		<meta name="description" content="individual sample web page for flex zone">
		<meta name="keywords" content="individual, sample, object, flex, zone, gym">
		<link href="project.css" rel="stylesheet" type="text/css"/>							<!--link to my css for formatting-->
		<script src="project.js"></script>
		<title>Flex Zone</title>															<!--sets the tab text on a window-->
	</head>
	<body>
		<div id="wrapper">																	<!--wrapper used to pack everything together-->
			<?php include 'menu.php';?>														<!--display the upper portion of the page (login, title, nav bar)-->
			<div id="mainpage">
				<div id="submission">															<!--container for the overall page-->
					<div id="samplemap" style="width:100%;height:500px">	
						<?php include 'create_samplemap.php'?>
					</div>
					<table>																		<!--information is placed in a tabular format in order to keep it neat and organized-->
						<tr>
							<th><?php echo $gymname;?></th>									<!--title of the gym located at the top of the section-->
						</tr>
						<tr>																	<!--second row used to display coordinates of the gym and create the text to be a hyperlink that opens a new tab to google maps with the location set-->
							<td>
								<a target="_blank" href="http://www.maps.google.com/?q=<?php echo $lat;?>,<?php echo $lon;?>"><?php echo $lat;?>&deg N, <?php echo $lon;?>&deg E</a> 
							</td>
						</tr>
						<tr>																	<!--third row used to display average rating of the gym-->
							<td>Rating: <?php echo $rating;?>/10</td>
						</tr>
						<tr>
							<td><img src="images/pulse1.jpg"></td>								<!--row to display a picture of the gym for aesthetics-->
						</tr>
						<tr>																	<!--row used to give users a description of the gym taken from the website-->
							<td><p><?php echo $description;?></p>
							</td>
						</tr>
					</table>
					<div id="hoursreviews">															<!--container to keep the hours and reviews in line with one another-->
						<div id="reviews">															<!--container for the reviews on the page-->
							<h2>Reviews:</h2>
							<?php include 'generate_reviews.php';?>
						</div>
						<div id="hours">															<!--container for the hours of the gym-->
							<h3>Hours</h3>
							<table>																	<!--hours are created in a table in order to display in an orderly fashion-->
								<tr>
									<td>Sun</td>
									<td>8:30AM - 9:30PM</td>
								</tr>
								<tr>
									<td>Mon</td>
									<td>6:00AM - 11:30PM</td>
								</tr>
								<tr>
									<td>Tues</td>
									<td>6:00AM - 11:30PM</td>
								</tr>
								<tr>
									<td>Wed</td>
									<td>6:00AM - 11:30PM</td>
								</tr>
								<tr>
									<td>Thurs</td>
									<td>6:00AM - 11:30PM</td>
								</tr>
								<tr>
									<td>Fri</td>
									<td>6:00AM - 11:30PM</td>
								</tr>
								<tr>
									<td>Sat</td>
									<td>8:30AM - 9:30PM</td>
								</tr>
							</table>
						</div>
					</div>
					<h1>Submit a review</h1>
					<form method=POST>
						Review:<br>
						<textarea placeholder="Enter your review here" name="subreview" required pattern="[A-Za-z0-9\s]+"></textarea><br>
						Rating:<br>
						<select name="subrating" id="subrating">
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
						<input type="submit" name="reviewsubmit">
					</form>
					<p><a href="">Load More Reviews...</a></p>		<!--hyperlink to load more reviews in the future-->
				</div>
			</div>
			<?php include 'footer.inc';?>    	<!--include the footer from the footer.inc file-->
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9EIXD8SUDJTF9lQzi3RV0AuJ6HtQNWBo&callback=createIndividual"></script>
		</div>
		
	</body>
</html>
