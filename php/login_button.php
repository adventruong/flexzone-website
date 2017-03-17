<!--
Name: 			Jesse Truong
Student #: 		1222722
Student ID: 	truonj8
Project:		4WW3 - Project Part 3 - Server-side
Updated:		December 5th, 2016
-->

<?php
	if(isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'])){		//check if the user is already logged in, if yes then change the login buttons at the top to logout
		echo "
			<script type=\"text/javascript/\">	
				document.getElementById(\"loginbutton\").innerHTML = \"Logout\";
				document.getElementById(\"loginbutton\").href = \"logout.php\";
			</script>
		";
	}
?>