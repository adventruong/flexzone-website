<!--
Name: 			Jesse Truong
Student #: 		1222722
Student ID: 	truonj8
Project:		4WW3 - Project Part 3 - Server-side
Updated:		December 5th, 2016
-->

<?php		//php code to check if the user is logged in
	if(!isset($_SESSION['isLoggedIn'])){		//if logged in, start a session
		session_start();
	}
	if (!isset($_SESSION['isLoggedIn'])) {		//otherwise redirect to the login page
		header("Location: login.php");
		exit();
	}
?>