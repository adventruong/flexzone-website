<!--
Name: 			Jesse Truong
Student #: 		1222722
Student ID: 	truonj8
Project:		4WW3 - Project Part 3 - Server-side
Updated:		December 5th, 2016
-->

<?php			//php code to create the map in the individual_sample page
	try{
		$singleGym = $_GET['id'];		//get the ID for which gym was selected in the results_sample page
		
		$pdo = new PDO('mysql:host=localhost;dbname=flexzone','root','123456789');		//login to the db
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		//attributes for db to handle

		
		$sql = $pdo->prepare("SELECT name,longitude,latitude,rating FROM gyms WHERE id = '$singleGym'");	//prepare the query
		$sql->execute();			//execute query
		
		$row = $sql->fetch(PDO::FETCH_ASSOC);		//grab the first row of items
		$count = json_encode($sql->rowCount());		//set the variables
		$lat = floatval($row['latitude']);
		$lon = floatval($row['longitude']);
		$name = strval($row['name']);
		$rating = intval($row['rating']);
		
	}catch (PDOException $e) {
		echo "Error: ".$e->getMessage();
	}
?>

<!--below is the script for the function to create the map on the individual_sample page-->
<script>

	function createIndividual(){

		var count = <?php echo $count?>; 			//set the variables
		var lat = <?php echo json_encode($lat)?>;	//json_encode in order to change the php code into readable format for javascript to use
		var lon = <?php echo json_encode($lon)?>;
		var name = <?php echo json_encode($name)?>;
		var rating = <?php echo json_encode($rating)?>;
		var latlon;
		var marker;
		
		latlon = new google.maps.LatLng(lat,lon);		//set the coordinates and create the map
		
		var mapholder = document.getElementById("samplemap");		//grab the map container ID
		var myOptions = {
			center: latlon,
			zoom: 18,
			mapTypeId:google.maps.MapTypeId.ROADMAP,
			mapTypeControl:false,
			navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
		}
		
		var map = new google.maps.Map(mapholder, myOptions);		//create the map
		marker = new google.maps.Marker({position: latlon,map:map,title:name+"\nRating: "+rating+"/10"});		//create the one marker
	}
</script>

