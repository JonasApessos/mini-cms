<?php
$input->clear_data();

$input->set_type("text");
$input->set_name("user_name");
$input->set_required();


echo "<div id=\"create_user\">";
echo "<div>";
echo "<div>";
echo "<h3>Create Account</h3>";
echo "<form action = \"site_struct/data_struct/components/additional_componets/php/insert_data.php\" method = \"POST\">";

echo "<div>";
echo "<h4>Username</h4>";
echo $input->display();
echo "</div>";


$input->clear_data();

$input->set_type("email");
$input->set_name("user_email");
$input->set_required();

echo "<div>";
echo "<h4>Email</h4>";
echo $input->display();
echo "</div>";

$input->clear_data();

$select->set_name("user_gender");
$select->add_option("Male","M","");
$select->add_option("Female","F","");
$select->add_option("Other","O","");

echo "<div>";
echo "<h4>Gender</h4>";
echo $select->display();
echo "</div>";

$select->clear_data();

$input->set_type("text");
$input->set_name("user_phonenumber");
$input->set_required();
$input->set_maxlength(16);

echo "<div>";
echo "<h4>Phone number</h4>";
echo $input->display();
echo "</div>";

$input->clear_data();

$input->set_type("password");
$input->set_name("user_pass");
$input->set_required();

echo "<div>";
echo "<h4>Password</h4>";
echo $input->display();
echo "</div>";

$input->clear_data();

$input->set_type("submit");

$button->clear_data();
$button->set_type("button");
$button->set_onclick("hide_creator()");

echo "<div>";
echo $input->display();
echo $button->display("Cancel");
echo "</div>";

$input->clear_data();
$button->clear_data();

echo "</form>";

echo "</div>";
echo "</div>";
echo "</div>";
?>