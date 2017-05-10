<?php
//menu container
echo "<div class = '".$menu_class."'>";

switch($_SESSION['access_level'])
			{
				case 3:
					$sql = "SELECT menu_id
					FROM ".$prefix."_menu_structure
					WHERE ".$prefix."_menu_structure.access_level_id = 3
                    AND NOT ".$prefix."_menu_structure.menu_id = 1
					ORDER BY menu_id ASC;";
					break;
				case 2:
					$sql = "SELECT menu_id
					FROM ".$prefix."_menu_structure
					WHERE ".$prefix."_menu_structure.access_level_id = 3
                    AND NOT ".$prefix."_menu_structure.menu_id = 1
					OR ".$prefix."_menu_structure.access_level_id = 2
					ORDER BY menu_id ASC;";
					break;
				case 1:
					$sql = "SELECT menu_id
					FROM ".$prefix."_menu_structure
					WHERE ".$prefix."_menu_structure.access_level_id = 3
                    AND NOT ".$prefix."_menu_structure.menu_id = 1
					OR ".$prefix."_menu_structure.access_level_id = 2
					OR ".$prefix."_menu_structure.access_level_id = 1
					ORDER BY menu_id ASC;";
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
					$sql = "SELECT submenu_title , submenu_id
					FROM ".$prefix."_submenu_structure , ".$prefix."_menu_structure
					WHERE ".$prefix."_submenu_structure.menu_id = ".$menu_row['menu_id']. "
					AND ".$prefix."_menu_structure.menu_id = ".$prefix."_submenu_structure.menu_id
					AND ".$prefix."_submenu_structure.access_level_id = 3
					ORDER BY submenu_id ASC;";
					break;
				case 2:
					$sql = "SELECT submenu_title , submenu_id
					FROM ".$prefix."_submenu_structure , ".$prefix."_menu_structure
					WHERE ".$prefix."_submenu_structure.menu_id = ".$menu_row['menu_id']. "
					AND ".$prefix."_menu_structure.menu_id = ".$prefix."_submenu_structure.menu_id
					AND( 
					".$prefix."_submenu_structure.access_level_id = 3
					OR ".$prefix."_submenu_structure.access_level_id = 2
					)
					ORDER BY submenu_id ASC;";
					break;
				case 1:
					$sql = "SELECT submenu_title , submenu_id
					FROM ".$prefix."_submenu_structure , ".$prefix."_menu_structure
					WHERE ".$prefix."_submenu_structure.menu_id = ".$menu_row['menu_id']. "
					AND ".$prefix."_menu_structure.menu_id = ".$prefix."_submenu_structure.menu_id
					AND (
					".$prefix."_submenu_structure.access_level_id = 3
					OR ".$prefix."_submenu_structure.access_level_id = 2
					OR ".$prefix."_submenu_structure.access_level_id = 1
					)
					ORDER BY submenu_id ASC;";
					break;
				default:
					echo "ERROR 22 , could not identify access level;";
					break;
			}
	
	$submenu_rows = mysqli_query($conn , $sql) or die ("error 19" . mysqli_error($conn));
	
	//drop down submenu structure
	echo "			<div class = '".$drop_down_class."'>";
	foreach($submenu_rows as $submenu_row)
	{
		echo "			   <a href='?menu_id=".$submenu_row['submenu_id']."&submenu_name=".$submenu_row['submenu_title']."'><div>";
		echo "				    <h4>".$submenu_row['submenu_title']."</h4>";
		echo "				</div></a>";
		$submenu_row = NULL;
	}
	echo "			</div>";
	$menu_row = NULL;
}
			
echo "		</div>";
?>