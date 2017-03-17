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
		<meta name="description" content="registration page for flex zone">
		<meta name="keywords" content="registration, flex, zone, gym">
		<link href="project.css" rel="stylesheet" type="text/css"/>							<!--link to my css for formatting-->
		<script type="text/javascript" src="project.js"></script>
		<title>Flex Zone</title>															<!--sets the tab text on a window-->
	</head>
	<body>
		<div id="wrapper">																	<!--wrapper used to pack everything together-->
			<?php include 'menu.php';?>														<!--display the upper portion of the page (login, title, nav bar)-->
			<div id="mainpage">
				<div id="registrationpage">														<!--container for the main part of the page-->
					<h2>Register Now!</h2>
					<form method=POST onsubmit="return(validate());">																		<!--form for users to register for an account-->
						First Name:
						<input type="text" id="firstname" name="firstname" placeholder="John" required pattern="[A-Za-z]+" title="Must only contain letters" autofocus>		<!--text input for first name and last name-->
						Last Name:
						<input type="text" id="lastname" name="lastname" placeholder="Smith" required pattern="[A-Za-z]+" title="Must only contain letters"><br><br>
						Birthday:
						<input type="date" name="birthday" min="1916-01-01" max="2016" required><br><br>	<!--date input to enter their birthdays with a minimum date and maximum date in order to keep trolls away-->
						Gender:
						<input type="radio" name="gender" value="male" checked> Male  <input type="radio" name="gender" value="female"> Female<br><br>	<!--radio inputs to select genders, they have the same name so that only one button can be selected at once-->
						Email Address:
						<input type="email" id="email" name="email" placeholder="john.smith@email.com" required><br><br>	<!--email input for users to enter their emails in-->
						Confirm Email Address:
						<input type="email" id="email_confirm" name="email" placeholder="john.smith@email.com" onkeyup="emailValidate()" required><br><br>
						Password:
						<input type="password" name="password" id="password" placeholder="Minimum 6 characters" required pattern=".{6,}" title="Must be at least 6 characters"><br><br>							<!--password input for users to enter a password and having it starred out in asterisks-->
						Confirm Password:
						<input type="password" name="password" id="password_confirm" placeholder="Confirm your password" onkeyup="passwordValidate()" required><br><br><br>
						<div id="confirmmessage"></div>
						<h6>By clicking Sign Up, you agree to our Terms and Services and have read our policy</h6>					<!--terms of service statement-->
						<input type="submit" name="signup" value="Sign Up">						<!--submit input for a submit button for the form-->
					</form>
				</div>
			</div>
			<?php include 'footer.inc';?>    	<!--include the footer from the footer.inc file-->
		</div>
	</body>
	<?php include 'registeruser.php';?>
</html>
