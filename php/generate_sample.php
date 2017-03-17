<!--
Name: 			Jesse Truong
Student #: 		1222722
Student ID: 	truonj8
Project:		4WW3 - Project Part 3 - Server-side
Updated:		December 5th, 2016
-->

<?php				//php code used to generate the map in the individual_sample page as well as input any new reviews into the database
	try{
		$gymid = $_GET['id'];			//get the ID of which gym was clicked in the results_sample page
		
		$pdo = new PDO('mysql:host=localhost;dbname=flexzone','root','123456789');		//login to the database
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);				//attributes for the database to handle
				
		$sql = $pdo->prepare("SELECT * FROM gyms WHERE id = '$gymid'");		//setup the query for the gyms that match the ID clicked on the results_sample page
		$sql->execute();			//execute the query
		
		$row = $sql->fetch(PDO::FETCH_ASSOC);		//get the first row of the  query
		$gymid = intval($row['id']);				//set the variables 
		$gymname = strval($row['name']);
		$lat = floatval($row['latitude']);
		$lon = floatval($row['longitude']);
		$description = strval($row['description']);
		$rating = intval($row['rating']);

	
		if(isset($_POST['reviewsubmit'])){				//check if the reviewsubmit button is pressed
			$objrating = $_POST['subrating'];
			$objreview = $_POST['subreview'];
			$objuser = $_SESSION['name'];
			$objreview = mysql_real_escape_string($objreview);

			
			$pdo = new PDO('mysql:host=localhost;dbname=flexzone','root','123456789');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			if (empty($objreview)){
				echo '<script>alert("Please fill in a review");</script>';		//see if the review has been filled in
			}else{
				$sqlnew = $pdo->prepare("INSERT INTO reviews(gymid, name, review, rating) VALUES('$gymid','$objuser','$$objreview','$objrating')");  //insert into the database
				$sqlnew->execute();
			}
			
		}
	}catch (PDOException $e) {
		echo "Error: ".$e->getMessage();
	}
?>