<?php
echo "<div id=\"recovery\" style=\"display:none; position:fixed; z-index:2;\">";
echo "<div>";
echo "<div>";
echo "<h1>Change Password</h1>";
echo "<form action=\"site_struct/data_struct/components/additional_componets/php/password_change.php\" method=\"POST\">";

$input->clear_data();

$input->set_type("email");
$input->set_name("recovery_email");
$input->set_required();

echo $input->display();

$input->clear_data();

$input->set_type("submit");

echo $input->display();

$input->clear_data();

$button->set_type("button");
$button->set_onclick("hide_recovery()");

echo $button->display("Cancel");

$button->clear_data();

echo "</form>";

echo "</div>";
echo "</div>";
echo "</div>";
?>