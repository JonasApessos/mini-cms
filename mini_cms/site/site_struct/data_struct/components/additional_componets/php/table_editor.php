<?php
include_once "site_struct/data_struct/components/lib/lib_class/input_class.php";
include_once "site_struct/data_struct/components/lib/lib_class/button_class.php";
include_once "site_struct/data_struct/components/lib/lib_class/select_class.php";

$sql = "
SELECT ".$prefix."resPos.resPos_id , ".$prefix."resPos.resPos_title
FROM ".$prefix."resPos;";
$pos_rows = mysqli_query($conn,$sql)or die("ERROR 28 " . mysqli_query($conn));

$table_input = new input();
$table_button = new button();
$table_select = new select();

echo "<div id=\"table_editor\">";
echo "<div>";
echo "<div>";
echo "<h1>Add new table</h1>";
echo "<form action=\"site_struct/data_struct/components/additional_componets/php/add_new_table.php\" method=\"POST\">";

$table_input->set_type("number");
$table_input->set_name("table_capacity");
$table_input->set_required();
$table_input->set_min_max(1,10);

echo "<div><h3>Table capacity: </h3>";
echo $table_input->display();
echo "</div>";

$table_input->clear_data();

$table_select->set_name("table_respos");

foreach($pos_rows as $pos_row => $pos_data)
{
	$table_select->add_option($pos_data['resPos_title'],$pos_data['resPos_id']);
}

echo "<div><h3>Restaurant position: </h3>";
echo $table_select->display();
echo "</div>";

$table_select->clear_data();

$table_input->clear_data();

$table_select->set_name("table_blocked");
$table_select->add_option("Yes","TRUE");
$table_select->add_option("No","FALSE");

echo "<div><h3>Table blocked: </h3>";
echo $table_select->display();
echo "</div>";

$table_input->clear_data();

$table_input->set_type("submit");

$table_button->set_type("button");
$table_button->set_onclick("hide_table_editor()");

echo "<div>".$table_button->display("Cancel")." ".$table_input->display()."</div>";

echo "</form>";

echo "</div>";
echo "</div>";
echo "</div>";

unset($table_input);
unset($table_button);
unset($table_select);

?>