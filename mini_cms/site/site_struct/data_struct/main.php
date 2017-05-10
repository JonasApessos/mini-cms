<?php
include_once "site_struct/document_data/document_data.php";

if(!isset($_GET['submenu_name']))
	$page_title = "Home";
else
	$page_title = $_GET['submenu_name'];

echo "<div class = '".$main_class."'>";
echo "	<h1>".$page_title."</h1>";

switch($_SESSION["menu_id"])
	{
		case 1:
		{
			include_once "componets/home.php";
			break;
		}
		case 2:
		{
			include_once "componets/about_us.php";
			break;
		}
		case 3:
		{
			include_once "componets/contact.php";
			break;
		}
		case 4:
		{
			include_once "componets/catalog.php";
			break;
		}
		case 5:
		{
			include_once "componets/reservation.php";
			break;
		}
		case 6:
		{
			include_once "componets/faculty.php";
			break;
		}
		case 7:
		{
			include_once "componets/registration.php";
			break;
		}
		default:
		{
			echo "<h1>error</h1>";
		}
	}
echo "</div>";

?>