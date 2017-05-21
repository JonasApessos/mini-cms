<?php
include_once "site_struct/data_struct/components/lib/lib_class/input_class.php";
include_once "site_struct/data_struct/components/lib/lib_class/button_class.php";
include_once "site_struct/data_struct/components/lib/lib_class/select_class.php";

$sql = "
SELECT ".$prefix."user.user_id ,".$prefix."user.user_name , ".$prefix."user.user_email , ".$prefix."user.user_gender , ".$prefix."user.user_date_created, ".$prefix."user.user_blocked, ".$prefix."user.accessLv_id
FROM ".$prefix."user;";
$user_rows = mysqli_query($conn,$sql) or die ("ERROR 13" . mysqli_error($conn));

$sql = "
SELECT ".$prefix."accessLv.accessLv_id, ".$prefix."accessLv.accessLv_title
FROM ".$prefix."accessLv;";
$access_lv_rows = mysqli_query($conn,$sql) or die ("ERROR 14" . mysqli_error($conn));

include_once "site_struct/data_struct/components/additional_componets/php/user_editor.php";

$usr_input = new input();
$usr_select = new select();
$usr_button = new button();

echo "<div class = \"user_list_style\">";
echo "<div>";
echo "<div>";

foreach($user_rows as $user_row => $user_data)
{
	echo "<form>";
	
	echo "<div>";
	$usr_input->clear_data();
	
	$usr_input->set_type("number");
	$usr_input->set_name("user_id");
	$usr_input->set_value($user_data['user_id']);
	$usr_input->set_readonly();
	
	echo "<div><h3>User ID: </h3>";
	echo $usr_input->display();
	echo "</div>";
	
	$usr_input->clear_data();
	
	$usr_input->set_type("text");
	$usr_input->set_name("user_name");
	$usr_input->set_value($user_data['user_name']);
	
	echo "<div><h3>Name: </h3>";
	echo $usr_input->display();
	echo "</div>";
	
	$usr_input->clear_data();
	
	$usr_input->set_type("text");
	$usr_input->set_name("user_email");
	$usr_input->set_value($user_data['user_email']);
	
	echo "<div><h3>Email: </h3>";
	echo $usr_input->display();
	echo "</div>";
	
	$usr_input->clear_data();
	
	$usr_input->set_type("text");
	$usr_input->set_name("user_gender");
	$usr_input->set_value($user_data['user_gender']);
	
	echo "<div><h3>Gender: </h3>";
	echo $usr_input->display();
	echo "</div>";
	
	$usr_input->clear_data();
	
	$usr_input->set_type("text");
	$usr_input->set_name("user_blocked");
	$usr_input->set_value($user_data['user_blocked'] ? "Yes" : "No");
	$usr_input->set_readonly();
	
	echo "<div><h3>Blocked: </h3>";
	echo $usr_input->display();
	echo "</div>";
	
	$usr_input->clear_data();
	
	$usr_input->set_type("text");
	$usr_input->set_name("user_date_created");
	$usr_input->set_value($user_data['user_date_created']);
	$usr_input->set_readonly();
	
	echo "<div><h3>Date Created: </h3>";
	echo $usr_input->display();
	echo "</div>";
	
	$usr_input->clear_data();
	
	$usr_select->set_name("user_access_level");

	foreach($access_lv_rows as $access_lv_row => $access_lv_data)
	{		
		if ($access_lv_data['accessLv_id'] == $user_data['accessLv_id'])
			$usr_select->set_option_selected();

		$usr_select->add_option($access_lv_data['accessLv_title'],$access_lv_data['accessLv_id']);
	}
	echo "<div><h3>access level: </h3>";
	echo $usr_select->display();
	echo "</div>";
	
	$usr_select->clear_data();
	
	$usr_button->set_type("submit");
	$usr_button->set_formmethod("POST");
	$usr_button->set_formaction("site_struct/data_struct/components/additional_componets/php/".($user_data['user_blocked'] ? "user_unlock" : "user_block").".php");
	
	echo $usr_button->display("<div><img src = \"../images/".($user_data['user_blocked'] ? "img_bt_lock" : "img_bt_unlock").".png\"><h4>".($user_data['user_blocked'] ? "Unlock" : "Lock"). " user</h4></div>");
	
	
	$usr_button->clear_data();
	
	$usr_button->set_type("submit");
	$usr_button->set_formmethod("POST");
	$usr_button->set_formaction("site_struct/data_struct/components/additional_componets/php/user_edit.php");
	
	echo $usr_button->display("<div><img src = \"../images/img_bt_edit.png\"><h4>Edit user</h4></div>");
	
	$usr_button->clear_data();
	
	echo "</div>";
	
	echo "</form>";
}

$usr_button->set_type("button");
$usr_button->set_onclick("display_user_editor()");
echo $usr_button->display("<div><img src = \"../images/img_bt_add.png\"><h4>Add user</h4></div>");

$usr_button->clear_data();

echo "</div>";
echo "</div>";
echo "</div>";

unset($usr_input);
unset($usr_button);
unset($usr_select);
mysqli_free_result($user_rows);
mysqli_free_result($access_lv_rows);
?>