<?php
//menu container
echo "<div class = '".$menu_class."'>";

switch($_SESSION['access_level'])
{
	case 3://get menu from access level 3
		$sql = "
		SELECT mStruct_id
		FROM ".$prefix."mStruct
		WHERE ".$prefix."mStruct.accessLv_id > 2
        AND NOT ".$prefix."mStruct.mStruct_id = 1
		ORDER BY mStruct_id ASC;";
		break;
	case 2://get menu from access level 3 and 2
		$sql = "
		SELECT mStruct_id
		FROM ".$prefix."mStruct
		WHERE ".$prefix."mStruct.accessLv_id > 1
        AND NOT ".$prefix."mStruct.mStruct_id = 1
		ORDER BY ".$prefix."mStruct.mStruct_id ASC;";
		break;
	case 1://get menu from all access level
		$sql = "
		SELECT mStruct_id
		FROM ".$prefix."mStruct
		WHERE ".$prefix."mStruct.accessLv_id > 0
        AND NOT ".$prefix."mStruct.mStruct_id = 1
		ORDER BY mStruct_id ASC;";
		break;
	default:
		echo "ERROR 22 , could not identify access level;";
		break;
}

$menu_rows = mysqli_query($conn , $sql) or die("error 18 " . mysqli_error($conn));


foreach ($menu_rows as $menu_row => $menu_data)
{
	switch($_SESSION['access_level'])
	{
		case 3://get submenu from access level 3
			$sql = "
			SELECT ".$prefix."subMStruct.subMStruct_title , ".$prefix."subMStruct.subMStruct_id
			FROM ".$prefix."subMStruct , ".$prefix."mStruct
			WHERE ".$prefix."subMStruct.mStruct_id = ".$menu_data['mStruct_id']. "
			AND ".$prefix."mStruct.mStruct_id = ".$prefix."subMStruct.mStruct_id
			AND ".$prefix."subMStruct.accessLv_id > 2
			ORDER BY ".$prefix."subMStruct.subMStruct_id ASC;";
			break;
		case 2://get submenu from access level 3 and 2
			$sql = "
			SELECT ".$prefix."subMStruct.subMStruct_title , ".$prefix."subMStruct.subMStruct_id
			FROM ".$prefix."subMStruct , ".$prefix."mStruct
			WHERE ".$prefix."subMStruct.mStruct_id = ".$menu_data['mStruct_id']. "
			AND ".$prefix."mStruct.mStruct_id = ".$prefix."subMStruct.mStruct_id
			AND( 
			".$prefix."subMStruct.accessLv_id > 1
			)
			ORDER BY ".$prefix."subMStruct.subMStruct_id ASC;";
			break;
		case 1://get submenu from all access level
			$sql = "
			SELECT ".$prefix."subMStruct.subMStruct_title , ".$prefix."subMStruct.subMStruct_id
			FROM ".$prefix."subMStruct , ".$prefix."mStruct
			WHERE ".$prefix."subMStruct.mStruct_id = ".$menu_data['mStruct_id']. "
			AND ".$prefix."mStruct.mStruct_id = ".$prefix."subMStruct.mStruct_id
			AND (
			".$prefix."subMStruct.accessLv_id > 0
			)
			ORDER BY ".$prefix."subMStruct.subMStruct_id ASC;";
			break;
		default:
			echo "ERROR 22 , could not identify access level;";
			break;
	}
	
	$submenu_rows = mysqli_query($conn , $sql) or die ("error 19" . mysqli_error($conn));
	
	//drop down submenu structure
	echo "<div class = '".$drop_down_class."'>";
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