<!--
Name: 			Jesse Truong
Student #: 		1222722
Student ID: 	truonj8
Project:		4WW3 - Project Part 3 - Server-side
Updated:		December 5th, 2016
-->


<?php 			//php code to register the users
	try{
		if(isset($_POST['signup'])){
			$salt = bin2hex(openssl_random_pseudo_bytes(20));		//salt function
			$objfirst = $_POST['firstname'];
			$objlast = $_POST['lastname'];
			$objdob = $_POST['birthday'];
			$objmail = $_POST['email'];
			$objps = hash('sha256',$_POST['password'].$salt);		//hash the password and use salt
			$objgender = $_POST['gender'];
			
			$objfirst = mysql_real_escape_string($objfirst);
			$objlast = mysql_real_escape_string($objlast);
			$objmail = mysql_real_escape_string($objmail);
			$objps = mysql_real_escape_string($objps);
			$objdob = mysql_real_escape_string($objdob);
			$objgender = mysql_real_escape_string($objgender);
			
			$pdo = new PDO('mysql:host=localhost;dbname=flexzone', 'root', '123456789');		//login to the db
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			if(empty($objmail)) {		//error checks in case users try to enter weird entries into the database
				echo '<script type="text/javascript">alert("Email field is empty");</script>';
			}else if (!preg_match("/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/",$objmail)){
				echo '<script type="text/javascript">alert("Incorrect email format. Example: email@mail.com");</script>';
			}else if (empty($objps)){
				echo '<script type="text/javascript">alert("Password field empty");</script>';
			}else if (empty($objdob)){
				echo '<script type="text/javascript">alert("Birthday field empty");</script>';
			}else if (empty($objfirst)){
				echo '<script type="text/javascript">alert("First name is empty");</script>';
			}else if (empty($objlast)){
				echo '<script type="text/javascript">alert("Last name is empty");</script>';
			}else{
				$sql = $pdo->prepare("INSERT INTO users(firstname, lastname, dob, email, password, gender, salt) VALUES('$objfirst','$objlast','$objdob','$objmail','$objps','$objgender','$salt')");	//prepare the query to insert into db
				$sql->execute();
			}
		}
	}
	catch (PDOException $e) {
		echo "Error: ".$e->getMessage();
	}		
?>