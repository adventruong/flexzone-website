/*
Name: 			Jesse Truong
Student #: 		1222722
Student ID: 	truonj8
Project:		4WW3 - Project Part 2 - Client-Side, Dynamic
Updated:		October 31st, 2016
*/

/*Global variables used throughout the javascript*/
var x = document.getElementById("error");		
var marker;

/*function used to grab the users location - taken from w3schools http://www.w3schools.com/html/html5_geolocation.asp*/
function getLocation(getType) {
	if(navigator.geolocation){
		/*check which page is asking to get location*/
		if (getType == "search"){
			navigator.geolocation.getCurrentPosition(showPosition, showError);
		}else if (getType == "submission"){
			
			navigator.geolocation.getCurrentPosition(showPositionSubmission, showError);
		}
	}else{
		x.innerHTML = "Geolocation is not supported by this browser.";
	}
}

function showPosition(position) {

	/*receives the current location*/
	currentLoc = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
	
	
	var lat_min = currentLoc.lat() - 0.045;
	var lat_max = currentLoc.lat() + 0.045;
	var lon_min = currentLoc.lon() - (0.045 / Math.cos(currentLoc.lat() * Math.PI / 180));
	var lon_max = currentLoc.lon() + (0.045 / Math.cos(currentLoc.lat() * Math.PI / 180));
	document.getElementById('maxdistance').innerHTML = lat_min, lat_max, lon_min, lon_max;
}

/*function used to create the map for the submission page*/
function showPositionSubmission(position) {

	/*receives the current location*/
	currentLoc = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
	
	/*set mapholder to the div used to hold the map*/
    var mapholder = document.getElementById('mapholder')
    
	/*set the map height and width*/
	mapholder.style.height = '300px';
    mapholder.style.width = '50%';

	/*options to create the map*/
    var myOptions = {	
		center: currentLoc,			/*set the center of the map*/
		zoom: 13,					/*set the zoom ratio of the map*/
		mapTypeId:google.maps.MapTypeId.ROADMAP,	/*Type of visual map*/
		mapTypeControl:false,
		navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
    }
    
	/*create the map and display it*/
    var map = new google.maps.Map(mapholder, myOptions);
	
	/*create a listner event for when users click on the map*/ 	
	google.maps.event.addListener(map, 'click', function(event) {		/*listens for when marker clicked to set the assigned url */
		/*place a marker down where the users clicked*/
		placeMarker(map, event.latLng);
    });
}


/*function used to place the markers on the map*/
function placeMarker(map, location){
	
	/*variables to hold the text boxes that hold coordinates in submission page*/
	var lat = document.getElementById('latsub');
	var lon = document.getElementById('lonsub');
	
	/*check if a marker already exists, if it doesn't create a new one, if it does just change its current position*/
	if(marker){
		/*if marker already exists, change position*/
		marker.setPosition(location);
	}else{
		/*if marker doesn't exist, create a new marker*/
		marker = new google.maps.Marker({
			position: location,
			map: map
		});
	}
	
	/*change the text inside the lat and lon text boxes on the submission page*/
	lat.value = location.lat();
	lon.value = location.lng();
}

/*function to capture the errors when asking for permissions to use location*/
function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}

/*function to allow for the submission form to submit*/
function validate(){
	var pass = document.getElementById("password").value;
	var passconfirm = document.getElementById("password_confirm").value;
	var email = document.getElementById("email").value;
	var emailconfirm = document.getElementById("email_confirm").value;

	/*check if the passwords match as well as the emails before allowing submission*/
	if ((pass == passconfirm) && (email.toUpperCase() == emailconfirm.toUpperCase())){
		return true;
	}else{
		return false;
	}
}

/*function to check if the passwords are matching on keypress*/
function passwordValidate(){
	
	var pass = document.getElementById("password").value;
	var passconfirm = document.getElementById("password_confirm").value;
	
	/*if the passwords don't match, display a message, otherwise clear the message*/
	if (pass != passconfirm){
		document.getElementById("confirmmessage").innerHTML="Passwords don't match";
		document.getElementById("confirmmessage").style.color="red";
	}else{
		document.getElementById("confirmmessage").innerHTML="";
	}
}

/*function to check if the emails are matching on keypress*/
function emailValidate(){

	var email = document.getElementById("email").value;
	var emailconfirm = document.getElementById("email_confirm").value;
	
	/*if the emails don't match, display a message, otherwise clear the message*/
	if (email.toUpperCase() != emailconfirm.toUpperCase()){
		document.getElementById("confirmmessage").innerHTML="Emails don't match";
		document.getElementById("confirmmessage").style.color="red";
	}else{
		document.getElementById("confirmmessage").innerHTML="";
	}
}