<?php
echo "<div id=\"room_editor\">";
echo "<div>";
echo "<div>";
echo "<h1>Add new room</h1>";
echo "<form action=\"site_struct/data_struct/components/additional_componets/php/add_new_room.php\" method=\"POST\">";

$input->set_type("text");
$input->set_name("pos_title");

echo "<div><h3>Title: </h3>";
echo $input->display();
echo "</div>";

$input->clear_data();

$textarea->set_name("pos_desc");

echo "<div><h3>Description: </h3>";
echo $textarea->display();
echo "</div>";

$textarea->clear_data();

$button->set_type("button");
$button->set_onclick("hide_room_editor()");

echo "<div>";
echo $button->display("Cancel");

$button->clear_data();

$input->set_type("submit");
$input->set_value("submit");

echo $input->display();

$input->clear_data();
echo "</div>";

echo "</form>";

echo "</div>";
echo "</div>";
echo "</div>";
?>