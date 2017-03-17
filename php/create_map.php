<!--
Name: 			Jesse Truong
Student #: 		1222722
Student ID: 	truonj8
Project:		4WW3 - Project Part 3 - Server-side
Updated:		December 5th, 2016
-->

<?php
	try{
		
		$pdo = new PDO('mysql:host=localhost;dbname=flexzone','root','123456789');		//login to the local database
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);							//set attributes for the database to handle

		if(isset($_POST['search'])){		//check if the search field is null
			$objname=$_POST['search'];		//set variable to the search input
			$sql = $pdo->prepare("SELECT id, name,longitude,latitude,rating FROM gyms WHERE name='$objname'");	//setup the query to retrieve all rows equivalent to the inputted name
		}else{
			$sql = $pdo->prepare("SELECT id, name,longitude,latitude,rating FROM gyms");			//setup the query for all rows
		}
		
		$sql->execute();		//execute the query
		
		$row = $sql->fetch(PDO::FETCH_ASSOC);		//retrieve the first row from query
		$count = json_encode($sql->rowCount());		//set a variable to the row count -json encode lets me echo the value in javascript later on
		
		for($i = 0; $i < $count; $i++){		//for loop to set variables to the data from the rows
			$mapid[$i] = intval($row['id']);
			$latitude[$i] = floatval($row['latitude']);
			$longitude[$i] = floatval($row['longitude']);
			$name[$i] = strval($row['name']);
			$rating[$i] = intval($row['rating']);
			$row = $sql->fetch(PDO::FETCH_ASSOC);		//get the next row worth of data
		}
	}
	catch (PDOException $e) {
		echo "Error: ".$e->getMessage();		//display error messages
	}
?>

<script>

	function createResult(){

		var count = <?php echo $count?>;					//set variables with the values from the php variables
		var lat = <?php echo json_encode($latitude)?>;
		var lon = <?php echo json_encode($longitude)?>;
		var name = <?php echo json_encode($name)?>;
		var rating = <?php echo json_encode($rating)?>;
		var mapid = <?php echo json_encode($mapid)?>;
		var latlon = [];
		var marker = [];
		var urlname = [];
		
		for(i = 0; i < count; i++){
			latlon[i] = new google.maps.LatLng(lat[i],lon[i]);		//create the map
		}
		
		var mapholder = document.getElementById("resultsmap");		//set the location of the map holder
		var myOptions = {				//options for the map
			center: latlon[0],
			zoom: 14,
			mapTypeId:google.maps.MapTypeId.ROADMAP,
			mapTypeControl:false,
			navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
		}
		var map = new google.maps.Map(mapholder, myOptions);	//display the map
		
		for(k = 0;k < count; k++){
			urlname[k] = "individual_sample.php?id=" + String(mapid[k]);
			marker[k] = new google.maps.Marker({position: latlon[k],map:map, id:k, title:name[k]+"\nRating: "+rating[k]+"/10",url:urlname});	//set markers for every result from the database
			
			google.maps.event.addListener(marker[k],'click',function(){
				window.location.href = marker[this.id].url[this.id];		//had to keep id's logged in the markers in order to create listeners for each marker through a loop
			});
		}

		
	}
</script>

