<?php
//menu container
echo "<div class = '".$menu_class."'>";

switch($_SESSION['access_level'])
{
	case 3:
		$sql = "
		SELECT mStruct_id
		FROM ".$prefix."mStruct
		WHERE ".$prefix."mStruct.accessLv_id = 3
        AND NOT ".$prefix."mStruct.mStruct_id = 1
		ORDER BY mStruct_id ASC;";
		break;
	case 2:
		$sql = "
		SELECT mStruct_id
		FROM ".$prefix."mStruct
		WHERE ".$prefix."mStruct.accessLv_id = 3
        AND NOT ".$prefix."mStruct.mStruct_id = 1
		OR ".$prefix."mStruct.accessLv_id = 2
		ORDER BY ".$prefix."mStruct.mStruct_id ASC;";
		break;
	case 1:
		$sql = "
		SELECT mStruct_id
		FROM ".$prefix."mStruct
		WHERE ".$prefix."mStruct.accessLv_id = 3
        AND NOT ".$prefix."mStruct.mStruct_id = 1
		OR ".$prefix."mStruct.accessLv_id = 2
		OR ".$prefix."mStruct.accessLv_id = 1
		ORDER BY mStruct_id ASC;";
		break;
	default:
		echo "ERROR 22 , could not identify access level;";
		break;
}

$menu_rows = mysqli_query($conn , $sql) or die("error 18 " . mysqli_error($conn));


foreach ($menu_rows as $menu_row)
{
	switch($_SESSION['access_level'])
	{
		case 3:
			$sql = "
			SELECT ".$prefix."subMStruct.subMStruct_title , ".$prefix."subMStruct.subMStruct_id
			FROM ".$prefix."subMStruct , ".$prefix."mStruct
			WHERE ".$prefix."subMStruct.mStruct_id = ".$menu_row['mStruct_id']. "
			AND ".$prefix."mStruct.mStruct_id = ".$prefix."subMStruct.mStruct_id
			AND ".$prefix."subMStruct.accessLv_id = 3
			ORDER BY ".$prefix."subMStruct.subMStruct_id ASC;";
			break;
		case 2:
			$sql = "
			SELECT ".$prefix."subMStruct.subMStruct_title , ".$prefix."subMStruct.subMStruct_id
			FROM ".$prefix."subMStruct , ".$prefix."mStruct
			WHERE ".$prefix."subMStruct.mStruct_id = ".$menu_row['mStruct_id']. "
			AND ".$prefix."mStruct.mStruct_id = ".$prefix."subMStruct.mStruct_id
			AND( 
			".$prefix."subMStruct.accessLv_id = 3
			OR ".$prefix."subMStruct.accessLv_id = 2
			)
			ORDER BY ".$prefix."subMStruct.subMStruct_id ASC;";
			break;
		case 1:
			$sql = "
			SELECT ".$prefix."subMStruct.subMStruct_title , ".$prefix."subMStruct.subMStruct_id
			FROM ".$prefix."subMStruct , ".$prefix."mStruct
			WHERE ".$prefix."subMStruct.mStruct_id = ".$menu_row['mStruct_id']. "
			AND ".$prefix."mStruct.mStruct_id = ".$prefix."subMStruct.mStruct_id
			AND (
			".$prefix."subMStruct.accessLv_id = 3
			OR ".$prefix."subMStruct.accessLv_id = 2
			OR ".$prefix."subMStruct.accessLv_id = 1
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
	foreach($submenu_rows as $submenu_row)
	{
		echo "<a href='?menu_id=".$submenu_row['subMStruct_id']."&submenuname=".$submenu_row['subMStruct_title']."'><div>";
		echo "<h4>".$submenu_row['subMStruct_title']."</h4>";
		echo "</div></a>";
		$submenu_row = NULL;
	}
	echo "</div>";
	$menu_row = NULL;
}
			
echo "</div>";
?>