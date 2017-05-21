<?php
//include_once "site_struct/data_struct/components/lib/lib_class/input_class.php";
//include_once "site_struct/data_struct/components/lib/lib_class/select_class.php";

include_once "lib/lib_class/input_class.php";
include_once "lib/lib_class/select_class.php";

$cr_ac_input = new input();
$cr_ac_select = new select();

$cr_ac_input->set_type("text");
$cr_ac_input->set_name("user_name");
$cr_ac_input->set_required();

echo "<form action = \"additional_componets/php/insert_data.php\" method = \"POST\">";
echo "<div>";
echo "<div>";
echo "<div>";

echo "<div>";
echo "<h4>Username</h4>";
echo $cr_ac_input->display();
echo "</div>";


$cr_ac_input->clear_data();

$cr_ac_input->set_type("email");
$cr_ac_input->set_name("user_email");
$cr_ac_input->set_required();

echo "<div>";
echo "<h4>Email</h4>";
echo $cr_ac_input->display();
echo "</div>";

$cr_ac_input->clear_data();

$cr_ac_select->set_name("user_gender");
$cr_ac_select->add_option("Male","M","");
$cr_ac_select->option_clear_attr();
$cr_ac_select->add_option("Female","F","");
$cr_ac_select->option_clear_attr();
$cr_ac_select->add_option("Other","O","");


echo "<div>";
echo "<h4>Gender</h4>";
echo $cr_ac_select->display();
echo "</div>";

$cr_ac_select->option_clear_data();
$cr_ac_select->clear_data();

$cr_ac_input->set_type("password");
$cr_ac_input->set_name("user_pass");
$cr_ac_input->set_required();

echo "<div>";
echo "<h4>Password</h4>";
echo $cr_ac_input->display();
echo "</div>";

$cr_ac_input->clear_data();

$cr_ac_input->set_type("submit");

echo "<div>";
echo $cr_ac_input->display();
echo "</div>";

$cr_ac_input->clear_data();

echo "</div>";
echo "</div>";
echo "</div>";
echo "</form>";

unset($cr_ac_input);
unset($cr_ac_select);
?>