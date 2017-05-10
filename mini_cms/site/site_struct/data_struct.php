<?php			
include "site_struct/document_data/db_conn.php";
?>
<?php
switch($_SESSION['access_level'])
{
	case 3:
		$sql = "
		SELECT ".$prefix."PCompStruct.PCompStruct_title,".$prefix."PCompStruct.subMStruct_id,".$prefix."incFile.incFile_path
		FROM ".$prefix."PCompStruct,".$prefix."incFile
		WHERE (".$prefix."PCompStruct.incFile_id = ".$prefix."incFile.incFile_id 
        AND ".$prefix."PCompStruct.subMStruct_id = 1)
		AND 
		(
		".$prefix."PCompStruct.accessLv_id = 3 
		)
		ORDER BY ".$prefix."PCompStruct.PCompStruct_id ASC;";
		break;
	case 2:
		$sql = "
		SELECT ".$prefix."PCompStruct.PCompStruct_title,".$prefix."PCompStruct.subMStruct_id,".$prefix."incFile.incFile_path
		FROM ".$prefix."PCompStruct,".$prefix."incFile
		WHERE (".$prefix."PCompStruct.incFile_id = ".$prefix."incFile.incFile_id 
        AND ".$prefix."PCompStruct.subMStruct_id = 1)
		AND
		(
		".$prefix."PCompStruct.accessLv_id = 3 
		OR ".$prefix."PCompStruct.accessLv_id = 2
		)
		ORDER BY ".$prefix."PCompStruct.PCompStruct_id ASC;";
		break;
	case 1:
		$sql = "
		SELECT ".$prefix."PCompStruct.PCompStruct_title,".$prefix."PCompStruct.subMStruct_id,".$prefix."incFile.incFile_path
		FROM ".$prefix."PCompStruct,".$prefix."incFile
		WHERE (".$prefix."PCompStruct.incFile_id = ".$prefix."incFile.incFile_id 
        AND ".$prefix."PCompStruct.subMStruct_id = 1)
		AND 
		(
		".$prefix."PCompStruct.accessLv_id = 3 
		OR ".$prefix."PCompStruct.accessLv_id = 2
		OR ".$prefix."PCompStruct.accessLv_id = 1
		)
		ORDER BY ".$prefix."PCompStruct.PCompStruct_id ASC;";
		break;
	default:
		echo "ERROR 22 , could not identify access level;";
		break;
}

$page_component_rows = mysqli_query($conn , $sql) or die("ERROR 23" . mysqli_error($conn));
					
if(!isset($page_component_rows))
	echo "No data";
else
{
	foreach($page_component_rows as $page_component_row)
	{
		include_once $page_component_row["incFile_path"];
		$page_component_row = NULL;
	}
}		
?>