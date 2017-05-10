<?php

if(!isset($_GET['submenuname']) || empty($_GET['submenuname']))
	$page_title = "Home";
else
	$page_title = $_GET['submenuname'];//submenu title is set in main title

echo "<div class = '".$main_class."'>";
echo "<h1>".$page_title."</h1>";

switch($_SESSION['access_level'])
{
	case 3:
		$sql = "
		SELECT ".$prefix."incFile.incFile_id , ".$prefix."incFile.incFile_path 
		FROM ".$prefix."PCompStruct, ".$prefix."incFile
		WHERE (".$prefix."PCompStruct.subMStruct_id = ".$_SESSION['menu_id'].")
        AND NOT ".$prefix."PCompStruct.subMStruct_id = 1
		AND (".$prefix."incFile.incFile_id = ".$prefix."PCompStruct.incFile_id)
		AND (".$prefix."PCompStruct.accessLv_id = 3)
		ORDER BY ".$prefix."incFile.incFile_id ASC;";
	    break;
	case 2:
		$sql = "
		SELECT ".$prefix."incFile.incFile_id , ".$prefix."incFile.incFile_path
		FROM ".$prefix."PCompStruct, ".$prefix."incFile
		WHERE (".$prefix."PCompStruct.subMStruct_id = ".$_SESSION['menu_id'].")
        AND NOT ".$prefix."PCompStruct.subMStruct_id = 1
		AND (".$prefix."incFile.incFile_id = ".$prefix."PCompStruct.incFile_id)
		AND (".$prefix."PCompStruct.accessLv_id = 3
	    OR ".$prefix."PCompStruct.accessLv_id = 2)
		ORDER BY ".$prefix."incFile.incFile_id ASC;";
		break;
	case 1:
		$sql = "SELECT ".$prefix."incFile.incFile_id , ".$prefix."incFile.incFile_path 
		FROM ".$prefix."PCompStruct, ".$prefix."incFile
		WHERE (".$prefix."PCompStruct.subMStruct_id = ".$_SESSION['menu_id'].")
        AND NOT ".$prefix."PCompStruct.subMStruct_id = 1
		AND (".$prefix."incFile.incFile_id = ".$prefix."PCompStruct.incFile_id)
		AND (".$prefix."PCompStruct.accessLv_id = 3
		OR ".$prefix."PCompStruct.accessLv_id = 2
		OR ".$prefix."PCompStruct.accessLv_id = 1)
		ORDER BY ".$prefix."incFile.incFile_id ASC;";
		break;
	default:
		echo "ERROR 22 , could not identify access level;";
		break;
}

$component_rows = mysqli_query($conn , $sql) or die("error 24 :" . mysqli_error($conn));

foreach($component_rows as $component_row => $component_data)
{
	include_once $component_data['incFile_path'];
}

$component_data = 0;
$component_row = 0;
$component_rows = 0;
echo "</div>";

?>