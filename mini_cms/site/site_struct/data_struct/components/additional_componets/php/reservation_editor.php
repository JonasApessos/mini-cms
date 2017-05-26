<?php
if(empty($_POST['res_date']))
{

echo "<div id=\"reservation_editor\">";
echo "<div>";
echo "<div>";
echo "<h1>Add new reservation</h1>";

echo "<form action=\"#\" method=\"POST\">";

echo "<div>";
echo "<h4>User ID: </h4>";

$input->set_type("number");
$input->set_name("user_id");
$input->set_value($_POST['user_id']);
$input->set_required();
$input->set_readonly();

echo $input->display();
echo "</div>";

$input->clear_data();

echo "<div>";

echo "<h4>Name: </h4>";

$input->set_type("text");
$input->set_maxlength(32);
$input->set_name("user_name");
$input->set_value($_POST['user_name']);
$input->set_required();
$input->set_readonly();

echo $input->display();

echo "</div>";

$input->clear_data();

echo "<div>";

echo "<h4>Smoking: </h4>";

$select->set_name("user_smoking");
$select->add_option("Yes","TRUE");
$select->add_option("No","FALSE");

echo $select->display();

echo "</div>";

$select->clear_data();

echo "<div>";

echo "<h4>Number of people: </h4>";

$input->set_type("number");
$input->set_min_max(1,10);
$input->set_name("user_people");
$input->set_required();

echo $input->display();

echo "</div>";

$input->clear_data();

echo "<div>";

echo "<h4>Comment: </h4>";

$textarea->set_maxlength(255);
$textarea->set_name("user_comm");

echo $textarea->display();

$textarea->clear_data();

echo "</div>";

echo "<div id =\"res_cal\">";
echo "</div>";

$input->set_type("submit");

echo $input->display();

$input->clear_data();

echo "</form>";
echo "</div>";
echo "</div>";
echo "</div>";
}
else
{
	
	echo "<div id=\"reservation_editor_2\">";
	echo "<div>";
	echo "<div>";
	echo "<h1>Add new reservation</h1>";
	echo "<form action=\"site_struct/data_struct/components/additional_componets/php/res_table_admin.php\" method=\"POST\">";
	
	$input->set_type("number");
	$input->set_name("fin_user_id");
	$input->set_value($_POST['user_id']);
	$input->set_required();
	$input->set_readonly();
	
	echo "<div>";
	echo "<h4>User ID: </h4>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$input->set_type("text");
	$input->set_name("fin_user_name");
	$input->set_maxlength(32);
	$input->set_value($_POST['user_name']);
	$input->set_required();
	$input->set_readonly();
	
	echo "<div>";
	echo "<h4>Name: </h4>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$input->set_type("text");
	$input->set_name("fin_user_smoking");
	$input->set_value($_POST['user_smoking'] ? "TRUE" : "FALSE");
	$input->set_required();
	$input->set_readonly();
	
	echo "<div>";
	echo "<h4>Smoking: </h4>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$input->set_type("number");
	$input->set_name("fin_user_people");
	$input->set_min_max(1,100);
	$input->set_value($_POST['user_people']);
	$input->set_required();
	$input->set_readonly();
	
	echo "<div>";
	echo "<h4>Number of people: </h4>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$textarea->set_name("fin_user_comm");
	$textarea->set_maxlength(255);
	$textarea->set_readonly();
	
	echo "<div>";
	echo "<h4>Comment: </h4>";
	echo $textarea->display_input($_POST['user_comm']);
	echo "</div>";
	
	$textarea->clear_data();
	
	$input->set_type("text");
	$input->set_name("fin_user_date");
	$input->set_value($_POST['res_date']);
	$input->set_required();
	$input->set_readonly();
	
	echo "<div>";
	echo "<h4>Date: </h4>";
	echo $input->display();
	echo "</div>";	
	
	$input->clear_data();
	
	//$input->set_name("fin_user_id");
	
	require_once "site_struct/data_struct/components/table_place.php";
	
	
	$input->set_type("submit");
	$input->set_value("submit");
	
	echo "<div>";
	echo $input->display();
	echo "</div>";
	
	
	echo "</form>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
}
?>