<!--
Name: 			Jesse Truong
Student #: 		1222722
Student ID: 	truonj8
Project:		4WW3 - Project Part 3 - Server-side
Updated:		December 5th, 2016
-->

<?php		//this php will check if the users login credentials match to the database
	try{
		$pdo = new PDO('mysql:host=localhost;dbname=flexzone','root','123456789');		//login to the local database
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);							//sets the attributes for the database to handle
		$sql = $pdo->prepare("SELECT * FROM users");						//query to execute on the next line - select everything from users table
		$sql->execute();				//execute the above query
		
		foreach ($sql as $entry){		//loop for each sql entry
			if (isset($_POST['email']) && isset($_POST['password'])){		//check if email and password fields are populated
				if ($_POST['email']==$entry['email'] && hash('sha256',$_POST['password'].$entry['salt'])==$entry['password']){		//check if the email fields match and check if the password fields match after converting back from hash/salt formatting
					if(!isset($_SESSION['isLoggedIn'])){		//check if the session has started
						session_start();						//start a session
					}
					$_SESSION['isLoggedIn'] = true;				//set session start to true
					$_SESSION['name'] = $entry['firstname'].' '.$entry['lastname'];		//set name of session to user's first and last name
					header('Location:search.php');			//send the user to the main home page
					exit();
				}else{
					//script for when the users email and password combination don't match
					echo'
						<script>
							alert("Invalid Email or Incorrect Password");
						</script>
					';
					exit();
				}
			}
		}
	}catch (PDOException $e) {					//displays error messages when available on the webpage
		echo "Error: ".$e->getMessage();
	}
?>