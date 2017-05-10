<?php

/*if(!isset($_GET['submenuname']) || empty($_GET['submenuname']))
	$page_title = "No page";
else
	$page_title = $_GET['submenuname'];//submenu title is set in main title*/

switch($_SESSION['access_level'])
{
	case 3://get main content only from access level 3
		$sql = "
		SELECT ".$prefix."incFile.incFile_id , ".$prefix."incFile.incFile_path , ".$prefix."PCompStruct.PCompStruct_title
		FROM ".$prefix."PCompStruct, ".$prefix."incFile
		WHERE (".$prefix."PCompStruct.subMStruct_id = ".$_SESSION['menu_id'].")
        AND NOT ".$prefix."PCompStruct.subMStruct_id = 1
		AND (".$prefix."incFile.incFile_id = ".$prefix."PCompStruct.incFile_id)
		AND (".$prefix."PCompStruct.accessLv_id > 2)
		ORDER BY ".$prefix."incFile.incFile_id ASC;";
	    break;
	case 2://get main content only from access level 2 and 3
		$sql = "
		SELECT ".$prefix."incFile.incFile_id , ".$prefix."incFile.incFile_path, ".$prefix."PCompStruct.PCompStruct_title
		FROM ".$prefix."PCompStruct, ".$prefix."incFile
		WHERE (".$prefix."PCompStruct.subMStruct_id = ".$_SESSION['menu_id'].")
        AND NOT ".$prefix."PCompStruct.subMStruct_id = 1
		AND (".$prefix."incFile.incFile_id = ".$prefix."PCompStruct.incFile_id)
		AND (".$prefix."PCompStruct.accessLv_id > 1)
		ORDER BY ".$prefix."incFile.incFile_id ASC;";
		break;
	case 1://get main content from all access level
		$sql = "SELECT ".$prefix."incFile.incFile_id , ".$prefix."incFile.incFile_path, ".$prefix."PCompStruct.PCompStruct_title
		FROM ".$prefix."PCompStruct, ".$prefix."incFile
		WHERE (".$prefix."PCompStruct.subMStruct_id = ".$_SESSION['menu_id'].")
        AND NOT ".$prefix."PCompStruct.subMStruct_id = 1
		AND (".$prefix."incFile.incFile_id = ".$prefix."PCompStruct.incFile_id)
		AND (".$prefix."PCompStruct.accessLv_id > 0)
		ORDER BY ".$prefix."incFile.incFile_id ASC;";
		break;
	default:
		echo "ERROR 06 , could not identify access level;";
		break;
}

$component_rows = mysqli_query($conn , $sql) or die("error 07 :" . mysqli_error($conn));

foreach($component_rows as $component_row => $component_data)
{
	if(empty($component_data['PCompStruct_title']))
	{
		echo $component_data['PCompStruct_title'];
		$page_title = "No Page Found";
		echo "<div class = '".$main_class."'>";
		echo "<h1>".$page_title."</h1>";
	}
	else if(empty($page_title))
	{
		$page_title = $component_data['PCompStruct_title'];
		echo "<div class = '".$main_class."'>";
		echo "<h1>".$page_title."</h1>";
	}
	
	include_once $component_data['incFile_path'];
}

mysqli_free_result($component_rows);
echo "</div>";

?>