<?php 
	try{
		
		if(isset($_POST['searchname'])){
			$search = 'searchname';
		}elseif (isset($_POST['search'])){
			$search = 'search';
		}elseif (isset($_POST['searcharound'])){
			$search = 'searcharound';
		}
		
		if(isset($_POST[$search])){
			$objname = $_POST[$search];
			
			if(isset($_POST['rating'])){
				$objrating = $_POST['rating'];
			}
			
			$pdo = new PDO('mysql:host=localhost;dbname=flexzone','root', '123456789');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			if ($search == 'searcharound'){

				$sql = $pdo->prepare("SELECT * FROM gyms");
			}else{
				if($objname == ""){
					if($objrating == 'null'){
						$sql = $pdo->prepare("SELECT * FROM gyms");
					}else{
						$sql = $pdo->prepare("SELECT * FROM gyms where rating = '$objrating'");
					}
				}else{
					if($objrating == 'null'){
						$sql = $pdo->prepare("SELECT * FROM gyms where name LIKE '%$objname%'");
					}else{
						$sql = $pdo->prepare("SELECT * FROM gyms where name LIKE '%$objname%' and rating = '$objrating'");
					}
				}
			}
		}
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		$count = $sql->rowCount();			
		
		if ($sql->rowCount() >= 0){
				echo '
					<h3>'.$count.' Results Returned from "'.$objname.'"</h3><br>
					<table>
						<tr>
							<th>Gym</th>
							<th>Location</th>
							<th>Description</th>
							<th>Rating</th>
						</tr>
				';
				for($i = 0; $i < $count; $i++){
					echo '
						<tr>
							<td> 
								<a href="individual_sample.php?id=',$row['id'],'">'.$row["name"].'</a>
							</td>
							<td>
								<a href="http://www.maps.google.com/?q='.$row["latitude"].','.$row["longitude"].'" target="_blank">'.$row["latitude"].'&degN '.$row["longitude"].'&degE</a>
							</td>
							<td>
								'.$row["description"].'
							</td>
							<td>
								'.$row["rating"].'/10
							</td>
						</tr>
					';
					$row = $sql->fetch(PDO::FETCH_ASSOC);
				}
				echo "</table>";
		}else{
			echo "Error 1";
		}	
		$pdo = null;
	}catch (PDOException $e) {
			echo "Error: ".$e->getMessage();
	}

?>