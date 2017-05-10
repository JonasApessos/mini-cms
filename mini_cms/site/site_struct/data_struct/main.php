<?php

if(!isset($_GET['submenu_name']))
	$page_title = "Home";
else
	$page_title = $_GET['submenu_name'];//submenu title is set in main title

echo "<div class = '".$main_class."'>";
echo "	<h1>".$page_title."</h1>";

/*$sql = "SELECT re2213_component.include_file_id , include_file_path FROM re2213_component , re2213_include_file
WHERE re2213_component.submenu_id = ".$_SESSION['menu_id']."
AND re2213_include_file.include_file_id = re2213_component.include_file_id
AND re2213_component.access_level_id = ".$_SESSION['access_level']." ORDER BY re2213_component.include_file_id ASC;";*/

switch($_SESSION['access_level'])
			{
				case 3:
					$sql = "SELECT re2213_component.include_file_id , include_file_path FROM re2213_component , re2213_include_file
					WHERE re2213_component.submenu_id = ".$_SESSION['menu_id']."
					AND re2213_include_file.include_file_id = re2213_component.include_file_id
					AND re2213_component.access_level_id = 3
					ORDER BY re2213_component.include_file_id ASC;";
					break;
				case 2:
					$sql = "SELECT re2213_component.include_file_id , include_file_path FROM re2213_component , re2213_include_file
					WHERE re2213_component.submenu_id = ".$_SESSION['menu_id']."
					AND re2213_include_file.include_file_id = re2213_component.include_file_id
				    AND re2213_component.access_level_id = 3
					OR re2213_component.access_level_id = 2
					ORDER BY re2213_component.include_file_id ASC;";
					break;
				case 1:
					$sql = "SELECT re2213_component.include_file_id , include_file_path FROM re2213_component , re2213_include_file
					WHERE re2213_component.submenu_id = ".$_SESSION['menu_id']."
					AND re2213_include_file.include_file_id = re2213_component.include_file_id
					AND re2213_component.access_level_id = 3
					OR re2213_component.access_level_id = 2
					OR re2213_component.access_level_id = 1
					ORDER BY re2213_component.include_file_id ASC;";
					break;
				default:
					echo "ERROR 22 , could not identify access level;";
					break;
			}

$component_rows = mysqli_query($conn , $sql);

foreach($component_rows as $component_row)
{
	include_once "".$component_row['include_file_path']."";
	$component_row = NULL;
}
$component_rows = NULL;
echo "</div>";

?>