"use strict";
function googleMap()
{
	var mapObject = {center:new  google.maps.LatLng(51.508742,-0.120850),zoom:5};
	var map = new google.maps.Map(document.getElementById("id_map"),mapObject);
}