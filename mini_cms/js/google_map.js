"use strict";
function google_map()
{
	var map_object = {center:new  google.maps.LatLng(51.508742,-0.120850),zoom:5};
	var map = new google.maps.Map(document.getElementById("id_map"),map_object);
}