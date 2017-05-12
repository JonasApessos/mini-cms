<?php

if(!isset($_SESSION['access_level']))
{
	$_SESSION['access_level'] = 3;//access level session determines the access level a user has the rite to access content of the website
	$_SESSION['user_name'] = "none";
	$_SESSION['user_email'] = "none";
	$_SESSION['user_id'] = 0;
}

if(!isset($_GET["menu_id"]) || empty($_GET['menu_id']))
	$_SESSION["menu_id"] = 2;//setting menu selection session id
else
	$_SESSION["menu_id"] = $_GET["menu_id"];

?>