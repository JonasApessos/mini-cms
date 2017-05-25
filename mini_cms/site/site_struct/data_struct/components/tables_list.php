<?php
include_once "site_struct/data_struct/components/additional_componets/php/room_editor.php";

$sql = "
SELECT ".$prefix."resPos.resPos_id , ".$prefix."resPos.resPos_title , ".$prefix."resPos.resPos_desc
FROM ".$prefix."resPos;";

$pos_rows = mysqli_query($conn,$sql) or die ("ERROR 13" . mysqli_error($conn));

include_once "site_struct/data_struct/components/additional_componets/php/table_editor.php";

echo "<div class = \"table_list_style\">";
echo "<div>";
echo "<div>";

foreach($pos_rows as $pos_row => $pos_data)
{
	echo "<div>";
	
	echo "<div>";
	echo "<h3>".$pos_data['resPos_title']."</h3>";
	echo "</div>";
	
	echo "<div>";
	
	$sql = "
	SELECT ".$prefix."Dtable.Dtable_id , ".$prefix."Dtable.Dtable_capacity, ".$prefix."Dtable.Dtable_blocked
	FROM ".$prefix."Dtable
	WHERE ".$prefix."Dtable.resPos_id = ".$pos_data['resPos_id'].";";
	$table_rows = mysqli_query($conn,$sql) or die ("ERROR 14" . mysqli_error($conn));
	
	foreach($table_rows as $table_row => $table_data)
	{
		echo "<form>";
		echo "<div>";
		
		$input->set_type("number");
		$input->set_value($table_data['Dtable_id']);
		$input->set_name("table_id");
		$input->set_readonly();
		$input->set_required();
	
		echo "<div>";
		echo "<h4>Table ID:</h4>";
		echo $input->display();
		echo "</div>";
		
		$input->clear_data();
		
		$input->set_type("number");
		$input->set_value($table_data['Dtable_capacity']);
		$input->set_name("table_capacity");
		$input->set_min_max(1,10);
		//$input->set_readonly();
		$input->set_required();
		
		echo "<div>";
		echo "<h4>Table capacity:</h4>";
		echo $input->display();
		echo "</div>";
		
		$input->clear_data();
		
		$input->set_type("text");
		$input->set_name("table_blocked");
		$input->set_value($table_data['Dtable_blocked'] ? "Yes" : "No");
		$input->set_readonly();
		$input->set_required();
		
		echo "<div>";
		echo "<h4>Table blocked:</h4>";
		echo $input->display();
		echo "</div>";
		
		$button->set_id("bt_lock");
		$button->set_type("submit");
		$button->set_formmethod("POST");
		$button->set_formaction("site_struct/data_struct/components/additional_componets/php/".($table_data['Dtable_blocked'] ? "table_unlock" : "table_block").".php");
		
		echo $button->display("<div><img src=\"../images/".($table_data['Dtable_blocked'] ? "img_bt_unlock" : "img_bt_lock").".png\"><h4>".($table_data['Dtable_blocked'] ? "unlock table" : "lock table" )."</h4></div>");
		
		$button->clear_data();
		
		$button->set_id("bt_edit");
		$button->set_type("submit");
		$button->set_formmethod("POST");
		$button->set_formaction("site_struct/data_struct/components/additional_componets/php/table_edit.php");
		
		echo $button->display("<div><img src=\"../images/img_bt_edit.png\"><h4>Edit table</h4></div>");
		
		$input->clear_data();
		$button->clear_data();
		echo "</div>";
		echo "</form>";
	}
	
	$button = new button();
	
	echo "</div>";
	echo "</div>";
}

$button->clear_data();

$button->set_id("bt_add_table");
$button->set_type("submit");
$button->set_onclick("display_room_editor()");

echo $button->display("<div><img src=\"../images/img_bt_add.png\"><h4>Add room</h4></div>");

$button->clear_data();

$button->set_id("bt_add");
$button->set_type("submit");
$button->set_onclick("display_table_editor()");

echo $button->display("<div><img src=\"../images/img_bt_add.png\"><h4>Add table</h4></div>");

$button->clear_data();

echo "</div>";
echo "</div>";
echo "</div>";
?>