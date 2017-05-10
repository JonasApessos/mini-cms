<?php

if(!isset($_GET['submenu_name']))
	$page_title = "Home";
else
	$page_title = $_GET['submenu_name'];//submenu title is set in main title

echo "<div class = '".$main_class."'>";
echo "	<h1>".$page_title."</h1>";

switch($_SESSION['access_level'])
			{
				case 3:
					$sql = "SELECT ".$prefix."_include_file.include_file_id , ".$prefix."_include_file.include_file_path FROM ".$prefix."_page_component_structure , ".$prefix."_include_file
					WHERE (".$prefix."_page_component_structure.submenu_id = ".$_SESSION['menu_id'].")
                    AND NOT ".$prefix."_page_component_structure.submenu_id = 1
					AND (".$prefix."_include_file.include_file_id = ".$prefix."_page_component_structure.include_file_id)
					AND (".$prefix."_page_component_structure.access_level_id = 3)
					ORDER BY ".$prefix."_include_file.include_file_id ASC;";
					break;
				case 2:
					$sql = "SELECT ".$prefix."_include_file.include_file_id , ".$prefix."_include_file.include_file_path FROM ".$prefix."_page_component_structure , ".$prefix."_include_file
					WHERE (".$prefix."_page_component_structure.submenu_id = ".$_SESSION['menu_id'].")
                    AND NOT ".$prefix."_page_component_structure.submenu_id = 1
					AND (".$prefix."_include_file.include_file_id = ".$prefix."_page_component_structure.include_file_id)
					AND (".$prefix."_page_component_structure.access_level_id = 3
					OR ".$prefix."_page_component_structure.access_level_id = 2)
					ORDER BY ".$prefix."_include_file.include_file_id ASC;";
					break;
				case 1:
					$sql = "SELECT ".$prefix."_include_file.include_file_id , ".$prefix."_include_file.include_file_path FROM ".$prefix."_page_component_structure , ".$prefix."_include_file
					WHERE (".$prefix."_page_component_structure.submenu_id = ".$_SESSION['menu_id'].")
                    AND NOT ".$prefix."_page_component_structure.submenu_id = 1
					AND (".$prefix."_include_file.include_file_id = ".$prefix."_page_component_structure.include_file_id)
					AND (".$prefix."_page_component_structure.access_level_id = 3
					OR ".$prefix."_page_component_structure.access_level_id = 2
					OR ".$prefix."_page_component_structure.access_level_id = 1)
					ORDER BY ".$prefix."_include_file.include_file_id ASC;";
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