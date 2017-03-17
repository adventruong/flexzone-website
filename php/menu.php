<!--
Name: 			Jesse Truong
Student #: 		1222722
Student ID: 	truonj8
Project:		4WW3 - Project Part 3 - Server-side
Updated:		December 5th, 2016
-->

<div id="login">																<!--div tag to create the login bar-->
	<ul>
		<?php
			if(!isset($_SESSION['isLoggedIn'])){
				session_start();
			}
			if(isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'])){		//change the login button to either login or logout depending on what the currect session is
				echo "
					<li><a href=\"logout.php\">Logout</a></li>
				";
			}else{
				echo "
					<li><a href=\"login.php\" id=\"loginbutton\">Login</a></li>
				";
			}
		?>
		<li><a href="registration.php">Sign Up</a></li>
	</ul>
</div>
<div id="header">																<!--header area where the name of the site is located with images-->
	<div id="leftarm">															<!--container for the left arm-->
		<img src="images/leftflex.png">
	</div>
	<div id="titleflex">														<!--container for the name of website. had to use nbsp because an actual space was causing the name to split into two lines on smaller resolutions-->
		<h1>FLEX&nbsp;ZONE</h1>
	</div>
	<div id="rightarm">															<!--container for right bicep-->
		<img src="images/rightflex.png">
	</div>
</div>
<div id="menu">																	<!--container for the menu bar below the title which includes the search bar-->
	<ul>																		<!--menu is created in a list to keep items in line with each other-->	
		<a href="results_sample.php"><img src="images/searchicon.png"></a>		<!--users must press on the icon to search which currently brings them to the results page-->
		<form method=POST action="results_sample.php">
			<li><input type="search" placeholder="Search" name="search"></li>						<!--menu is listed backwards so it displays correctly from left to right-->
		</form>
		<li><a href="search.php">Home</a></li>
		<li><a href="submission.php">Submit</a></li>
		<li><a href="profile.php">Profile</a></li>
		<li><a href="contact.php">Contact</a></li>
	</ul>
</div>