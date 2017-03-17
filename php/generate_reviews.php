<!--
Name: 			Jesse Truong
Student #: 		1222722
Student ID: 	truonj8
Project:		4WW3 - Project Part 3 - Server-side
Updated:		December 5th, 2016
-->

<?php				//php code used to generate the reviews on the individual_sample page
	try{
		$pdo = new PDO('mysql:host=localhost;dbname=flexzone','root','123456789');		//login to database
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
		$sql = $pdo->prepare("SELECT * FROM reviews where gymid = '$gymid'");		//prepare the query
		$sql->execute();												//execute query
		
		$row2 = $sql->fetch(PDO::FETCH_ASSOC);		//grab the next row
		$count = $sql->rowCount();			//keep track of row numbers
		
		if($sql->rowCount() >= 0){		//check if any rows were grabbed
			echo '
				<table>
			';
			for($i = 0; $i < $count; $i++){		//echo these rows for all rows available and then print them out in the following format
				echo '
					<tr>
						<td>
							'.$row2['name'].'
						</td>
					</tr>
					<tr>
						<td>
							<img src="images/maledefault.jpg">
						</td>
						<td>
							'.ltrim($row2['review'],'$').'
						</td>
						<td>
							Rating: '.$row2['rating'].'/10
						</td>
					</tr>
				';
				$row2 = $sql->fetch(PDO::FETCH_ASSOC);
			}
			echo "
				</table>
			";
			$pdo = null;
		}
	}catch (PDOException $e) {
			echo "Error: ".$e->getMessage();
	}
?>