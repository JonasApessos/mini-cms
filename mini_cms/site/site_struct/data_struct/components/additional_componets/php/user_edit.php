<?php
require_once "../../../../document_data/db_conn.php";
require_once "../../../../document_data/document_data.php";
require_once "data_filter.php";

$usr_name = filter_data($_POST['user_name']);
$usr_email = filter_data($_POST['user_email']);
$usr_id = filter_data($_POST['user_id']);
$usr_gender = filter_data($_POST['user_gender']);
$usr_access_lv = filter_data($_POST['user_access_level']);

$sql = "
UPDATE ".$prefix."user
SET ".$prefix."user.user_gender = \"".$usr_gender."\" , ".$prefix."user.user_email = \"".$usr_email."\" , ".$prefix."user.user_name = \"".$usr_name."\", ".$prefix."user.accessLv_id = ".$usr_access_lv."
WHERE ".$prefix."user.user_id = ".$usr_id.";";

mysqli_query($conn,$sql) or die ("ERROR 1");

header("Location: ../../../../../?menu_id=8&err_msg=User was edited");
?>