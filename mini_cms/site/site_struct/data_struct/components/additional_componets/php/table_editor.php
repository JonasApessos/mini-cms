<?php
$sql = "
SELECT ".$prefix."resPos.resPos_id , ".$prefix."resPos.resPos_title
FROM ".$prefix."resPos;";
$pos_rows = mysqli_query($conn,$sql)or die("ERROR 1");

echo "<div id=\"table_editor\">";
echo "<div>";
echo "<div>";
echo "<h1>Add new table</h1>";
echo "<form action=\"site_struct/data_struct/components/additional_componets/php/add_new_table.php\" method=\"POST\">";

$input->set_type("number");
$input->set_name("table_capacity");
$input->set_required();
$input->set_min_max(1,10);

echo "<div><h3>Table capacity: </h3>";
echo $input->display();
echo "</div>";

$input->clear_data();

$select->set_name("table_respos");

foreach($pos_rows as $pos_row => $pos_data)
{
	$select->add_option($pos_data['resPos_title'],$pos_data['resPos_id']);
}

echo "<div><h3>Restaurant position: </h3>";
echo $select->display();
echo "</div>";

$select->clear_data();

$input->clear_data();

$select->set_name("table_blocked");
$select->add_option("Yes","TRUE");
$select->add_option("No","FALSE");

echo "<div><h3>Table blocked: </h3>";
echo $select->display();
echo "</div>";

$input->clear_data();

$input->set_type("submit");

$button->set_type("button");
$button->set_onclick("hide_table_editor()");

echo "<div>".$button->display("Cancel")." ".$input->display()."</div>";

echo "</form>";

echo "</div>";
echo "</div>";
echo "</div>";
?>