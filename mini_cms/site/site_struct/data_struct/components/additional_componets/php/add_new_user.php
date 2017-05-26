<?php
require_once "../../../../document_data/db_conn.php";
require_once "../../../../document_data/document_data.php";

$sql = "
SELECT ".$prefix."user.user_email , ".$prefix."user.user_password 
FROM ".$prefix."user
WHERE ".$prefix."user.user_email = \"".$_POST['user_email']."\" 
OR ".$prefix."user.user_password = \"".crypt($_POST['user_temp_password'],"T51")."\"
LIMIT 1;";
$user_rows = mysqli_query($conn,$sql) or die ("ERROR 16" . mysqli_error($conn));

$user_row = mysqli_fetch_row($user_rows);


if($user_row)
	Header("Location: ../../../../../?menu_id=8&err_msg=email or password already exists");
else
{
	$sql ="
	INSERT INTO ".$prefix."user(user_name,user_email,user_password,user_gender,user_blocked,user_phonenumber,accessLv_id)
	VALUES (\"".$_POST['user_name']."\",\"".$_POST['user_email']."\",\"".crypt($_POST['user_temp_password'],"T51")."\",\"".$_POST['user_gender']."\",".$_POST['user_blocked'].",".$_POST['user_phonenumber'].",".$_POST['user_accessLv'].");";

	mysqli_query($conn,$sql) or die ("ERROR 17" . mysqli_error($conn));

	Header("Location: ../../../../../?menu_id=8&err_msg=User Created");
}

mysqli_free_result($user_rows);
?>