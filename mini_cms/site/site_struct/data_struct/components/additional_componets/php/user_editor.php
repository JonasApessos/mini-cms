<?php
include_once "site_struct/data_struct/components/lib/lib_class/input_class.php";
include_once "site_struct/data_struct/components/lib/lib_class/button_class.php";
include_once "site_struct/data_struct/components/lib/lib_class/select_class.php";

$usr_input = new input();
$usr_select = new select();
$usr_button = new button();

echo "<div id=\"user_editor\">";
echo "<div>";
echo "<div>";
echo "<h1>Add new user</h1>";
echo "<form action=\"site_struct/data_struct/components/additional_componets/php/add_new_user.php\" method=\"POST\">";

$usr_input->set_type("text");
$usr_input->set_required();
$usr_input->set_name("user_name");

echo "<div><h3>Name: </h3>";
echo $usr_input->display();
echo "</div>";

$usr_input->clear_data();

$usr_input->set_type("email");
$usr_input->set_required();
$usr_input->set_name("user_email");

echo "<div><h3>Email: </h3>";
echo $usr_input->display();
echo "</div>";

$usr_input->clear_data();

$usr_select->set_name("user_gender");
$usr_select->add_option("Male","M");
$usr_select->add_option("Female","F");
$usr_select->add_option("Other","O");

echo "<div><h3>Gender: </h3>";
echo $usr_select->display();
echo "</div>";

$usr_select->clear_data();

$usr_select->set_name("user_blocked");
$usr_select->add_option("Yes","TRUE");
$usr_select->add_option("No","FALSE");


echo "<div><h3>Blocked: </h3>";
echo $usr_select->display();
echo "</div>";

$usr_select->clear_data();

$usr_select->set_name("user_accessLv");

foreach($access_lv_rows as $access_lv_row => $access_lv_data)
{
	$usr_select->add_option($access_lv_data['accessLv_title'],$access_lv_data['accessLv_id'],"");
}
echo "<div><h3>Access Level: </h3>";
echo $usr_select->display();
echo "</div>";

$usr_input->set_type("password");
$usr_input->set_required();
$usr_input->set_name("user_temp_password");

echo "<div><h3>Temporary Password: </h3>";
echo $usr_input->display();
echo "</div>";

$usr_input->clear_data();

$usr_button->set_type("button");
$usr_button->set_onclick("hide_user_editor()");

$usr_input->set_type("submit");
$usr_input->set_value("submit");

echo "<div>";
echo $usr_button->display("Cancel");
echo $usr_input->display();
echo "</div>";

$usr_button->clear_data();

echo "</form>";

unset($usr_select);
unset($usr_input);
unset($usr_button);

echo "</div>";
echo "</div>";
echo "</div>";
?>