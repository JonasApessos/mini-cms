<?php
$sql = "
SELECT ".$prefix."user.user_id ,".$prefix."user.user_name , ".$prefix."user.user_email , ".$prefix."user.user_gender , ".$prefix."user.user_date_created, ".$prefix."user.user_blocked, ".$prefix."user.accessLv_id
FROM ".$prefix."user;";
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
	
	echo "<div><h3>User ID: </h3><input type = \"number\" name = \"user_id\" value = \"".$user_data['user_id']."\" readonly = \"readonly\"></div>";
	
	echo "<div><h3>Name: </h3><input type = \"text\" name = \"user_name\" value = \"".$user_data['user_name']."\"></div>";
	
	echo "<div><h3>Email: </h3><input type = \"text\" name = \"user_email\" value = \"".$user_data['user_email']."\"></div>";
	
	echo "<div><h3>Gender: </h3><input type = \"text\" name = \"user_gender\" value = \"".$user_data['user_gender']."\"></div>";
	
	echo "<div><h3>Blocked: </h3><input type = \"text\" name = \"user_blocked\" value = \"".($user_data['user_blocked'] ? "Yes" : "No")."\" readonly = \"readonly\"></div>";
	
	echo "<div><h3>Date Created: </h3><input type = \"text\" name = \"user_date_created\" value = \"".$user_data['user_date_created']."\" readonly = \"readonly\"></div>";
	
	echo "<div><h3>access level: </h3><select name = \"user_access_level\">";
	
	foreach($access_lv_rows as $access_lv_row => $access_lv_data)
	{
		echo "<option value = \"".$access_lv_data['accessLv_id']."\" ".($access_lv_data['accessLv_id'] == $user_data['accessLv_id'] ? "selected=\"selected\"" : "").">".$access_lv_data['accessLv_title']."</option>";
	}
	echo "</select></div>";
	
	echo "<button type = \"submit\" formmethod =\"POST\" formaction =\"site_struct/data_struct/components/additional_componets/php/".($user_data['user_blocked'] ? "user_unlock" : "user_block").".php\"><div><img src = \"../images/".($user_data['user_blocked'] ? "img_bt_lock" : "img_bt_unlock").".png\"><h4>".($user_data['user_blocked'] ? "Unlock" : "Lock"). " user</h4></div></button>";
	
	echo "<button type = \"submit\" formmethod =\"POST\" formaction =\"site_struct/data_struct/components/additional_componets/php/user_edit.php\"><div><img src = \"../images/img_bt_edit.png\"><h4>Edit user</h4></div></button>";
	
	echo "</div>";
	
	echo "</form>";
}
echo "<button type = \"button\" onClick=\"display_user_editor()\"><div><img src = \"../images/img_bt_add.png\"><h4>Add user</h4></div></button>";


echo "</div>";
echo "</div>";
echo "</div>";

mysqli_free_result($user_rows);
mysqli_free_result($access_lv_rows);
?>