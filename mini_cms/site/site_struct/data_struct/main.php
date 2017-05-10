<?php

include "site_struct/document_data/db_conn.php";

if(!isset($_GET['submenu_name']))
	$page_title = "Home";
else
	$page_title = $_GET['submenu_name'];//submenu title is set in main title

echo "<div class = '".$main_class."'>";
echo "	<h1>".$page_title."</h1>";

/*$sql = "SELECT re2213_component.include_file_id , include_file_path FROM re2213_component , re2213_include_file WHERE re2213_component.submenu_id = ".$_GET['menu_id']." AND re2213_include_file.include_file_id = re2213_component.include_file_id";

$component_rows = mysqli_query($conn , $sql);

mysqli_close($conn);

foreach($component_rows as $component_row)
{
	include_once "".$component_row['include_file_path']."";
}
*/


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