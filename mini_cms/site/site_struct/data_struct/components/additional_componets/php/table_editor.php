<?php

echo "<div id=\"table_editor\">";
echo "<div>";
echo "<div>";
echo "<h1>Add new table</h1>";
echo "<form action=\"site_struct/data_struct/components/additional_componets/php/add_new_table.php\" method=\"POST\">";

echo "<div><h3>Name: </h3><input type=\"text\" name=\"user_name\"></div>";
echo "<div><h3>Email: </h3><input type=\"email\" name=\"user_email\"></div>";
echo "<div><h3>Gender: </h3><select name=\"user_gender\">";
echo "<option value =\"M\">Male</option>";
echo "<option value =\"F\">Female</option>";
echo "<option value =\"O\">Other</option>";
echo "</select></div>";
echo "<div><h3>Blocked: </h3><select name=\"user_blocked\"><option value=\"1\">Yes</option><option value=\"0\">No</option></select></div>";
echo "<div><h3>Access Level: </h3><select name=\"user_accessLv\">";
foreach($access_lv_rows as $access_lv_row => $access_lv_data)
{
	echo "<option value=\"".$access_lv_data['accessLv_id']."\">".$access_lv_data['accessLv_title']."</option>";
}
echo "</select>";
echo "</div>";
echo "<div><h3>Temporary Password: </h3><input type=\"password\" name=\"user_temp_password\"></div>";
echo "<div><button type=\"button\" onClick=\"hide_table_editor()\">Cancel</button><input type=\"submit\"></div>";

echo "</form>";

echo "</div>";
echo "</div>";
echo "</div>";

?>