<?php
$sql = "
SELECT user_name , user_email , user_gender , user_date_created
FROM ".$prefix."user;";

$user_rows = mysqli_query($conn,$sql) or die ("ERROR 13" . mysqli_error($conn));
echo "<div class = \"user_list_style\">";
echo "<div>";
echo "<div>";

foreach($user_rows as $user_row => $user_data)
{
	echo "<div>";
	echo "<h3>Name:	".$user_data['user_name']."</h3>";
	echo "<h3>Email: ".$user_data['user_email']."</h3>";
	echo "<h3>Gender: ".$user_data['user_gender']."</h3>";
	echo "<h3>Date Created: ".$user_data['user_date_created']."</h3>";
	echo "</div>";
}

mysqli_free_result($user_rows);

echo "</div>";
echo "</div>";
echo "</div>";
?>