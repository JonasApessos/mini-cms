<?php
include_once "site_struct/data_struct/components/lib/lib_class/input_class.php";
include_once "site_struct/data_struct/components/lib/lib_class/button_class.php";
include_once "site_struct/data_struct/components/additional_componets/php/room_editor.php";

$sql = "
SELECT ".$prefix."resPos.resPos_id , ".$prefix."resPos.resPos_title , ".$prefix."resPos.resPos_desc
FROM ".$prefix."resPos;";

$pos_rows = mysqli_query($conn,$sql) or die ("ERROR 13" . mysqli_error($conn));

include_once "site_struct/data_struct/components/additional_componets/php/table_editor.php";

$table_button = new button();
$table_input = new input();

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
		
		$table_input->set_type("number");
		$table_input->set_value($table_data['Dtable_id']);
		$table_input->set_name("table_id");
		$table_input->set_readonly();
		
		$table_button->set_id("bt_add");
		$table_button->set_type("submit");
		$table_button->set_formmethod("POST");
		$table_button->set_formaction("site_struct/data_struct/components/additional_componets/php/".($table_data['Dtable_blocked'] ? "table_unlock" : "table_block").".php");
		
		echo "<h4>Table ID:</h4>";
		echo $table_input->display();
		echo $table_button->display("<div><img src=\"../images/".($table_data['Dtable_blocked'] ? "img_bt_unlock" : "img_bt_lock").".png\"><h4>".($table_data['Dtable_blocked'] ? "unlock table" : "lock table" )."</h4></div>");
		
		$table_input->clear_data();
		$table_button->clear_data();
		echo "</div>";
		echo "</form>";
	}
	
	$table_button = new button();
	
	echo "</div>";
	echo "</div>";
}

$table_button->clear_data();

$table_button->set_id("bt_add_table");
$table_button->set_type("submit");
$table_button->set_onclick("display_room_editor()");

echo $table_button->display("<div><img src=\"../images/img_bt_add.png\"><h4>Add room</h4></div>");

$table_button->clear_data();

$table_button->set_id("bt_add");
$table_button->set_type("submit");
$table_button->set_onclick("display_table_editor()");

echo $table_button->display("<div><img src=\"../images/img_bt_add.png\"><h4>Add table</h4></div>");

$table_button->clear_data();

echo "</div>";
echo "</div>";
echo "</div>";

unset($table_input);
unset($table_button);
?>