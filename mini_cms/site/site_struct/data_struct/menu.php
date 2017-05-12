<?php
//menu container
echo "<div class = '".$menu_class."'>";

$sql = "
		SELECT ".$prefix."mStruct.mStruct_id, ".$prefix."mStruct.mStruct_title
		FROM ".$prefix."mStruct
		WHERE ".$prefix."mStruct.accessLv_id > ".($_SESSION['access_level'] - 1)."
        AND NOT ".$prefix."mStruct.mStruct_id = 1
		ORDER BY mStruct_id ASC;";

$menu_rows = mysqli_query($conn , $sql) or die("error 18 " . mysqli_error($conn));


foreach ($menu_rows as $menu_row => $menu_data)
{
	$sql = "
			SELECT ".$prefix."subMStruct.subMStruct_title , ".$prefix."subMStruct.subMStruct_id
			FROM ".$prefix."subMStruct , ".$prefix."mStruct
			WHERE ".$prefix."subMStruct.mStruct_id = ".$menu_data['mStruct_id']. "
			AND ".$prefix."mStruct.mStruct_id = ".$prefix."subMStruct.mStruct_id
			AND ".$prefix."subMStruct.accessLv_id > ".($_SESSION['access_level'] - 1)."
			ORDER BY ".$prefix."subMStruct.subMStruct_id ASC;";
	
	$submenu_rows = mysqli_query($conn , $sql) or die ("error 19" . mysqli_error($conn));
	
	//drop down submenu structure
	echo "<div class = '".$drop_down_class."'>";
	echo "<div><h3>".$menu_data['mStruct_title']."</h3></div>";
	foreach($submenu_rows as $submenu_row => $submenu_data)
	{
		echo "<a href='?menu_id=".$submenu_data['subMStruct_id']." '><div>";
		echo "<h4>".$submenu_data['subMStruct_title']."</h4>";
		echo "</div></a>";
	}
	echo "</div>";
}


mysqli_free_result($submenu_rows);
mysqli_free_result($menu_rows);

			
echo "</div>";
?>