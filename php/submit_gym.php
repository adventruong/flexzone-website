<!--
Name: 			Jesse Truong
Student #: 		1222722
Student ID: 	truonj8
Project:		4WW3 - Project Part 3 - Server-side
Updated:		December 5th, 2016
-->

<?php 			//php code to submit the gym
	try{
		if(isset($_POST['gymsubmit'])){

			$objgym = $_POST['gymname'];
			$objdesc = strval($_POST['gymdescription']);
			$objlat = $_POST['latcoordinates'];
			$objlon = $_POST['loncoordinates'];
			
			$pdo = new PDO('mysql:host=localhost;dbname=flexzone', 'root', '123456789');		//login to db
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		//set attributes for db to handle
			
			$sql = $pdo->prepare("INSERT INTO gyms(name, longitude, latitude, description, rating) VALUES('$objgym','$objlon','$objlat','$objdesc','10')");		//prepare the query to insert into db
			$sql->execute();
		}
	}
	catch (PDOException $e) {
		echo "Error: ".$e->getMessage();
	}		
?>