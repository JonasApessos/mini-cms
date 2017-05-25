<?php
echo "<div id=\"user_editor\">";
echo "<div>";
echo "<div>";
echo "<h1>Add new user</h1>";
echo "<form action=\"site_struct/data_struct/components/additional_componets/php/add_new_user.php\" method=\"POST\">";

$input->set_type("text");
$input->set_required();
$input->set_name("user_name");

echo "<div><h3>Name: </h3>";
echo $input->display();
echo "</div>";

$input->clear_data();

$input->set_type("email");
$input->set_required();
$input->set_name("user_email");

echo "<div><h3>Email: </h3>";
echo $input->display();
echo "</div>";

$input->clear_data();

$select->set_name("user_gender");
$select->add_option("Male","M");
$select->add_option("Female","F");
$select->add_option("Other","O");

echo "<div><h3>Gender: </h3>";
echo $select->display();
echo "</div>";

$select->clear_data();

$select->set_name("user_blocked");
$select->add_option("Yes","TRUE");
$select->add_option("No","FALSE");


echo "<div><h3>Blocked: </h3>";
echo $select->display();
echo "</div>";

$select->clear_data();

$select->set_name("user_accessLv");

foreach($access_lv_rows as $access_lv_row => $access_lv_data)
{
	$select->add_option($access_lv_data['accessLv_title'],$access_lv_data['accessLv_id'],"");
}
echo "<div><h3>Access Level: </h3>";
echo $select->display();
echo "</div>";

$input->set_type("password");
$input->set_required();
$input->set_name("user_temp_password");

echo "<div><h3>Temporary Password: </h3>";
echo $input->display();
echo "</div>";

$input->clear_data();

$button->set_type("button");
$button->set_onclick("hide_user_editor()");

$input->set_type("submit");
$input->set_value("submit");

echo "<div>";
echo $button->display("Cancel");
echo $input->display();
echo "</div>";

$button->clear_data();

echo "</form>";

echo "</div>";
echo "</div>";
echo "</div>";
?>