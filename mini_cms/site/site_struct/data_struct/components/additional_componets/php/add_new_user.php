<?php
require_once "../../../../document_data/db_conn.php";
require_once "../../../../document_data/document_data.php";
require_once "data_filter.php";

$usr_email = data_filter($_POST['user_email']);
$usr_pass = crypt(data_filter($_POST['user_temp_password']));
$usr_name = data_filter($_POST['user_name']);
$usr_gender = data_filter($_POST['user_gender']);
$usr_block = data_filter($_POST['user_blocked']);
$usr_phone = data_filter($_POST['user_phonenumber']);
$usr_access_lv = data_filter($_POST['user_accessLv']);

$sql = "
SELECT ".$prefix."user.user_email , ".$prefix."user.user_password 
FROM ".$prefix."user
WHERE ".$prefix."user.user_email = \"".$usr_email."\" 
OR ".$prefix."user.user_password = \"".$usr_pass ."\"
LIMIT 1;";
$user_rows = mysqli_query($conn,$sql) or die ("ERROR 1");

$user_row = mysqli_fetch_row($user_rows);


if($user_row)
	Header("Location: ../../../../../?menu_id=8&err_msg=email or password already exists");
else
{
	$sql ="
	INSERT INTO ".$prefix."user(user_name,user_email,user_password,user_gender,user_blocked,user_phonenumber,accessLv_id)
	VALUES (\"".$usr_name."\",\"".$usr_email."\",\"".$usr_pass."\",\"".$usr_gender."\",".$usr_block.",".$usr_phone.",".$usr_access_lv.");";

	mysqli_query($conn,$sql) or die ("ERROR 2");

	Header("Location: ../../../../../?menu_id=8&err_msg=User Created");
}

mysqli_free_result($user_rows);
?>