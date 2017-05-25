<?php

$start_index = empty($_POST['index']) ? 0 : $_POST['index'];

if(!empty($_POST['next_list']))
{
	switch($_POST['next_list'])
	{
		case "TRUE":
			$start_index += 1;
			break;
		case "FALSE":
			$start_index -= 1;
			break;
		default:
			break;
	}
}

if($start_index < 0)
	$start_index = 0;

if(!(empty($_POST['user_id'])) || !(empty($_POST['user_name'])))
{
include_once "site_struct/data_struct/components/additional_componets/php/reservation_editor.php";
}
else
{
	$sql = "
SELECT ".$prefix."user.user_id ,".$prefix."user.user_name , ".$prefix."user.user_email , ".$prefix."user.user_gender , ".$prefix."user.user_date_created, ".$prefix."user.user_blocked, ".$prefix."user.accessLv_id
FROM ".$prefix."user
LIMIT ".($start_index * 25).",25;";
$user_rows = mysqli_query($conn,$sql) or die ("ERROR 13" . mysqli_error($conn));
	
	$sql = "
SELECT ".$prefix."accessLv.accessLv_id, ".$prefix."accessLv.accessLv_title
FROM ".$prefix."accessLv;";
$access_lv_rows = mysqli_query($conn,$sql) or die ("ERROR 14" . mysqli_error($conn));
	
include_once "site_struct/data_struct/components/additional_componets/php/user_editor.php";

echo "<div class = \"user_list_style\">";
echo "<div>";
echo "<div>";

foreach($user_rows as $user_row => $user_data)
{
	echo "<form>";
	
	echo "<div>";
	$input->clear_data();
	
	$input->set_type("number");
	$input->set_name("user_id");
	$input->set_value($user_data['user_id']);
	$input->set_readonly();
	
	echo "<div><h3>User ID: </h3>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$input->set_type("text");
	$input->set_name("user_name");
	$input->set_value($user_data['user_name']);
	
	echo "<div><h3>Name: </h3>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$input->set_type("text");
	$input->set_name("user_email");
	$input->set_value($user_data['user_email']);
	
	echo "<div><h3>Email: </h3>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$input->set_type("text");
	$input->set_name("user_gender");
	$input->set_value($user_data['user_gender']);
	
	echo "<div><h3>Gender: </h3>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$input->set_type("text");
	$input->set_name("user_blocked");
	$input->set_value($user_data['user_blocked'] ? "Yes" : "No");
	$input->set_readonly();
	
	echo "<div><h3>Blocked: </h3>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$input->set_type("text");
	$input->set_name("user_date_created");
	$input->set_value($user_data['user_date_created']);
	$input->set_readonly();
	
	echo "<div><h3>Date Created: </h3>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$select->clear_data();
	
	$select->set_name("user_access_level");

	foreach($access_lv_rows as $access_lv_row => $access_lv_data)
	{		
		if ($access_lv_data['accessLv_id'] == $user_data['accessLv_id'])
			$select->set_option_selected();

		$select->add_option($access_lv_data['accessLv_title'],$access_lv_data['accessLv_id']);
	}
	echo "<div><h3>access level: </h3>";
	echo $select->display();
	echo "</div>";
	
	$select->clear_data();
	
	$button->set_type("submit");
	$button->set_formmethod("POST");
	$button->set_formaction("site_struct/data_struct/components/additional_componets/php/".($user_data['user_blocked'] ? "user_unlock" : "user_block").".php");
	
	echo $button->display("<div><img src = \"../images/".($user_data['user_blocked'] ? "img_bt_lock" : "img_bt_unlock").".png\"><h4>".($user_data['user_blocked'] ? "Unlock" : "Lock"). " user</h4></div>");
	
	
	$button->clear_data();
	
	$button->set_type("submit");
	$button->set_formmethod("POST");
	$button->set_formaction("site_struct/data_struct/components/additional_componets/php/user_edit.php");
	
	echo $button->display("<div><img src = \"../images/img_bt_edit.png\"><h4>Edit user</h4></div>");
	
	$button->clear_data();
	
	$button->set_type("submit");
	$button->set_formmethod("POST");
	$button->set_formaction("#");
	
	echo $button->display("<div><img src = \"../images/img_bt_add.png\"><h4>Add reservation</h4></div>");
	
	$button->clear_data();
	
	echo "</div>";
	
	echo "</form>";
}

$button->set_type("button");
$button->set_onclick("display_user_editor()");
echo $button->display("<div><img src = \"../images/img_bt_add.png\"><h4>Add user</h4></div>");

$button->clear_data();
$input->clear_data();

$input->set_type("hidden");
$input->set_name("index");
$input->set_value($start_index);

$button->set_type("submit");
$button->set_name("next_list");
$button->set_value("FALSE");

echo "<form action=\"#\" method=\"POST\">";
echo "<div>";

echo $input->display();

$input->clear_data();

echo "<div>";
echo $button->display("Prev");
echo "</div>";

$button->clear_data();

$button->set_type("submit");
$button->set_name("next_list");
$button->set_value("TRUE");

echo "<div>";
echo $button->display("Next");
echo "</div>";

$button->clear_data();

echo "<p>page ".$start_index."<p>";

echo "</div>";
echo "</form>";

echo "</div>";
echo "</div>";
echo "</div>";

mysqli_free_result($user_rows);
mysqli_free_result($access_lv_rows);
}
?>