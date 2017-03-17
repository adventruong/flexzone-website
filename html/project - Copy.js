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

/*function used to create the map to display onto the webpage*/
function showPosition(position) {
	lat1 = 43.2644636;				/*marker for pulse*/
	lon1 = -79.9160332;
	lat2 = 43.2559862;				/*marker for world gym*/
	lon2 = -79.9351857;
	lat3 = 43.2580401;				/*marker for alchemy crossfit*/
	lon3 = -79.8925747;
	lat4 = 43.261879;				/*market for allure fitness*/
	lon4 = -79.9044441;
	lat5 = 43.2053793;				/*marker for GoodLife*/
	lon5 = -79.897525;
	lat6 = 43.2541825;				/*marker for YMCA*/
	lon6 = -79.8720565;
	
	/*create the map marker objects*/
	latlon1 = new google.maps.LatLng(lat1,lon1);
	latlon2 = new google.maps.LatLng(lat2,lon2);
	latlon3 = new google.maps.LatLng(lat3,lon3);
	latlon4 = new google.maps.LatLng(lat4,lon4);
	latlon5 = new google.maps.LatLng(lat5,lon5);
	latlon6 = new google.maps.LatLng(lat6,lon6);
	
	/*set mapholder to the div tag created to hold the map*/
    var mapholder = document.getElementById('mapholder');
	
	/*set the map height and width*/
    mapholder.style.height = '250px';
    mapholder.style.width = '500px';
	
	/*options to create the map with*/
    var myOptions = {
		center: latlon1,		/*set the center of the map*/
		zoom: 13,				/*set the zoom ratio for the map*/
		mapTypeId:google.maps.MapTypeId.ROADMAP,	/*Type of visual map*/
		mapTypeControl:false,
		navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
    }
    
	/*create the map*/
    var map = new google.maps.Map(mapholder, myOptions);
	
	/*set the markers along with little blurbs with details about each location on them*/
    var marker1 = new google.maps.Marker({position: latlon1,map:map,title:"Pulse Fitness\n9/10",url: 'individual_sample.html'});
	var marker2 = new google.maps.Marker({position: latlon2,map:map,title:"World Gym\n8/10",url: 'individual_sample.html'});
	var marker3 = new google.maps.Marker({position: latlon3,map:map,title:"Alchemy CrossFit\n7.2/10",url: 'individual_sample.html'});
	var marker4 = new google.maps.Marker({position: latlon4,map:map,title:"Allure Fitness\n7/10",url: 'individual_sample.html'});
	var marker5 = new google.maps.Marker({position: latlon5,map:map,title:"GoodLife Fitness\n8.5/10",url: 'individual_sample.html'});
	var marker6 = new google.maps.Marker({position: latlon6,map:map,title:"YMCA of HBB\n8.5/10",url: 'individual_sample.html'});
	
	/*create a listener event which checks for when the user clicks on the map*/
	google.maps.event.addListener(marker1, 'click', function() {		/*listens for when marker clicked to set the assigned url */
		/*if the user clicks on the marker, take the user to the marker's URL*/
		window.location.href = marker1.url;
    });
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

/*function to create a map for the search results page*/
function mapResult() {
	lat1 = 43.2644636;				/*marker for pulse*/
	lon1 = -79.9160332;
	lat2 = 43.2559862;				/*marker for world gym*/
	lon2 = -79.9351857;
	lat3 = 43.2580401;				/*marker for alchemy crossfit*/
	lon3 = -79.8925747;
	lat4 = 43.261879;				/*market for allure fitness*/
	lon4 = -79.9044441;
	lat5 = 43.2053793;				/*marker for GoodLife*/
	lon5 = -79.897525;
	lat6 = 43.2541825;				/*marker for YMCA*/
	lon6 = -79.8720565;
	
	/*create the map marker objects*/
	latlon1 = new google.maps.LatLng(lat1,lon1);
	latlon2 = new google.maps.LatLng(lat2,lon2);
	latlon3 = new google.maps.LatLng(lat3,lon3);
	latlon4 = new google.maps.LatLng(lat4,lon4);
	latlon5 = new google.maps.LatLng(lat5,lon5);
	latlon6 = new google.maps.LatLng(lat6,lon6);
	
	/*set mapholder to the div tag created to hold the map*/
    var mapholder = document.getElementById("resultsmap");
	
	/*options to create the map with*/
    var myOptions = {									
		center: latlon1,						/*set the center of the map*/
		zoom: 12,								/*set the zoom ratio of the map*/
		mapTypeId:google.maps.MapTypeId.ROADMAP,		/*Type of visual map*/
		mapTypeControl:false,
		navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
    };
    
	/*create the map*/
    var map = new google.maps.Map(mapholder, myOptions);
	
	/*create the markers on the map*/
    var marker1 = new google.maps.Marker({position: latlon1,map:map,title:"Pulse Fitness\n9/10",url: 'individual_sample.html'});
	var marker2 = new google.maps.Marker({position: latlon2,map:map,title:"World Gym\n8/10",url: 'individual_sample.html'});
	var marker3 = new google.maps.Marker({position: latlon3,map:map,title:"Alchemy CrossFit\n7.2/10",url: 'individual_sample.html'});
	var marker4 = new google.maps.Marker({position: latlon4,map:map,title:"Allure Fitness\n7/10",url: 'individual_sample.html'});
	var marker5 = new google.maps.Marker({position: latlon5,map:map,title:"GoodLife Fitness\n8.5/10",url: 'individual_sample.html'});
	var marker6 = new google.maps.Marker({position: latlon6,map:map,title:"YMCA of HBB\n8.5/10",url: 'individual_sample.html'});
	
	/*create a listener event for when users click on the marker*/
	google.maps.event.addListener(marker1, 'click', function() {		/*listens for when marker clicked to set the assigned url */
		/*if the user clicks on the marker, take the user to the marker's URL*/
		window.location.href = marker1.url;
    });
}

/*function to create the map for the individual sample page*/
function mapSample() {

	lat1 = 43.2644636;				/*marker for pulse*/
	lon1 = -79.9160332;

	/*create the map marker objects*/
	latlon1 = new google.maps.LatLng(lat1,lon1);
	
	/*set mapholder to the div that is going to hold the map*/
    var mapholder = document.getElementById("samplemap");
    
	/*set the options of the map*/
	var myOptions = {	
		center: latlon1,					/*set the center of the map*/
		zoom: 18,							/*set the zoom ratio of the map*/
		mapTypeId:google.maps.MapTypeId.ROADMAP,	/*Type of visual map*/
		mapTypeControl:false,
		navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
    };
    
	/*create the map*/
    var map = new google.maps.Map(mapholder, myOptions);
	
	/*create the markers on the map*/
    var marker1 = new google.maps.Marker({position: latlon1,map:map,title:"Pulse Fitness\n9/10"});
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