<?php
$sql = "
		SELECT ".$prefix."incFile.incFile_id , ".$prefix."incFile.incFile_path , ".$prefix."PCompStruct.PCompStruct_title
		FROM ".$prefix."PCompStruct, ".$prefix."incFile
		WHERE (".$prefix."PCompStruct.subMStruct_id = ".$_SESSION['menu_id'].")
        AND NOT ".$prefix."PCompStruct.subMStruct_id = 1
		AND (".$prefix."incFile.incFile_id = ".$prefix."PCompStruct.incFile_id)
		AND (".$prefix."PCompStruct.accessLv_id > ".($_SESSION['access_level'] - 1).")
		ORDER BY ".$prefix."incFile.incFile_id ASC;";
		
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
	
	require_once $component_data['incFile_path'];
}

mysqli_free_result($component_rows);
echo "</div>";

?>