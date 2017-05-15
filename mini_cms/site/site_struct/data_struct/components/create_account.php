<?php
include_once "lib/lib_class/input_class.php";

$cr_ac_input = new input();

$cr_ac_input->set_type("text");
$cr_ac_input->set_name("user_name");

echo "<form action = \"insert_data.php\" method = \"POST\">";
echo "<table>";
echo "<tbody>";

echo "<tr>";
echo "<td><p>Username</p></td>";
echo "<td>";
echo $cr_ac_input->display();
echo "</td>";
echo "</tr>";


$cr_ac_input->clear_data();

$cr_ac_input->set_type("email");
$cr_ac_input->set_name("user_email");

echo "<tr>";
echo "<td><p>Email</p></td>";
echo "<td>";
echo $cr_ac_input->display();
echo "</td>";
echo "</tr>";

$cr_ac_input->clear_data();

echo "<tr>";
echo "<td><p>Gender</p></td>";
echo "<td><select name = \"user_gender\">";
echo "<option value = \"M\"><p>male</p></option>";
echo "<option value = \"F\"><p>female</p></option>";
echo "<option value = \"O\"><p>other</p></option>";
echo "</select></td>";
echo "</tr>";

$cr_ac_input->set_type("password");
$cr_ac_input->set_name("user_pass");
$cr_ac_input->set_required();

echo "<tr>";
echo "<td><p>Password</p></td>";
echo "<td>";
echo $cr_ac_input->display();
echo "</td>";
echo "</tr>";

$cr_ac_input->clear_data();

$cr_ac_input->set_type("submit");

echo "<tr>";
echo "<td>";
echo $cr_ac_input->display();
echo "</td>";
echo "</tr>";

$cr_ac_input->clear_data();

echo "</tbody>";
echo "</table>";
echo "</form>";

unset($cr_ac_input);
?>