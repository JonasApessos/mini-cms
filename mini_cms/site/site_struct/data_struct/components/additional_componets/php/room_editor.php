<?php
include_once "site_struct/data_struct/components/lib/lib_class/input_class.php";
include_once "site_struct/data_struct/components/lib/lib_class/button_class.php";
include_once "site_struct/data_struct/components/lib/lib_class/textarea_class.php";

$room_input = new input();
$room_button = new button();
$room_textarea = new textarea();

echo "<div id=\"room_editor\">";
echo "<div>";
echo "<div>";
echo "<h1>Add new room</h1>";
echo "<form action=\"site_struct/data_struct/components/additional_componets/php/add_new_room.php\" method=\"POST\">";

$room_input->set_type("text");
$room_input->set_name("pos_title");

echo "<div><h3>Title: </h3>";
echo $room_input->display();
echo "</div>";

$room_input->clear_data();

$room_textarea->set_name("pos_desc");

echo "<div><h3>Description: </h3>";
echo $room_textarea->display();
echo "</div>";

$room_textarea->clear_data();

$room_button->set_type("button");
$room_button->set_onclick("hide_room_editor()");

echo "<div>";
echo $room_button->display("Cancel");

$room_button->clear_data();

$room_input->set_type("submit");
$room_input->set_value("submit");

echo $room_input->display();
echo "</div>";

echo "</form>";

echo "</div>";
echo "</div>";
echo "</div>";

unset($room_input);
unset($room_textarea);
unset($room_button);
?>