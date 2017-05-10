<?php
include "site_struct/document_data/db_conn.php";

echo "<div class = '".$menu_class."'>";

$sql = "select menu_id from re2213_menu_structure";
$menu_rows = mysqli_query($conn , $sql) or die("error 18 " . mysqli_error($conn));


foreach ($menu_rows as $menu_row)
{
	$sql = "select submenu_title , submenu_id from re2213_submenu_structure , re2213_menu_structure where re2213_submenu_structure.menu_id = ".$menu_row['menu_id']. " and re2213_menu_structure.menu_id = re2213_submenu_structure.menu_id order by submenu_id";
	$submenu_rows = mysqli_query($conn , $sql) or die ("error 19" . mysqli_error($conn));
	echo "			<div class = '".$drop_down_class."'>";
	foreach($submenu_rows as $submenu_row)
	{
		echo "			   <a href='?menu_id=".$submenu_row['submenu_id']."&submenu_name=".$submenu_row['submenu_title']."'><div>";
		echo "				    <h4>".$submenu_row['submenu_title']."</h4>";
		echo "				</div></a>";
	}
	echo "			</div>";
}
			
echo "		</div>";

mysqli_close($conn);

?>