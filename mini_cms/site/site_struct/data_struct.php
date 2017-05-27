<?php
$sql = "SELECT ".$prefix."PCompStruct.PCompStruct_title,".$prefix."PCompStruct.subMStruct_id,".$prefix."incFile.incFile_path
		FROM ".$prefix."PCompStruct,".$prefix."incFile
		WHERE (".$prefix."PCompStruct.incFile_id = ".$prefix."incFile.incFile_id 
        AND ".$prefix."PCompStruct.subMStruct_id = 1)
		AND 
		(
		".$prefix."PCompStruct.accessLv_id > ".($_SESSION['access_level'] - 1)." 
		)
		ORDER BY ".$prefix."PCompStruct.PCompStruct_id ASC;";

$page_component_rows = mysqli_query($conn , $sql) or die("ERROR 02" . mysqli_error($conn));
					
if(!isset($page_component_rows))//if no data from database then echo message
	echo "No data";
else//else include all data path from database
{
	foreach($page_component_rows as $page_component_row => $page_component_data)
	{
		require_once $page_component_data["incFile_path"];
	}
}
$page_component_data = 0;
$page_component_row = 0;
$page_component_rows = 0;		
?>